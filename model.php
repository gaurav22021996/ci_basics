<?php
	class Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
					
		}
		function insert($data)
		{
			$this->db->insert("users", $data);
		}
		function update($data)
		{
			$this->db->set($data)
			->where('id',2)
			->update('users', $data);
		}
		function delete_rec()
		{
			$this->db->delete('users', array('id'=>2, 'name'=>'gaurav singh'));
		}
	}
?>