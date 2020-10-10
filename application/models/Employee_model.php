<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function get_employee()
	{
		$this->db->select('emp_id, emp_name, emp_email, emp_address, emp_dob, emp_phone,emp_image');
		$this->db->from('tbl_employee');
		$q = $this->db->get();
		return $q->result();
	}

	public function get_employee_id($emp_id)
	{
		$this->db->select('emp_id, emp_name, emp_email, emp_address, emp_dob, emp_phone,emp_image');
		$this->db->from('tbl_employee');
		$this->db->where('emp_id',$emp_id);
		$q = $this->db->get();
		return $q->row();
	}
}