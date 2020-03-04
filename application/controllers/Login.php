<?php
class Login extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Login_Model');
		$this->load->model('Employee_Model');
		$this->load->library('session');
		$this->load->helper('form');
	}
	public function index(){
		if($this->session->userdata('user_details')){
			redirect(base_url('employee'));
		}else{
			$this->load->view('login/login_view');
		}
	}
	public function login_action(){
		$name     = $this->input->post('name');
		$password = $this->input->post('password');

		$result   = $this->Login_Model->validate($name, $password);
		if(!$result){
			$this->session->set_flashdata('user_success', 'Your username or password incorrect');
			redirect('login/login_view');
		}else{
			$this->session->set_userdata('user_details', $result);
			$this->session->set_flashdata('user_success', 'You are Login !!');
			redirect(base_url('employee'));
		}
	}
	function user_logout(){

		if ($this->session->userdata('user_details')){
			$this->session->unset_userdata('user_details');
			$this->session->set_flashdata('user_success', 'You are Logout !!');
			redirect(base_url("login/login_view"));

		}else{
			redirect(base_url("login/login_view"));
		}
	}

	function login_view(){
		$this->load->view("login/login_view");
	}
	public function view_admins(){
		$data['admins'] = $this->Login_Model->view_admins();
		$this->load->view('login/admins_view', $data);
	}
	public function create_account(){
		$this->load->view('login/account_create');
	}

	public function add_account(){
		$name   = $this->input->post('name');
		$result = $this->Login_Model->check_duplicate_admin($name);

		if ($result) {
			$this->session->set_flashdata('user_success', 'Your Name Is Not Valid');
			redirect(base_url("login/create_account"));
		}else{
			$data = array(
				'name'     => $this->input->post('name'),
				'email'    => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			$this->Login_Model->add_account($data);
			$this->session->set_flashdata('user_success', 'your account created successfully! Please login.');
			redirect(base_url("login/login_view"));
		}
	}
	public function view_update_admin($id){
		$this->data['admin']=$this->Login_Model->view_admin_by_id($id);
		$this->load->view('login/admin_update',$this->data);
	}
	public function update_admin(){
		if($this->input->post('submit')) {
			        $id     = $this->input->post('id');
					$name   = $this->input->post('name');
					$result = $this->Login_Model->check_duplicate_admin_by_id($id,$name);
			if (!$result){
					$this->session->set_flashdata('user_success', 'Your Name Is Not Valid');
					redirect(base_url("login/view_update_admin/".$id));
			}else{
					$data = array(
						'name'     => $this->input->post('name'),
						'email'    => $this->input->post('email'),
						'password' => $this->input->post('password')
					);
					$result = $this->Login_Model->update_admin($id, $data);
					if ($result == true) {
						$this->session->set_flashdata('user_success', 'Admin has been update Successfully.');
						redirect('login/view_admins');
					}else{
						$this->session->set_flashdata('user_success', 'Admin not updated.');
						redirect('login/view_admins');
					}

				}
			}
	}

	public function delete_admin($id){

		if ($result = $this->Login_Model->admin_delete($id)){
			$this->session->set_flashdata('user_success', 'Admin has been Deleted Successfully.');
			redirect('login/view_admins');
		}else{
			$this->session->set_flashdata('user_success', 'Admin not Deleted.');
			redirect('login/view_admins');
		}
	}
}
