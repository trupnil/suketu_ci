<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function __construct()
	{

	}

	public function insertdata($table,$data)
	{
		//print_r($data);
		//
		
		return  $this->db->insert($table,$data);
	}

	public function select_all(string $table)
	{
		
		$this->db->select('*');
		$this->db->from($table);
		$r = $this->db->get();	
		return $r->result();	

	}


	public function join(string $table1,string $table2,string $con)
	{
		
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,$con);
		$r = $this->db->get();	
		return $r->result();	

	}


	public function join_three(string $table1,string $table2,string $table3,string $con1,string $con2)
	{
		
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,$con1);
		$this->db->join($table3,$con2);
		$r = $this->db->get();	
		return $r->result();	

	}


	public function select_where(string $table,array $where)
	{
		
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$r = $this->db->get();	
		return $r->result();	

	}

	public function delete($table,$where)
	{
		return $this->db->delete($table,$where);

	}

	public function update($table,$data,$where)
	{
		return $this->db->update($table,$data,$where);
	}



	
	
}
