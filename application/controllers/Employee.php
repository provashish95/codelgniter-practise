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
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if($this->session->userdata('user_details')){
			$data['employers'] = $this->Employee_Model->view_employee();
			$this->load->view('employee/employee_view', $data);
		}else{
			redirect(base_url('login'));
		}
	}
	public function create_employee(){
		if($this->session->userdata('user_details')){
			$this->load->view('employee/add_employee');
		}else{
			redirect(base_url('login'));
		}
	}

	public function add_employee(){
		if($this->session->userdata('user_details')){
			$validation = $this->Employee_Model->rules();
			if ($validation->run() == FALSE)
			{
				$this->load->view('employee/add_employee');
			}
			else
			{
				$email  = $this->input->post('email');
				$result = $this->Employee_Model->check_duplicate_employee($email);
				if ($result) {
					$this->session->set_flashdata('user_success', 'Employee Email is not valid');
					redirect(base_url("employee/create_employee"));
				}else{
					$data = array(
						'name'       => $this->input->post('name'),
						'email'      => $this->input->post('email'),
						'address'    => $this->input->post('address'),
						'department' => $this->input->post('department')
					);
					$result = $this->Employee_Model->add_employee($data);
					if ($result){
						$this->session->set_flashdata('user_success', 'Employee Add Successfully.');
						redirect('employee');
					}else{
						$this->session->set_flashdata('user_success', 'Employee not Added.');
						redirect('employee');
					}
				}
			}
		}else{
			redirect(base_url('login'));
		}
	}
	public function view_update_employee($id){
		if($this->session->userdata('user_details')){
			$this->data['employee']=$this->Employee_Model->view_employee_by_id($id);
			$this->load->view('employee/update_employee',$this->data);
		}else{
			redirect(base_url('login'));
		}
	}
	public function update_employee()
	{
		if($this->session->userdata('user_details')){
			if($this->input->post('submit')) {
				$email   = $this->input->post('email');
				$id      = $this->input->post('id');
				$result  = $this->Employee_Model->check_duplicate_employee_by_id($id, $email);
				if (!$result) {
					$this->session->set_flashdata('user_success', 'Your are not  original employee');
					redirect(base_url("employee/view_update_employee/" . $id));
				}else{
					$data = array(
						'name'       => $this->input->post('name'),
						'email'      => $this->input->post('email'),
						'address'    => $this->input->post('address'),
						'department' => $this->input->post('department')
					);
					$result = $this->Employee_Model->update_employee($id, $data);
					if ($result) {
						$this->session->set_flashdata('user_success', 'Employee has been update Successfully.');
						redirect('employee');
					}else{
						$this->session->set_flashdata('user_success', 'Employee not updated.');
						redirect('employee');
					}
				}
			}
		}else{
			redirect(base_url('login'));
		}
	}

    public function delete_employee($id){
		if($this->session->userdata('user_details')){
			if ($this->Employee_Model->employee_delete($id)){
				$this->session->set_flashdata('user_success', 'Employee Deleted Successfully.');
				redirect('employee');
			}else{
				$this->session->set_flashdata('user_success', 'Employee not Deleted.');
				redirect('employee');
			}
		}else{
			redirect(base_url('login'));
		}
	}
}
