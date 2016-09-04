<?php

class AdminM extends CI_Model{
	Public function getAll(){
		$query = $this->db->get("admin");
		return $query->result();
		}
}