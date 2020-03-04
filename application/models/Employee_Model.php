<?php
class Employee_Model extends CI_Model
{
	public function view_employee(){
		$query = $this->db->get("employee");
		return $query->result();
	}
	function add_employee($data)
	{
		return $this->db->insert("employee", $data);
	}
	function view_employee_by_id($id)
	{
		$query = $this->db->query("select * from employee where id='$id'");
		return $query->row();
	}
	function update_employee($id, $data){
		 $this->db->where('id', $id);
		 return $this->db->update('employee', $data);
	}
	function employee_delete($id)
	{
		return $this->db->delete("employee", "id = $id");
	}
	function check_duplicate_employee($email){
		 $this->db->where('email',$email);
		 $result = $this->db->get('employee');
		 return $result->num_rows()>0;
	}
	function check_duplicate_employee_by_id($id,$email){
		$this->db->where('id !=',$id);
		$this->db->where('email !=',$email);
		$result = $this->db->get('employee');
		return $result->num_rows()>0;
	}
}
