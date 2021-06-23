<?php

class C_Dashboard extends Controller
{
	public function __construct()
	{
		$this->addFunction('url');
		$this->addFunction('web');
	}
	public function index()
	{
		$data = [
			'aktif' => 'dashboard',
			'judul' => 'Dashboard',
		];
		$this->view('dashboard', $data);
	}
}
