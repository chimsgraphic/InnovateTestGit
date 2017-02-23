<?php

	class Pay extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('PHModel');
		}
		
		public function phusers(){
			
			$config['base_url'] = site_url('Pay/phusers');
			$this->load->view('header');
			$this->data['phelps'] = $this->PHModel->phAction();
			$this->load->view('pay_user',$this->data);
			$this->load->view('footer');
		}
		
		
	}
?>