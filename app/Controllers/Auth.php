<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\I18n\Time;



class Auth extends BaseController
{

    public function __construct()
    {
        $this->authModel = new AuthModel();
        helper('converTime');
        helper('logUser');
    }

    public function notfound()
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Page Not Found');
    }

    public function index()
    {
        if (session('log') == TRUE) {
            return redirect()->to('/home');
        }

        $data = [
            'title' => 'Login Page',
            'validation' => \Config\Services::validation()
        ];
        return view('pages/auth/login', $data);
    }

    public function user()
    {
        $data = [
            'title'     => 'User List',
            'user'   => $this->authModel->getUser()
        ];
        return view('pages/auth/user', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Add new user',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/auth/create', $data);
    }

    public function save()
    {
        // validate
        if (!$this->validate([
            'username' => [
                'rules'  => 'required|is_unique[user.username]',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                    'is_unique' => 'Duplicate {field}, {field} already exists!'
                ]
            ],
            'passwd' => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                ]
            ],
            'confirmPasswd' => [
                'rules'  => 'required|matches[passwd]',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                    'matches'  =>  'The confirm password field not matching with password!',
                ]
            ],
            'firstname' => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                ]
            ],
            'level' => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                ]
            ]
        ])) {
            return redirect()->to('/user/create')->withInput();
        }
        // telegram
        $data_url = [
            'chat_id' => $this->user_id,
            'text'    => 'New User added successfully'
        ];
        $get_request_url = 'https://api.telegram.org/bot' . $this->token . '/sendMessage?' . http_build_query($data_url);
        $result = file_get_contents($get_request_url);
        // save
        if ($result)
            $this->authModel->save([
                'firstname' => $this->request->getVar('firstname'),
                'lastname'  => $this->request->getVar('lastname'),
                'username'  => $this->request->getVar('username'),
                'passwd'    => password_hash($this->request->getVar('passwd'), PASSWORD_DEFAULT),
                'level'     => $this->request->getVar('level')
            ]);
        log_user('Create user', 'Add username ' . $this->request->getVar('username'));
        session()->setFlashdata('message', 'New user added successfully');
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Edit User',
            'user'   => $this->authModel->getUser($id),
            'validation' => \Config\Services::validation()
        ];
        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Page Not Found');
        }
        return view('pages/auth/edit', $data);
    }

    public function update($id)
    {
        $userLama = $this->authModel->getUser($this->request->getVar('id_user'));
        $userLama = $userLama['username'];

        // validate
        if (!$this->validate([
            'passwd' => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                ]
            ],
            'confirmPasswd' => [
                'rules'  => 'required|matches[passwd]',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                    'matches'  =>  'The confirm password field not matching with password!',
                ]
            ],
            'firstname' => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                ]
            ],
            'level' => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                ]
            ]
        ])) {
            return redirect()->to('/user/edit/' . $this->request->getVar('id_user'))->withInput();
        }
        // telegram
        $data_url = [
            'chat_id' => $this->user_id,
            'text'    => 'New User update successfully'
        ];
        $get_request_url = 'https://api.telegram.org/bot' . $this->token . '/sendMessage?' . http_build_query($data_url);
        $result = file_get_contents($get_request_url);
        // save
        if ($result)
            $this->authModel->save([
                'id_user' => $id,
                'firstname' => $this->request->getVar('firstname'),
                'lastname'  => $this->request->getVar('lastname'),
                'username'  => $this->request->getVar('username'),
                'passwd'    => password_hash($this->request->getVar('passwd'), PASSWORD_DEFAULT),
                'level'     => $this->request->getVar('level')
            ]);
        log_user('Update user', 'update username ' . $userLama);
        session()->setFlashdata('message', 'The user update successfully');
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $data = $this->authModel->where(['id_user' => $id])->first();
        $message = 'Username ' . $data['username'] . ' has been remove at ' . Time::now();
        $data_url = [
            'chat_id' => $this->user_id,
            'text'    => $message
        ];
        $get_request_url = 'https://api.telegram.org/bot' . $this->token . '/sendMessage?' . http_build_query($data_url);
        $result = file_get_contents($get_request_url);
        if ($result)
            $this->authModel->delete($id);
        log_user('Delete user', 'delete username ' . $data['username']);

        session()->setFlashdata('message', 'The User has been removed');
        return redirect()->to('/user');
    }

    public function cek_login()
    {
        if (!$this->validate([
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!'
                ]
            ],
            'passwd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The {field} field still empty, please fill it!'
                ]
            ]
        ])) {
            return redirect()->to('/')->withInput();
        }
        $username = $this->request->getVar('username');
        $passwd = $this->request->getVar('passwd');
        $user = $this->authModel->where(['username' => $username])->first();
        if ($user == NULL) {
            session()->setFlashdata('message', 'Invalid Username, Username not found!');
            return redirect()->to('/')->withInput();
        }
        if (password_verify($passwd, $user['passwd'])) {
            $data = [
                'log'   => true,
                'username' => $user['username'],
                'fullname' => $user['firstname'] . ' ' . $user['lastname'],
                'level' => $user['level'],
            ];
            session()->set($data);
            session()->setFlashdata('message', 'Welcome To Network Monitoring System');
            $this->authModel->save([
                'id_user' => $user['id_user'],
                'last_online' => Time::now()
            ]);
            return redirect()->to('/home');
        }
        session()->setFlashdata('message', 'Incorect Password !');
        return redirect()->to('/');
    }

    public function logout()
    {
        session()->destroy();
        return redirect('/');
    }
}
