<?php
class Ajax_employee extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Ajax_employee_Model');
	}
	public function index(){
		$this->load->view('layout/header');
		$this->load->view('ajax_employee/ajax_employee_view');
		$this->load->view('layout/footer');
	}
	public function show_all_employee(){
		$result = $this->Ajax_employee_Model->showAllEmployee();
		echo json_encode($result);
	}
	public function add_employee(){
		$data = array(
			'name'=>$this->input->post('name'),
			'address'=>$this->input->post('address'),
		);
		$result = $this->Ajax_employee_Model->add_employee($data);
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
