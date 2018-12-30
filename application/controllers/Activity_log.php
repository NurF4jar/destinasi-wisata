<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('activity_log_model', 'activity');
	}

	public function index()
	{
    $this->load->view('activity_view');
	}

  public function ajax_list()
  {
    $list = $this->activity->get_datatables();
    $data = array();
    $base_url = base_url();
    $no = $_POST['start'];

    foreach ($list as $activity) {

      $no++;
      $row = array();
      $row[] = ucwords($activity->username);
      $row[] = ucwords($activity->user_level);
      $row[] = $activity->activity;
      $row[] = $activity->log_time;

      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->activity->count_all(),
            "recordsFiltered" => $this->activity->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

}
