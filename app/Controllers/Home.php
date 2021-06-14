<?php

namespace App\Controllers;

use App\Models\HostModel;

class Home extends BaseController
{

	public function __construct()
	{
		$this->hostmodel = new HostModel();
	}

	public function index()
	{

		$data = [
			'title' => 'Home',
			'totalhost' => $this->hostmodel->countAll(),
			'connect' => $this->hostmodel->where('status', 'Connect')->countAllResults(),
			'disconnect' => $this->hostmodel->where('status', 'Disconnect')->countAllResults(),
			'http' => $this->hostmodel->where('http', 'Connect')->countAllResults(),
		];
		return view('pages/home/index', $data);
	}

	public function getdata()
	{
		if ($this->request->isAjax()) {
			$status = $this->request->getVar('status');
			$data = [
				'address'   => $this->hostmodel->homeStatus($status)
			];
			$msg = [
				'data' => view('pages/status/viewconnection', $data)
			];
			echo json_encode($msg);
		} else {
			return redirect()->to('/home');
		}
	}

	//Ternari operator if else
	//<?= ($validation->hasError('judul')) ? 'is-invalid' : ''; >?
	// foreach ($data as $a) :
	// endforeach;
	//--------------------------------------------------------------------

}
