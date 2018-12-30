<?php if(!defined('BASEPATH')) exit('No direct script acces allowed');
class Login extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model', 'login'); //Berfungsi untuk memanggil login_model
		$this->load->library('encrypt');
		$this->load->library('session');
	}

	//Berfungsi untuk menampilkan halaman login_model
	function index()
	{
		$data=array(
			'title' => 'Login Administrator',
			'isi' => 'admin/login_view'
			);
		$this->load->view('admin/login_view', $data);
	}

	//Berfungsi untuk melakukan validasi login
	public function validasi()
	{
        $result     = '';
				$username 	= $this->input->post('username');
        $password 	= $this->input->post('password');
		//Berfungsi untuk memanggil fungsi ambil_data pada class login_model
		$cek_users  = $this->login->check_user($username);

        if ($cek_users->num_rows() > 0) {
            $password_decode    = $this->encrypt->decode($cek_users->row()->password);

            if($cek_users->row()->active == '1') {
                if($password == $password_decode) {
                    $divisi         = $cek_users->row()->divisi;

                    if($divisi == 0 || $divisi == 1 || $divisi == 2 || $divisi == 3) {
                        $auth_menu      = 'admin';
                        $redirect       = 'home';
                    }// } else {
                    //     $auth_divisi    = $this->login->auth_menu($divisi);
                    //     $auth_menu      = $auth_divisi->row()->user_level;
                    //
                    //     if ($auth_menu == 'editor') {
                    //         // $users_menu = 'dashboard_ga';
										// 				$redirect       = 'home';
                    //     }
                    //
                    // }

                    $data_users     = array(
                        'username'  => $username,
                        'auth_menu' => $auth_menu,
                        'email'     => $cek_users->row()->email,
                        'user_level'=> $cek_users->row()->user_level,
                        'divisi'    => $divisi
                    );


                    $this->session->set_userdata('users_login', $data_users);

                    $result         = $redirect;
                } else {
                    $result         = 'password_not_match';
                }
            } else {
                $result         = 'user_not_active';
            }
        } else {
            $result         = 'user_not_exist';
        }

      echo $result;
	}

    public function do_forget_password() {
        $result     = '';
        $email      = $this->input->post('email');

        $chek_user  = $this->db->get_where('users_login', array('email' => $email));

        if ($chek_user->num_rows() > 0) {
            $new_password      = $this->random->getRandom(10,10);

            // KIRIM EMAIL KE KARYAWAN BARU DARI HRD
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtpapps.detik.com',
                'smtp_port' => 25,
                //'smtp_port' => 465, //SSL
                //'smtp_port' => 587, //TSL
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('assets@detik.com');
            $this->email->to($email);
            $this->email->subject('Change Password for assets.detik.com, '.ucwords($email).'');

            $this->email->message('
                <div style="margin: 0;padding: 1px 1px;">
                    <label style="display: block; font-size: 16px; font-weight: bold; text-align: center; margin-bottom: 15px;">Assets.detik.com</label>

                    <div>
                        Informasi Akun <br /><br />

                            Username : '.$chek_user->row()->username.'<br />
                            New Password : '.$new_password.'<br />
                            <br />
                        Segara ganti password kamu.<br /><br />
                    </div>
                    <div>
                        Best Regards,<br />
                        Assets.detik.com
                    </div>
                </div>
            ');

            $sendmail   = $this->email->send();

            $this->db->where('email', $email);
            $this->db->update('users_login', array('password' => $this->encrypt->encode($new_password)));
        } else {
            $result     = 'user_not_exist';
        }

        echo $result;
    }

		function forget_password() {
				$this->load->view('forget_password_view');
		}
}
