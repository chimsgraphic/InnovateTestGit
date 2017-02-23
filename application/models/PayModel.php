<?php
	
	class PayModel extends CI_Model{
		
		function payAction(){
			
			$data = "5000";
			$this->db->select('*');
			$this->db->from('tbi_gh');
			$this->db->where('amount',$data);
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		
	}
?>