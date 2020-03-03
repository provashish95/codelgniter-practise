<?php
class Employee extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Employee_Model');
		$this->load->model('Login_Model');
		$this->load->helper('form');
		$this->load->library('session');
	}
	public function index()
	{
		$data['employers'] = $this->Employee_Model->view_employee();
		$this->load->view('employee/employee_view', $data);
	}
	public function create_employee(){
		$this->load->view('employee/add_employee');
	}
	public function add_employee() {
		$data = array(
			'name'       => $this->input->post('name'),
			'email'      => $this->input->post('email'),
			'phone'      => $this->input->post('phone'),
			'address'    => $this->input->post('address'),
			'NID'        => $this->input->post('NID'),
			'department' => $this->input->post('department')
		);
		$result = $this->Employee_Model->add_employee($data);
		if ($result == true) {
			$this->session->set_flashdata('user_success', 'Employee Add Successfully.');
			redirect('employee');
		}else{
			$this->session->set_flashdata('user_success', 'Employee not Added.');
			redirect('employee');
		}
	}
	public function view_update_employee($id){
		$this->data['employee']=$this->Employee_Model->display_employee_by_id($id);
		$this->load->view('employee/update_employee',$this->data);
	}
	public function update_employee()
	{
		if($this->input->post('submit'))
		{
			$id        =$this->input->post('id');
			$name      =$this->input->post('name');
			$email     =$this->input->post('email');
			$phone	   =$this->input->post('phone');
			$address   =$this->input->post('address');
			$NID       =$this->input->post('NID');
			$department=$this->input->post('department');
			$result    = $this->Employee_Model->update_employee($name,$email,$phone,$address,$NID,$department,$id);
			if ($result == true) {
				$this->session->set_flashdata('user_success', 'Employee has been update Successfully.');
				redirect('employee');
			}else{
				$this->session->set_flashdata('user_success', 'Employee not updated.');
				redirect('employee');
			}
		}
	}
    public function delete_employee($id){
		if ($this->Employee_Model->employee_delete($id)){
			$this->session->set_flashdata('user_success', 'Employee Deleted Successfully.');
			redirect('employee');
		}else{
			$this->session->set_flashdata('user_success', 'Employee not Deleted.');
			redirect('employee');
		}


	}
}
