<?php
class Ajax_employee_Model extends CI_Model{
     public function show_all_employee(){
		 $query = $this->db->get('tbl_employees');
		 if($query->num_rows() > 0){
			 return $query->result();
		 }else{
			 return false;
		 }
	 }
	 public function add_employee($data){
		 $this->db->insert("tbl_employees", $data);
		 if($this->db->affected_rows() > 0){
			 return true;
		 }else{
			 return false;
		 }
	 }
	 public function edit_employee($id){
		 $this->db->where('id', $id);
		 $query = $this->db->get('tbl_employees');
		 if($query->num_rows() > 0){
			 return $query->row();
		 }else{
			 return false;
		 }
	 }
}
