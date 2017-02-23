<?php

	class Admin extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('AuthAdmin');
			$this->load->model('PHModel');
		}
		
		
		public function phusers(){
			
			$config['base_url'] = site_url('Admin/phusers');
			$this->load->view('header');
			$this->data['phelps'] = $this->PHModel->phAction();
			$this->load->view('admin_ph',$this->data);
			$this->load->view('footer');
		}
		
		
		public function signin(){
			
			$config['base_url'] = site_url('Admin/signin');
			
	
			
			$this->load->helper('url');
			// create the data object
			$data = new stdClass();
			
			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			// set validation rules
			$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
			$this->form_validation->set_rules('password','Password','required');
			
			if($this->form_validation->run() == false){
				
				// validation not ok, send validation errors to the view
				$this->load->view('header');
				$this->load->view('admin');
				$this->load->view('footer');
				
			} else {
				
				// set variables from the form
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				if ($this->AuthAdmin->auth_login($username, $password)){
					
					$user_id = $this->AuthAdmin->get_user_id_from_username($username);
					$user = $this->AuthAdmin->get_user($user_id);
					
					// set session user datas
					$_SESSION['user_id']	= (int)$user->id;
					$_SESSION['username']	= (string)$user->username;
					//$_SESSION['email']	= (string)$user->email;
					$_SESSION['logged_in']	= (bool)true;
					//$_SESSION['is_confirmed']	= (bool)$user->is_confirmed;
					//$_SESSION['is_admin']		= (bool)$user->is_admin;
					
					// user login ok
					$this->load->view('header');
					$this->load->view('admindashboard', $data);
					$this->load->view('footer');
					
				
					
					} else {
						
						// login failed
						$data->error = 'Wrong username or Password!';
						
						// send error to the view
						$this->load->view('header');
						$this->load->view('admin', $data);
						$this->load->view('footer');
					}
				}
			}
	}	
?>