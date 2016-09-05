<?php

class IndexC extends CI_Controller{
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
	public function index(){
		
		$this->load->view('admin/indexc/index');
		
		
	}
	public function main(){

		$this->load->model('AdminM');
	 	$data['admins']=$this->AdminM->getAll();
	 	//var_dump($data);
		$this->load->view('admin/indexc/main',$data);
	}
	public function menu(){
		$this->load->view('admin/indexc/menu');
	}
	public function drag(){
		$this->load->view('admin/indexc/drag');
	}
	public function top(){
		$this->load->view('admin/indexc/top');
	}
}