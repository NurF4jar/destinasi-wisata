<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_activity extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('log_model', 'log');
	}

	public function index()
	{
    $this->load->view('log_activity');
	}

}
