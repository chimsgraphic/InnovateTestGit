<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class AuthAdmin extends CI_Model{
   	
   		public function __construct(){
			
			parent::__construct();
			$this->load->database();
		}
		
		public function signup_user($username,$email,$password){
			
			$data = array(
				'username'	=> $username,
				'email'		=> $email,
				'password'	=> $this->hash_password($password),
				'created'	=> date('Y-m-j H:i:s'),
			);
			
			return $this->db->insert('users',$data);
		}
		
		public function auth_login($username, $password){
			
			$this->db->select('password');
			$this->db->from('admin');
			$this->db->where('username', $username);
			$hash = $this->db->get()->row('password');
			
			return $this->auth_password_hash($password, $hash);
		}
		
		public function get_user_id_from_username($username){
			
			$this->db->select('id');
			$this->db->from('admin');
			$this->db->where('username', $username);
			
			return $this->db->get()->row('id');
		}
		
		public function get_user($user_id){
			
			$this->db->from('admin');
			$this->db->where('id', $user_id);
			
			return $this->db->get()->row();
		}
		
		private function hash_password($password) {
		
			return password_hash($password, PASSWORD_BCRYPT);
		
	  	}
	  
	  	private function auth_password_hash($password, $hash){
	  	
	  		return password_verify($password, $hash);
	  	}
   }
  
?>