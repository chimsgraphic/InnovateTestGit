<?php

	class ProvideHelp extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('auth');
		}
		
		public function index(){
			
			$config['base_url'] = site_url('ProvideHelp/index');
			
			$data = new stdClass();
			
			// set session user datas
					$_SESSION['user_id']	= (int)$user->id;
					$_SESSION['username']	= (string)$user->username;
					$_SESSION['email']	= (string)$user->email;
					$_SESSION['logged_in']	= (bool)true;
					
			$this->load->view('header');
			$this->load->view('dashboard');
			$this->load->view('footer');
		}
		
		
	}
?>