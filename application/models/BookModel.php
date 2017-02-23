<?php
	
	class BookModel extends CI_Model{
		
		function innerJoinBooks(){
			$this->db->select('book_id, book_name, author_name, category_name');
			$this->db->from('books');
			$this->db->join('category','category.category_id = books.category_id');
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		// Inner Join with condition
		function innerJoinCBooks(){
			$this->db->select('book_id, book_name, author_name, category_name');
			$this->db->from('books');
			$this->db->join('category','category.category_id = books.category_id');
			$this->db->where('category_name','Self Development');
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		// Multiple Join to more than one table
		function multiJoinBooks(){
			$this->db->select('books.book_id, book_name, category_name, no_copies');
			$this->db->from('books');
			$this->db->join('category','category.category_id = books.category_id');
			$this->db->join('orders','orders.book_id = books.book_id');
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		//Left Join two tables
		function leftJoinBooks(){
			$this->db->select('books.book_id, book_name, author_name, no_copies, order_date');
			$this->db->from('books');
			$this->db->join('orders', 'orders.book_id = books.book_id','left');
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		//Right Join two tables
		function rightJoinBooks(){
			$this->db->select('book_id, book_name, author_name, category_name');
			$this->db->from('books');
			$this->db->join('category','category.category_id = books.category_id', 'right');
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		//Outer Join
		function outerJoinBooks(){
			$this->db->select('book_id, book_name, author_name, category_name');
			$this->db->from('books');
			$this->db->join('category','category.category_id = books.category_id','outer');
			
			$query = $this->db->get();
			
			return $query->result();
	    }
	}
?>