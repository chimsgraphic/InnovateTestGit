<?php
	class ProductsModel extends CI_Model{
		
		function getProducts(){
			$this->db->select("*");
			//$this->db->select("*");
			//$this->db->from('products');
			//$query = $this->db->get();
			//$this->db->select("id_product,name,description,price");
			//$this->db->select_sum('price');
			//$this->db->select_max('price'); return the highest price
			//$this->db->select_min('price'); return the lowest price
			//$this->db->select_avg('price'); return the average price
			//$this->db->select_sum('price'); return the sum total price
			//$query = $this->db->get('products',3); limit by 3 rows
			$query = $this->db->get('products',4);
			
			
			return $query->result();
		}
	}
?>