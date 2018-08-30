<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

	// var $proses = "";
	public function __construct()
  {
    parent::__construct();
    $this->load->model('proses_model', 'proses');
		$this->load->model('users_model', 'users');
		$this->load->helper('text');
  }

	public function index()
	{
    $this->load->view('index');
		// $this->load->model('proses_model', 'proses');
	}

	public function input()
	{
		if(!empty($this->input->post())) {
		}
		$data['id_provinsi']		= $this->input->get('id_provinsi');
		$data['id_destinasi']		=	$this->input->get('id_destinasi');

		$data['database_destinasi'] = $this->proses->get_database($data['id_provinsi'], $data['id_destinasi']);
		// var_dump($data['database_destinasi']);
		$data['database_image'] = $this->proses->get_image($data['id_destinasi']);

		$user_login = $this->session->userdata('users_login');
		$name       = $user_login['auth_menu'];

		// if ($name == 'admin') {
			$this->load->view('dashboard_nodata', $data);
		// } else {
		// 	$provinsi = $data['id_provinsi'];
		// 	// var_dump($provinsi);
		// 	$this->load->view('dashboard');
		// }
	}

	public function add_members()
	{
		$data['list_user'] = $this->users->list_user();
		// var_dump($data);
		$this->load->view('add_member', $data);
	}

	public function input_detail()
	{
		$result         = array("status" => 'success');

		echo json_encode($result);

	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('/'));
	}

}
