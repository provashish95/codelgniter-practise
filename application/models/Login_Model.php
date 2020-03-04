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
		return $this->db->insert("admin", $data);

	}
	public function check_duplicate_admin($name){
		$result = $this->db->select('name')->where('name',$name)->get('admin');
		return $result->num_rows()>0;
	}
	public function view_admin_by_id($id){
		$query=$this->db->query("select * from admin where id='$id'");
		return $query->row();
	}
	public function update_admin($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('admin', $data);
	}
	public function admin_delete($id){
		return $this->db->delete("admin", "id = $id");
	}
	public function check_duplicate_admin_by_id($id,$name){
		$this->db->where('id !=',$id);
		$this->db->where('name !=',$name);
		$result = $this->db->get('admin');
		return $result->num_rows()>0;
	}
}
