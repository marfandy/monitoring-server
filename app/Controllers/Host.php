<?php

namespace App\Controllers;

use App\Models\HostModel;
use App\Models\KategoriModel;
use CodeIgniter\I18n\Time;

class Host extends BaseController
{
    // protected $addressModel;

    public function __construct()
    {
        $this->hostModel = new HostModel();
        $this->kategoriModel = new KategoriModel();
        helper('logUser');
    }

    public function index()
    {
        $data = [
            'title'     => 'Host List',
            'address'   => $this->hostModel->getAddress()
        ];
        // $builder = $this->hostModel->getAddress();
        // dd($builder);
        return view('pages/host/index', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Create New Host',
            'validation' => \Config\Services::validation(),
            'kategori'  => $this->kategoriModel->findAll(),

        ];
        return view('pages/host/create', $data);
    }

    public function edit($slug)
    {
        $data = [
            'title'     => 'Edit Host',
            'address'   => $this->hostModel->getAddress($slug),
            'kategori'  => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        if (empty($data['address'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Page Not Found');
        }

        return view('pages/host/edit', $data);
        // return view('coba', $data);
    }

    public function save()
    {
        $img = $this->kategoriModel->where(['name' => $this->request->getVar('categori')])->first();
        $slug = md5($this->request->getVar('address'));

        // validate
        if (!$this->validate([
            'address' => [
                'rules'  => 'required|is_unique[address.address]',
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                    'is_unique' => 'Duplicate {field}!'
                ]
            ]
        ])) {
            return redirect()->to('/host/create')->withInput();
        }

        // telegram
        $data_url = [
            'chat_id' => $this->user_id,
            'text'    => 'New host added successfully'
        ];
        $get_request_url = 'https://api.telegram.org/bot' . $this->token . '/sendMessage?' . http_build_query($data_url);
        $result = file_get_contents($get_request_url);

        // save
        if ($result)
            $this->hostModel->save([
                'device_name'   => $this->request->getVar('device_name'),
                'address'       => $this->request->getVar('address'),
                'slug'          => $slug,
                'location'      => $this->request->getVar('location'),
                'categori'      => $this->request->getVar('categori'),
                'img_kat'       => $img['img'],
                'http'          => 'Disconnect',
                'status'        => 'Disconnect'
            ]);
        log_user('Create host', 'create host ' . $this->request->getVar('device_name') . ' - ' . $this->request->getVar('address'));

        session()->setFlashdata('message', 'New host added successfully');
        return redirect()->to('/host');
    }

    public function update($id_address)
    {

        $addressLama = $this->hostModel->getAddress($this->request->getVar('slug'));
        if ($addressLama['address'] == $this->request->getVar('address')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[address.address]';
        }

        if (!$this->validate([
            'address' => [
                'rules'  => $rule,
                'errors' => [
                    'required'  => 'The {field} field still empty, please fill it!',
                    'is_unique' => 'Duplicate {field}!'
                ]
            ]
        ])) {

            $validation = \Config\Services::validation();
            return redirect()->to('/host/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = md5($this->request->getVar('address'));

        $data_url = [
            'chat_id' => $this->user_id,
            'text'    => 'The Host update successfully'
        ];
        $get_request_url = 'https://api.telegram.org/bot' . $this->token . '/sendMessage?' . http_build_query($data_url);
        $result = file_get_contents($get_request_url);
        if ($result)
            $this->hostModel->save([
                'id_address'    => $id_address,
                'device_name'   => $this->request->getVar('device_name'),
                'address'       => $this->request->getVar('address'),
                'slug'          => $slug,
                'location'      => $this->request->getVar('location'),
                'categori'      => $this->request->getVar('categori'),
            ]);
        log_user('Update host', 'update host ' . $addressLama['device_name'] . ' - ' . $addressLama['address']);

        session()->setFlashdata('message', 'The Host update successfully');
        return redirect()->to('/host');
    }

    public function delete($id_address)
    {
        $data = $this->hostModel->where(['id_address' => $id_address])->first();
        $message = 'Host Name ' . $data['device_name'] . ' address ' . $data['address'] . ' has been remove at ' . Time::now();
        $data_url = [
            'chat_id' => $this->user_id,
            'text'    => $message
        ];
        $get_request_url = 'https://api.telegram.org/bot' . $this->token . '/sendMessage?' . http_build_query($data_url);
        $result = file_get_contents($get_request_url);
        if ($result)
            $this->hostModel->delete($id_address);
        log_user('Delete user', 'delete host ' . $data['device_name'] . ' - ' . $data['address']);

        session()->setFlashdata('message', 'The Host has been removed');
        return redirect()->to('/host');
    }
}
