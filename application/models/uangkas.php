<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function pmt ($where="")
	{
		$data = $this->db->query('select * from pmt'.$where);

		return $data->result_array();
	}

	public function bayi($where="")
	{
		$data = $this->db->query('select * from bayi'.$where);

		return $data->result_array();
	}




	public function insert($table='',$data)
	{
		$res = $this->db->insert($table,$data);

		return $res;
	}

	public function update($table='',$data='',$where)
	{
		$res = $this->db->update($table,$data,$where);

		return $res;
	}

	public function delete($table='',$where)
	{
		$res = $this->db->delete($table,$where);

		return $res;
	}

public function orang_tua($where="")
	{
		$data = $this->db->query('select * from orang_tua'.$where);

		return $data->result_array();
	}
}

