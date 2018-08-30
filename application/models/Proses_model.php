<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_model extends CI_Model {

	var $table					= 'images';
	var $tableDestinasi = 'destinasi';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_database($id_provinsi, $id_destinasi = '')
	{
		$data_where['id_provinsi'] = $id_provinsi;

		if($id_destinasi !=''){
			$data_where['id'] = $id_destinasi;
		}

		$this->db->select('*');
		$this->db->from($this->tableDestinasi);
		$this->db->where($data_where);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_detail($id_provinsi, $id_destinasi = '',$type='')
	{
		$data_where['id_provinsi'] = $id_provinsi;
		$data_where['id'] = $id_destinasi;
		// $data_where = $type;

		$this->db->select($type);
		$this->db->from($this->tableDestinasi);
		$this->db->where($data_where);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_image($id_destinasi = '')
	{
		$data_where['id_destinasi'] = $id_destinasi;

		if($id_destinasi !=''){
			$data_where['id_destinasi'] = $id_destinasi;
		}

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($data_where);
		$query = $this->db->get();

		return $query->result_array();
	}

  public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function saveImage($data_image)
	{
		$this->db->insert($this->table, $data_image);
		return $this->db->insert_id();
	}

	public function saveDetail($data_detail)
	{
		$this->db->insert($this->tableDestinasi, $data_detail);
		return $this->db->insert_id();
	}

	public function saveDestinasi($data_destinasi)
	{
		$this->db->insert($this->tableDestinasi, $data_destinasi);
		return $this->db->insert_id();
	}

	public function update($where, $data_image)
	{
		$this->db->update($this->table, $data_image, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

}
