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
	public function editA(){
		$this->load->model('CategoryM');
		$data=array(


			);
		$this->load->view('admin/categoryc/cat_edit', $data);
	}

	public function addA(){
		$this->load->model('CategoryM');
		$data=array(


			);
		$this->load->view('admin/categoryc/cat_add', $data);
	}
	

	public function deleteA(){
		$this->load->model('CategoryM');
		$data=array(


			);
		$this->load->view('admin/categoryc/cat_edit', $data);
	}
	public function insert(){
		$this->load->model('CategoryM');
		$data=array(


			);
		$this->load->view('admin/categoryc/cat_edit', $data);
	}
	
}