<?php

class CategoryM extends CI_Model{

	public function getAll(){
		$query = $this->db->query('SELECT * FROM cz_category');
		return $this->resort($query->result_array());

	}

	public function resort($arr,$pid =0,$level=0){
		static $res = array();
		foreach ($arr as $as){
			if ($as['parent_id']==$pid) {
				$as['level']=$level;
				$res[]=$as;
				$this->resort($arr,$as['cat_id'],$level+1);
			}
		}
		return $res;
	}
}