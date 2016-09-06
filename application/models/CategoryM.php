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

	public function insert($data){
		return $this->db->insert('cz_category', $data);
	}

	public function delete($cat_id){
		return $this->db->delete('cz_category', array('cat_id' => $cat_id));
	}
	public function getOne($cat_id){
		return $this->db->get_where('cz_category', array('cat_id' =>$cat_id))->result_array();
	}
	public function update($cat_id,$data){
		$this->db->where('cat_id', $cat_id);
		return $this->db->update('cz_category', $data);
	}

}