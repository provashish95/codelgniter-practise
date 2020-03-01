<?php
class Pages extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('User_Model');
		$this->load->model('Login_Model');
		$this->load->helper('form');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('login_view');

//		if ($this->session->get_userdata('user')) {
//			$data['users'] = $this->User_Model->view_users();
//			$this->load->view('User_view', $data);
//		} else {
//			$this->load->view('login_view');
//		}
	}
	public function process(){
		$this->load->model('login_model');
		$result = $this->Login_Model->validate();
		if(! $result){
			$this->load->view('login_view');
		}else{
			$data['users'] = $this->User_Model->view_users();
			$this->load->view('User_view', $data);
		}
	}

//		$this->load->library('form_validation');
//		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
//		$this->form_validation->set_rules('name', 'name', 'trim|required|callback_userCorrect');
//		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_passwordCorrect');
//
//		$name = $this->input->post('name');
//		$password = $this->input->post('password');
//
//		if ($this->form_validation->run() == FALSE) {
//			$this->load->view('login_view');
//		} else {
//
//			function userCorrect($name)
//			{
//				$this->load->library('form_validation');
//				$userExists = $this->Login_Model->userExists($name);
//
//				if ($userExists) {
//					$this->form_validation->set_message(
//						'userCorrect', 'correct user.'
//					);
//					return true;
//				} else {
//					$this->form_validation->set_message(
//						'userCorrect', 'not a valid user name.'
//					);
//					return false;
//				}
//			}
//		}
//	}
//	function passwordCorrect($password) {
//		$this->load->library('form_validation');
//		$passwordExists = $this->Login_Model->passwordCorrect($password);
//
//		if ($passwordExists) {
//			$this->form_validation->set_message('passwordCorrect', 'correct password.');
//			return true;
//		} else {
//			$this->form_validation->set_message('passwordCorrect', 'invalid password.');
//			return false;
//		}
//	}
//this is my code........
	public function create_user(){
		$this->load->view('registration');
	}
	public function add_user() {
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$this->User_Model->add_user($data);
		$this->session->set_flashdata('user_success', 'User Add Successfully.');
		redirect('pages','refresh');



	}
	public function update_data($id)
	{
		$result['data']=$this->User_Model->display_userById($id);
		$this->load->view('update_records',$result);

		if($this->input->post('update'))
		{
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->User_Model->update_records($name,$email,$password,$id);
			$this->session->set_flashdata('user_success', 'User has been update Successfully.');
			redirect('pages','refresh');
		}

	}
	public function delete_data(){
		$id=$this->input->get('id');
		$this->User_Model->delete_user($id);

		$this->session->set_flashdata('user_success', 'User has been Deleted Successfully.');
		redirect('pages','refresh');
	}
}
