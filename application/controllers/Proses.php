<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Proses extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Proses_model', 'proses');
    $this->load->model('Activity_log_model', 'activity');
  }

	public function index()
	{
    $this->load->view('index');
	}

	public function add_image()
	{
    $id_destinasi   = $this->uri->segment(4);

    //array image input by POST
            foreach ($this->input->post() as $key => $val):
                if ($this->db->field_exists($key, 'images')) {
                    $data_image[$key]     = $val;
                }
            endforeach;

            $check_data = $this->db->get_where('images', array('id_destinasi' => $id_destinasi ));

            $image1         = $this->input->post('image_1');
            if ($_FILES['image1']['error'] == 0) {
                $image1     = $this->basic->upload_image('image1');

                if ($image1 != NULL || $image1 != '') {
                  $data_image['image1'] = $image1;
                }
            }

            $image2         = $this->input->post('image_2');
            if ($_FILES['image2']['error'] == 0) {
                $image2     = $this->basic->upload_image('image2');

                if ($image2 != NULL || $image2 != '') {
                  $data_image['image2'] = $image2;
                }
            }

            $image3         = $this->input->post('image_3');
            if ($_FILES['image3']['error'] == 0) {
                $image3     = $this->basic->upload_image('image3');

                if ($image3 != NULL || $image3 != '') {
                  $data_image['image3'] = $image3;
                }
            }

            $image4         = $this->input->post('image_4');
            if ($_FILES['image4']['error'] == 0) {
                $image4     = $this->basic->upload_image('image4');

                if ($image4 != NULL || $image4 != '') {
                  $data_image['image4'] = $image4;
                }
            }

            $image5         = $this->input->post('image_5');
            if ($_FILES['image5']['error'] == 0) {
                $image5     = $this->basic->upload_image('image5');

                if ($image5 != NULL || $image5 != '') {
                  $data_image['image5'] = $image5;
                }
            }

            $image6         = $this->input->post('image_6');
            if ($_FILES['image6']['error'] == 0) {
                $image6     = $this->basic->upload_image('image6');

                if ($image6 != NULL || $image6 != '') {
                  $data_image['image6'] = $image6;
                }
            }

            if($check_data->num_rows() > 0) {

              $this->db->where(array('id_destinasi' => $id_destinasi));
              $this->db->update('images', $data_image);

              //Activity LOG
              $user_login = $this->session->userdata('users_login');

              $this->activity->save([
                'username'=>ucwords($user_login['username']),
                'user_level'=>$user_login['user_level'],
                'email'=>$user_login['email'],
                'activity'=>'Update Images'
              ]);
              //Activity LOG

              $id_image = $check_data->row()->id;
              $result = 'success update';
            } else {
              $data_image['id_destinasi']  = $id_destinasi;
              // save data Destinasi
              $this->proses->saveImage($data_image);

              //Activity LOG
              $user_login = $this->session->userdata('users_login');

              $this->activity->save([
                'username'=>$user_login['username'],
                'user_level'=>$user_login['user_level'],
                'email'=>$user_login['email'],
                'activity'=>'Insert Images'
              ]);
              //Activity LOG

              $result   = 'success insert';
            }

            //output untuk feedback js di View
            $result         = array("status" => 'success');

            echo json_encode($result);
  }

  public function add_detail()
  {
    //array Input by POST
    foreach ($this->input->post() as $key => $val):
      if ($this->db->field_exists($key, 'destinasi')) {
          $data_detail[$key]  = $val;
      }
    endforeach;

    // Save Data Detail
    $result   = $this->proses->update($id, $data_detail);

    // Output untuk feedback js di View
    $result   = array("status" => 'success');

    echo json_encode($result);
  }

  public function add_destinasi()
  {
    $id_provinsi    = $this->uri->segment(3);
    $id_destinasi   = $this->uri->segment(4);

    foreach ($this->input->post() as $key => $val):
      if ($this->db->field_exists($key, 'destinasi')) {
          $data_destinasi[$key] = $val;
      }
    endforeach;

    $check_data = $this->db->get_where('destinasi', array('id_provinsi' => $id_provinsi, 'id' => $id_destinasi ));

    if($check_data->num_rows() > 0) {

      $this->db->where(array(
          'id_provinsi' => $id_provinsi,
          'id' => $id_destinasi)
      );
      $this->db->update('destinasi', $data_destinasi);

      //Activity LOG
      $user_login = $this->session->userdata('users_login');

      $this->activity->save([
        'username'=>$user_login['username'],
        'user_level'=>$user_login['user_level'],
        'email'=>$user_login['email'],
        'activity'=>'Update Detail'
      ]);
      //Activity LOG

      $id_destinasi = $check_data->row()->id;

      $result = 'success';
    } else {
      $data_destinasi['id_provinsi']  = $id_provinsi;
      // save data Destinasi
      $this->proses->saveDestinasi($data_destinasi);

      $result   = 'success';
    }

    // Output untuk feedback js di View
    $result   = array("status" => $result);

    echo json_encode($result);
  }

}
