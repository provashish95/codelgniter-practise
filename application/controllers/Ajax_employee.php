<?php
class Ajax_employee extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->model('Ajax_employee_Model');
	}
	public function index(){
		$this->load->view('layout/header');
		$this->load->view('ajax_employee/ajax_employee_view');
		$this->load->view('layout/footer');
	}
	public function show_all_employee(){
		$result = $this->Ajax_employee_Model->show_all_employee();
		echo json_encode($result);
	}
	public function add_employee(){
		$data = array(
			'name'   =>$this->input->post('name'),
			'address'=>$this->input->post('address'),
		);
		$result = $this->Ajax_employee_Model->add_employee($data);
		echo json_encode($result);
	}
	public function edit_employee(){
		$id     = $this->input->get('id');
		$result = $this->Ajax_employee_Model->edit_employee($id);
		echo json_encode($result);
	}
	public function update_employee(){
		$id   = $this->input->post('id');
		$data = array(
			'name'   =>$this->input->post('name'),
			'address'=>$this->input->post('address'),
		);
		$result = $this->Ajax_employee_Model->update_employee($id, $data);
		$msg['success'] = false;
		$msg['type']    = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function delete_employee(){
		$id = $this->input->get('id');
		$result = $this->Ajax_employee_Model->delete_employee($id);
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
