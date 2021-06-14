<?php

namespace App\Controllers;

use App\Models\HostModel;
use App\Models\StatusModel;
use App\Models\KategoriModel;

class Status extends BaseController
{

    public function __construct()
    {

        $this->hostModel = new HostModel();
        $this->kategoriModel = new KategoriModel();
        helper('ping');
    }

    public function index()
    {
        $data = [
            'title'     => 'Monitoring Host',
            'kategori'  => $this->kategoriModel->findAll(),
        ];
        return view('pages/status/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAjax()) {
            $categori = $this->request->getVar('id');
            $data = [
                'address'   => $this->hostModel->getKategori($categori)
            ];
            $msg = [
                'data' => view('pages/status/viewconnection', $data)
            ];
            echo json_encode($msg);
        } else {
            return redirect()->to('/home');
        }
    }
}
