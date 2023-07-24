<?php

class Membership_model extends CI_Model
{

	function validate()
	{
		$where = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		
		// $this->db->select('*')->from('membership')->where($where);
		$this->db->select('*');
		$this->db->from('membership');
		$this->db->where($where);

		$query = $this->db->get();

		if ($query->num_rows() >= 1) {
			// return true;
			return $query->first_row('array');
		}
		// return $this->db->last_query();
		return false;
	}

	function create_member()
	{

		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);

		$insert = $this->db->insert('membership', $new_member_insert_data);
		return $insert;
	}
}
