<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model','users');
	}

	public function index()
	{
		$data['list_user'] = $this->users->list_user();
		$this->load->helper('url');
        $user_login = $this->session->userdata('users_login');
		$name = $user_login['auth_menu'];
        if ($name == 'admin')
		{
			$this->load->view('add_member', $data);
		}
		// Jika bukan username divisi terkait/ admin, Maka tidak diijinkan
		else
		{
			echo "<script>alert('Anda tidak memiliki akses di sesi ini');
					window.location = '".base_url('home')."';
					</script>";
		}

	}

	public function ajax_list()
	{
		$list = $this->users->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $users) {
            $get_divisi_name    = $this->db->get_where('divisi_asset', array('id' => $users->divisi));

            if($users->active == 0) {
                $active_status  = 'Not Active';
                $active_button  = '<span class="btn btn-sm btn-warning" onclick="javascript:active_divisi(\''.$users->id.'\');" title="Active Users"><i class="glyphicon glyphicon-ok"></i> Active</span>';
            } else {
                $active_status  = 'Active';
                $active_button  = '<span class="btn btn-sm btn-warning" onclick="javascript:deactive_divisi(\''.$users->id.'\');" title="Deactive Users"><i class="glyphicon glyphicon-remove"></i> Deactive</span>';
            }

            if($get_divisi_name->num_rows() > 0) {
                $divisi_name        = $get_divisi_name->row()->divisi_name;
                $row_button         = '<span class="btn btn-sm btn-primary" onclick="javascript:edit_divisi(\''.$users->id.'\');" title="Edit Users" data-toggle="modal" data-target="#users_modal"><i class="glyphicon glyphicon-pencil"></i> Edit</span>'.
                                      '<span class="btn btn-sm btn-danger" onclick="javascript:delete_divisi(\''.$users->id.'\');" title="Delete Users"><i class="glyphicon glyphicon-trash"></i> Delete</span>'.
                                      $active_button;
                $user_level         = ucwords(str_replace('-', ' ', $users->user_level));
            } else {
                $divisi_name        = 'Admin';
                $row_button         = '';
                $user_level         = 'Administrator';
            }

            $no++;
			$row = array();
			$row[] = $users->username;
			$row[] = $users->email;
			$row[] = $divisi_name;
			$row[] = $user_level;
			$row[] = $active_status;
			//add html for action
			$row[] = $row_button;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->users->count_all(),
						"recordsFiltered" => $this->users->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->users->get_by_id($id);
    $data->password = $this->encrypt->decode($data->password);
		//$data->order_date = ($data->order_date == '0000-00-00') ? '' : $data->order_date; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
        $today          = date('Y-m-d');

        $data = array(
				'username'          => $this->input->post('username'),
				'email'             => $this->input->post('email'),
				'password'          => $this->encrypt->encode($this->input->post('password')),
				'user_level'        => $this->input->post('user_level'),
				'divisi'            => $this->input->post('divisi'),
				'created_on'        => $today,
				'active'            => 1
		);
		$insert = $this->users->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
        $today          = date('Y-m-d');

        $data = array(
				'id'								=> $this->input->post('id'),
				'username'          => $this->input->post('username'),
				'email'             => $this->input->post('email'),
				'password'          => $this->encrypt->encode($this->input->post('password')),
				'user_level'        => $this->input->post('user_level'),
				'divisi'            => $this->input->post('divisi'),
				'last_update'				=> $today,
				'active'            => 1
		);
		// var_dump($data);
		$this->users->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_active()
	{
        $data = array(
				'active'            => '1'
		);

		$this->users->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_deactive()
	{
        $data = array(
				'active'            => '0'
		);

		$temp = $this->users->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->users->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('confirm_password') == '')
		{
			$data['inputerror'][] = 'confirm_password';
			$data['error_string'][] = 'Confirm Password is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('user_level') == '')
		{
			$data['inputerror'][] = 'user_level';
			$data['error_string'][] = 'User Level is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('divisi') == '')
		{
			$data['inputerror'][] = 'divisi';
			$data['error_string'][] = 'Divisi is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') != $this->input->post('confirm_password'))
		{
			$data['inputerror'][] = 'password';
			$data['inputerror'][] = 'confirm_password';
			$data['error_string'][] = 'Password not match';
			$data['error_string'][] = 'Password not match';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

    public function change_password() {
        $this->template->load('template', 'users_change_view');
    }

    public function do_change_password() {
        $users_login            = $this->session->userdata('users_login');
        $username               = $users_login['username'];

        $get_data_users         = $this->users->get_by_username($username);

        $old_password_decode    = $this->encrypt->decode($get_data_users->password);
        $old_password_input     = $this->input->post('old_password');
        $new_password           = $this->input->post('new_password');
        $new_password_conf      = $this->input->post('conf_new_password');

        if ($old_password_decode == $old_password_input) {
            if($new_password == $new_password_conf) {
                $data_change    = array(
                    'password'  => $this->encrypt->encode($new_password)
                );

                $this->users->update(array('id' => $get_data_users->id), $data_change);

                $result         = 'success';

                $this->session->unset_userdata('users_login');
            } else {
                $result         = 'new_password_not_match';
            }
        } else {
            $result             = 'old_password_wrong';
        }

        echo $result;
        //var_dump($old_password_decode);
        //var_dump($this->input->post());

        exit;
    }

	public function email()
	{
		$this->template->load('template','email');
	}

}
