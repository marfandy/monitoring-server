<?php

namespace App\Controllers;

use App\Models\LogUserModel;
use App\Models\LogHostModel;
use App\Models\LogHttpModel;

class Log extends BaseController
{
    public function __construct()
    {
        $this->logUserModel = new LogUserModel();
        $this->logHostModel = new LogHostModel();
        $this->logHttpModel = new LogHttpModel();
    }

    public function index()
    {
        return redirect()->to('log/logUser');
    }

    public function logUser()
    {
        // $keyword = $this->request->getVar('keyword');
        // if ($keyword) {
        //     $key = $this->logUserModel->search($keyword);
        // } else {
        //     $key = $this->logUserModel;
        // }

        // $currentPage = $this->request->getVar('page_logUser') ? $this->request->getVar('page_logUser') : 1;
        $data = [
            'title' => 'Log User Activity',
            'log' => $this->logUserModel->orderBy('id_logUser', 'desc')->findAll(),
            // 'log' => $key->orderBy('id_logUser', 'desc')->paginate(10, 'logUser'),
            // 'pager' => $this->logUserModel->pager,
            // 'currentPage' => $currentPage
        ];
        return view('pages/log/user', $data);
    }

    public function logHost()
    {
        $data = [
            'title' => 'Log Host Connection',
            'log' => $this->logHostModel->orderBy('created_at', 'desc')->findAll(),
        ];
        return view('pages/log/host', $data);
    }

    public function logHttp()
    {
        $data = [
            'title' => 'Log Http Response',
            'log' => $this->logHttpModel->orderBy('created_at', 'desc')->findAll(),
        ];
        return view('pages/log/http', $data);
    }
}
