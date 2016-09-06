<?php
class CategoryC extends CI_Controller{
	

	public function __construct(){
			parent::__construct(); 
			if (!isset($_SESSION['admin'])){		
				$data=array(
					'wait'=>3,
					'url'=>site_url('admin/loginc/login'),
					'message'=>'u need to log in first~',
					);
				$this->load->view('admin/message', $data);
		}
	}

	//category show list:
	public function listA(){
		$this->load->model('CategoryM');
		$result=$this->CategoryM->getAll();
		// var_dump($result);
		$data=array(
			'cats'=>$result,
			);
		$this->load->view('admin/categoryc/cat_list', $data);
	}
	public function editA($cat_id){
		$this->load->model('CategoryM');
		$result =$this->CategoryM->getOne($cat_id);
		$result_All=$this->CategoryM->getAll();
		$data=array(
			'cat'=>$result[0],
			'cats'=>$result_All,
			);
		// var_dump($data);
		$this->load->view('admin/categoryc/cat_edit', $data);
	}

	public function addA(){
		$this->load->model('CategoryM');
		$result=$this->CategoryM->getAll();
		
		$data=array(
			'cats'=>$result,
			);
		$this->load->view('admin/categoryc/cat_add',$data);
	}
	

	public function deleteA($cat_id){
		$this->load->model('CategoryM');
		if($this->CategoryM->delete($cat_id)){
			$this->load->view('admin/message', array(
				'wait'=>2,
				'url'=>site_url('admin/categoryc/lista'),
				'message'=>'delete success~',
				));
		}else{
			$this->load->view('admin/message', array(
				'wait'=>2,
				'url'=>site_url('admin/categoryc/lista'),
				'message'=>'delete fail~',
				));
		}

	}
	public function insert(){
		
		$data=array(
			'cat_name'=>$this->input->post('cat_name'),
			'parent_id'=>$this->input->post('parent_id'),
			'unit'=>$this->input->post('unit'),
			'sort_order'=>$this->input->post('sort_order'),
			'is_show'=>$this->input->post('is_show'),
			'cat_desc'=>$this->input->post('cat_desc'),			

			);
		$this->load->model('CategoryM');

		if ($this->CategoryM->insert($data))
		redirect(site_url('admin/categoryc/lista'));
		else{
			$this->load->view('admin/message', array(
				'wait'=>3,
				'url'=>site_url('admin/categoryc/lsita'),
				'message'=>'u need to log in first~',
				));
		} 
	}

	public function updateA($cat_id){
		$data=array(
			'cat_name'=>$this->input->post('cat_name'),
			'parent_id'=>$this->input->post('parent_id'),
			'unit'=>$this->input->post('unit'),
			'sort_order'=>$this->input->post('sort_order'),
			'is_show'=>$this->input->post('is_show'),
			'cat_desc'=>$this->input->post('cat_desc'),			

			);
		$this->load->model('CategoryM');
		;
		// var_dump($data);
		if($this->CategoryM->update($cat_id,$data)){
			$this->load->view('admin/message', array(
				'wait'=>2,
				'url'=>site_url('admin/categoryc/lista'),
				'message'=>'update success~',
				));
		}else{
			$this->load->view('admin/message', array(
				'wait'=>2,
				'url'=>site_url('admin/categoryc/lista'),
				'message'=>'update fail~',
				));
		}

	}
	
}