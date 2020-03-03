<?php
class User_Model extends CI_Model
{
	public function view_users(){
		$query = $this->db->get("user_login");
		return $query->result();
	}
	function add_user($data)
	{
		$this->db->insert("user_login", $data);
		return true;
	}
	function display_user_by_id($id)
	{
		$query = $this->db->query("select * from user_login where id='$id'");
		return $query->row();

	}
	function update_user($name,$email,$password,$id){
		$query=$this->db->query("update user_login SET name='$name',email='$email',password='$password' where id='$id'");
	}

	function user_delete($id)
	{
//		$this->db->where('id', $id);
//     	$this->db->delete('user_login');

		$this->db->delete("user_login", "id = $id");
	}
}
