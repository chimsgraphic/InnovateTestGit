<?php
	
	class GHModel extends CI_Model{
		
		function ghAction(){
			$this->db->select('*');
			$this->db->from('tbi_gh');
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		
	}
?>