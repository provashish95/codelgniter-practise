<?php
class Product_model extends CI_Model{

	public function product_view(){
		$query = $this->db->get("product_table");
		return $query->result();
	}
	public function product_add($data){
		return $this->db->insert("product_table", $data);
	}
	public function view_product_by_id($id){
		$query=$this->db->query("select * from product_table where id='$id'");
		return $query->row();
	}
	public function update_product($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('product_table', $data);
	}
	public function product_delete($id){
		return $this->db->delete("product_table", "id = $id");
	}
	public function check_duplicate_product($name){
		$this->db->where('name',$name);
		$result = $this->db->get('product_table');
		return $result->num_rows()>0;
	}
	public function check_duplicate_product_by_id($id, $name){
		$this->db->where('id !=',$id);
		$this->db->where('name !=',$name);
		$result = $this->db->get('product_table');
		return $result->num_rows()>0;
	}
	public function show_all_products(){
		$query = $this->db->get("product_table");
		return $query->result();
	}
}
