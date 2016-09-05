<?php
class LoginC extends CI_Controller{
	public function login(){
		// var_dump(site_url('admin/loginc/captcha')) ;
		$this->load->view('admin/loginc/login',array(
			'error_message'=>NULL,
			));
	}

	public function captcha(){
		//load:helper
		$this->load->helper('captcha');
		//rewrith the captcha class;
		$cache = new Captcha();
		$cache->generateCode();
		$_SESSION['captcha'] =$cache->getCode();

	}
	public function signin(){

		$data = array(
			'admin_name'=>$this->input->post('admin_name'),
			'password'=>$this->input->post('password'),
			'captcha'=>$this->input->post('captcha'),
		);
		if ($data['captcha']==$_SESSION['captcha']){
		// var_dump($data);
		$this->load->model('AdminM');
		
		// var_dump($this->AdminM->check($data));
		if($row=$this->AdminM->check($data)){
			var_dump($row);
			$_SESSION['admin']=$row->admin_name;
			$_SESSION['password']=$row->password;
			$_SESSION['email']=$row->email;
			redirect(site_url('admin/indexc/index'),array(
			'error_message'=>NULL,
			));
		}
		else{
			redirect(site_url('admin/loginc/login'),array(
			'error_message'=>NULL,
			));
		}
	}else{

		$this->load->view('admin/loginc/login',array(
			'error_message'=>'captcha wrong',
			));
	}


	}
}