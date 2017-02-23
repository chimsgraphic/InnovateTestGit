<?php

	class AGH extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('GHModel');
		}
		
		public function ghusers(){
			
			$config['base_url'] = site_url('AGH/ghusers');
			$this->load->view('header');
			$this->data['ghelps'] = $this->GHModel->ghAction();
			$this->load->view('admin_gh',$this->data);
			$this->load->view('footer');
		}
		
		
	}
?>