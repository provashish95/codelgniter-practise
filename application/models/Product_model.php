<?php
class Product_model extends CI_Model{

	public function product_view(){
		$query = $this->db->get("product_table");
		return $query->result();
	}
	public function product_add($data){
		$this->db->insert("product_table", $data);
		return true;
	}
	public function display_productById($id){
		$query=$this->db->query("select * from product_table where id='$id'");
		return $query->result();
	}
	public function update_product($name,$price,$description,$tag,$id){
		$query=$this->db->query("update product_table SET name='$name',price='$price',description='$description',tag='$tag' where id='$id'");

	}
	public function product_delete($id){
		$this->db->delete("product_table", "id = $id");
	}
}
