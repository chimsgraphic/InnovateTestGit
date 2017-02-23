<?php
	
	class PHModel extends CI_Model{
		
		function phAction(){
			$this->db->select('*');
			$this->db->from('tbl_ph');
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		
	}
?>