<?php

class AdminM extends CI_Model{
	Public function getAll(){
		$query = $this->db->get("admin");
		return $query->result();
		}
	Public function check($data){
		$sql = "SELECT * FROM cz_admin WHERE  admin_name = '{$data['admin_name']}' AND password=  '{$data['password']}' LIMIT 1";
		$query = $this->db->query($sql);
		return $row = $query->row();

	}	
}