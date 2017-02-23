<?php

	class Signup extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('Auth');
		}
		
		public function register(){
			
			$config['base_url'] = site_url('Signup/register');
			
			
			// create the data object
		    $data = new stdClass();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
			
			if($this->form_validation->run() === false){
				//validation not good, send val errors
				$this->load->view('header');
				$this->load->view('signup', $data);
				$this->load->view('footer');
			}else{
				//set variables from the form
				$username = $this->input->post('username');
				$email    = $this->input->post('email');
				$password = $this->input->post('password');
				
				if($this->auth->signup_user($username,$email,$password)){
					
					// user creation ok
					$this->load->view('header');
				    $this->load->view('signup_succ', $data);
				    $this->load->view('footer');
				}else{
					$data->error = 'There was a problem creating your new account';
					
					//send error to the view
					$this->load->view('header');
				    $this->load->view('signup', $data);
				    $this->load->view('footer');
				}
			}	
		}
		
		
	}
?>