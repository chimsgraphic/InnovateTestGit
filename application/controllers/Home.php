<?php
	
	class Home extends CI_Controller{
		
		public function __construct(){
			
			parent::__construct();
			$this->load->library(array('session'));
			$this->load->helper(array('url'));
			$this->load->model('auth');
			$this->load->model('ph');
			$this->load->model('PayModel');
		}
		
		public function index(){
			$this->load->helper('url');
			$this->load->view('header');
			$this->load->view('home');
			$this->load->view('footer');
		}
		
		
		public function product(){
			$this->load->view('header');
			$this->data['products'] = $this->ProductsModel->getProducts();
			$this->load->view('products_view',$this->data);
			$this->load->view('footer');
		}
	
		public function payuser(){
				
			$this->load->helper('url');
			$this->load->view('header');
			$this->data['users'] = $this->PayModel->payAction();
			$this->load->view('pay_user',$this->data);
			$this->load->view('footer');
		}
		
		public function signup(){
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
		
		
		
		
		
		public function helpprovided(){
			// create the data object
		    $data = new stdClass();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			// set validation rules
		
		$this->form_validation->set_rules('amount', 'amount', 'required');
			
			if($this->form_validation->run() === false){
				//validation not good, send val errors
				$this->load->view('header');
				$this->load->view('help_notprovided', $data);
				$this->load->view('footer');
			}else{
				//set variables from the form
				$id = $this->input->post('phid');
				$uname    = $this->input->post('uname');
				$amount = $this->input->post('amount');
				
				if($this->ph->provide_help($id,$uname,$amount) && $this->ph->enter($id,$uname,$amount) && $this->ph->payAction($amount)){
					
					// user creation ok
					$this->load->view('header');
					$this->data['users'] = $this->PayModel->payAction($amount);
					$this->load->view('pay_user',$this->data);
				    //$this->load->view('help_provided');
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
		
	
		
		public function dashboard(){
					$this->load->view('header');
				    $this->load->view('dashboard');
				    $this->load->view('footer');
		}
		
		public function login(){
			
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
				$this->load->view('login');
				$this->load->view('footer');
				
			} else {
				
				// set variables from the form
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				if ($this->auth->auth_login($username, $password)){
					
					$user_id = $this->auth->get_user_id_from_username($username);
					$user = $this->auth->get_user($user_id);
					
					// set session user datas
					$_SESSION['user_id']	= (int)$user->id;
					$_SESSION['username']	= (string)$user->username;
					$_SESSION['email']	= (string)$user->email;
					$_SESSION['logged_in']	= (bool)true;
					//$_SESSION['is_confirmed']	= (bool)$user->is_confirmed;
					//$_SESSION['is_admin']		= (bool)$user->is_admin;
					
					// user login ok
					$this->load->view('header');
					$this->load->view('dashboard', $data);
					$this->load->view('footer');
					
					} else {
						
						// login failed
						$data->error = 'Wrong username or Password!';
						
						// send error to the view
						$this->load->view('header');
						$this->load->view('login', $data);
						$this->load->view('footer');
					}
				}
			}
			
			
			
	
			
		}
	

?>