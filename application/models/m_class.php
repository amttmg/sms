<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_class extends CI_Model {

	private $table_name="classes";//table name
	private $table_id="class_id"; //table primary key

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//function for insert data into table.
	public function insert($data)
	{
		$this->db->insert($this->table_name,$data);
	}
	//function for update data into table by table id
	public function update($id)
	{
		$this->db->where($this->_table_name,$id);
		$this->db->update($this->_table_name,$data);
	}
	//table query for table which is common to all
	public function _table_query()
	{
		$this->db->from($this->table_name);
	}
	//function for get all records of table
	public function get_all($field='')
	{
		if($field)
		{
			$this->db->select($field);//this function runs when table field is supplied else select all field 
		}
		$this->_table_query();
		return $this->db->get()->result();
	}
	//function for get record according to table id
	public function get_by_id($id)
	{
		$this->_table_query();
		$this->db->where($this->table_id,$id);
		return $this->db->get()->result();
	}
	//function for hard or soft delete data
	//when call function  with only table id and status value then it will run for soft delete
	//when you call function specified for hard delete then it run for hard delete for that you have to supply hard in third parameter
	public function delete($id,$status_value,$type='soft')
	{
		$this->db->where($this->table_id,$id);
		if($type=='hard')
		{
			$this->db->delet($this->table_name);
		}
		$this->db->update($this->table_name,array('status'=>$status_value));
	}

	public function active($id)
	{
		$this->db->where($table_id,$id);
		$this->db->update($this->table_name,array($table_id,$status_value));
	}
}
