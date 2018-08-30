<?php
class Login_model extends CI_Model{
	function __construct(){
		$this->load->database(); //Berfungsi untuk memanggil database
		}

    function check_user($username) {
        $this->db->select('*');
        $this->db->from('users_login');
        $this->db->where('username', $username);

        return $this->db->get();
    }
	//Berfungsi untuk mengambil data pada tabel user yang ada di database kita
	function ambil_data($data){
		$user = $this->db->get_where('users_login', $data);
		return $user->num_rows();
	}

    function auth_menu($id_divisi) {
        $this->db->select('*');
        $this->db->from('users_login');
        $this->db->where('id', $id_divisi);

        return $this->db->get();
    }

	function role($username){
		$divisi = $this->db->query("select divisi from users_login where username = '$username'");
		return $divisi;
	}
}
