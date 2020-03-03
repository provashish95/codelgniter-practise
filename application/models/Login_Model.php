<?php
class Login_Model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function validate($name, $password){
		$query =$this->db->query("select * from admin where name ='".$name."' and password='$password'");
		return $query->result();
	}
	public function view_admins(){
		$query = $this->db->get("admin");
		return $query->result();
	}
	public function add_account($data){
		$this->db->insert("admin", $data);
		return true;
	}
	public function check_duplicate_admin($name){
		return $this->db->select('name')
		              ->where('name',$name)
			              ->get('admin');
	}
	public function view_admin_by_id($id){
		$query=$this->db->query("select * from admin where id='$id'");
		return $query->row();
	}
	public function update_admin($name,$email,$password,$id){
		return	$query=$this->db->query("update admin SET name='$name',email='$email',password='$password' where id='$id'");

	}
	public function admin_delete($id){
		return $this->db->delete("admin", "id = $id");
	}
}
