<?php

class IndexC extends CI_Controller{

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