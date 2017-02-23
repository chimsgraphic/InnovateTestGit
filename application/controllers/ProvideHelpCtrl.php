<?php

	class ProvideHelpCtrl extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('PH');
		}
		
		public function index(){
			// create the data object
		    $data = new stdClass();
			$this->load->helper('url');
			$this->load->helper('form');
			//$this->load->library('form_validation');
			
			
		
				//validation not good, send val errors
				$this->load->view('header');
				$this->load->view('dashboard', $data);
				$this->load->view('footer');
				
				//set variables from the form
				$id = $this->input->post('phid');
				$uname    = $this->input->post('uname');
				$amount = $this->input->post('amount');
				
				if($this->ph->provide_help($id,$uname,$amount)){
					
					// user creation ok
					$this->load->view('header');
				    $this->load->view('dashboard', $data);
				    $this->load->view('footer');
				}else{
					$data->error = 'There was a problem creating your new account';
					
					//send error to the view
					$this->load->view('header');
				    $this->load->view('dashboard', $data);
				    $this->load->view('footer');
				}
			}	
			
		}
?>