<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class PH extends CI_Model{
   	
   		public function __construct(){
			
			parent::__construct();
			$this->load->database();
		}
		
		public function provide_help($id,$uname,$amount){
			
			$data = array(
				'phid'		=> $id,
				'uname'		=> $uname,
				'amount'	=> $amount,
			);
			//return $this->db->insert('tbl_gi',$data);
			return $this->db->insert('tbl_ph',$data);
		}
		
		
		public function enter($id,$uname,$amount){
			
			$data = array(
				'phid'		=> $id,
				'uname'		=> $uname,
				'amount'	=> $amount,
			);
			//return $this->db->insert('tbl_gi',$data);
			return $this->db->insert('tbi_gh',$data);
		}
		
		
		function payAction($amount){
			
			$data = "5000";
			
			
			
			$this->db->select('*');
			$this->db->from('tbi_gh');
			$this->db->where('amount',$data);
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
	
		
		
   }
  
?>