<?php


class Login_Model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function validate($name, $password){
		$query =$this->db->query("select * from user_login where name='".$name."' and password='$password'");
		return $query->result();
	}
}
