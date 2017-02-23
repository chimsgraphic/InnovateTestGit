<?php

	class APH extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('PHModel');
		}
		
		public function phusers(){
			
			$config['base_url'] = site_url('APH/phusers');
			$this->load->view('header');
			$this->data['phelps'] = $this->PHModel->phAction();
			$this->load->view('admin_ph',$this->data);
			$this->load->view('footer');
		}
		
		
	}
?>