<?php
class Employee_Model extends CI_Model
{
	public function view_employee(){
		$query = $this->db->get("employee");
		return $query->result();
	}
	function add_employee($data)
	{
		$this->db->insert("employee", $data);
		return true;
	}
	function display_employee_by_id($id)
	{
		$query = $this->db->query("select * from employee where id='$id'");
		return $query->row();

	}
	function update_employee($name,$email,$phone,$address,$NID,$department,$id){
		return $query=$this->db->query("update employee SET name='$name',email='$email',phone='$phone',address='$address',NID='$NID',department='$department' where id='$id'");
	}

	function employee_delete($id)
	{
		return $this->db->delete("employee", "id = $id");
	}
}
