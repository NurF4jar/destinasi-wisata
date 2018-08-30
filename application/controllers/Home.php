<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proses_model', 'proses');
	}

	public function index()
	{
    $this->load->view('index');
	}

	public function dashboard()
	{
		$this->load->view('dashboard');
	}

	public function detail()
	{
		$data['id_provinsi']		= $this->input->get('id_provinsi');
		$data['id_destinasi']		=	$this->input->get('id_destinasi');
		$data['type']						= $this->input->get('type');

		$data_view['database_destinasi'] = $this->proses->get_detail($data['id_provinsi'], $data['id_destinasi'], $data['type']);

		$this->load->view('detail', $data_view);
	}

}
