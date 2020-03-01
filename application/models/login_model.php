<?php


class Login_Model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
//	function userExists($name) {
//		$this->db->select('id');
//		$this->db->where('name',$name);
//		$query = $this->db->get('user_login');
//
//		if ($query->num_rows() > 0) {
//			return true;
//		} else {
//			return false;
//		}
//	}
//	function passwordCorrect($name){
//		$this->db->select('password');
//		$this->db->where('name', $name);
//		$query = $this->db->get('user_login');
//		$result = $query->row();
//		return $result->password;
//		if ('password' ==$password ) {
//			return true ;
//		} else {
//			return false;
//		}

//	}

	public function validate(){
		$name = $this->security->xss_clean($this->input->post('name'));
		$password = $this->security->xss_clean($this->input->post('password'));

		$this->db->where('name', $name);
		$this->db->where('password', $password);
		$query = $this->db->get('user_login');
		if($query->num_rows == 1) {
			$row = $query->row();
			$data = array(
				'fname' => $row->fname,
				'lname' => $row->lname,
				'username' => $row->username,
				'validated' => true
			);
			$this->session->set_userdata($data);
			return true;
		}
		return false;
	}


}
