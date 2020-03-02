<?php
class Users extends CI_Controller
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
		if($this->session->userdata('user_details')){
			$data['users'] = $this->User_Model->view_users();
			$this->load->view('user_view', $data);
		}else{
			$this->load->view('login_view');
		}
	}
	public function login_action(){
		$name = $this->input->post('name');
		$password = $this->input->post('password');

		$result = $this->Login_Model->validate($name, $password);
		if(!$result){
			$this->session->set_flashdata('user_success', 'Your name or password is not correct');
			redirect('users/login_view');
		}else{
			$this->session->set_userdata('user_details', $result);
			$this->session->set_flashdata('user_success', 'You are Login !!');
			$data['users'] = $this->User_Model->view_users();
			$this->load->view('user_view', $data);
		}
	}
	function user_logout(){

		if ($this->session->userdata('user_details')){

			$this->session->unset_userdata('user_details');
			$this->session->set_flashdata('user_success', 'You are Logout !!');
			redirect(base_url("users/login_view"));

		}else{

			redirect(base_url("users/login_view"));
		}
	}

	function login_view(){
		$this->load->view("login_view");
	}

	public function create_user(){
		$this->load->view('add_users');
	}
	public function add_user() {
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$this->User_Model->add_user($data);
		$this->session->set_flashdata('user_success', 'User Add Successfully.');
		redirect('users','refresh');
	}
	public function update_data($id)
	{
		$result['data']=$this->User_Model->display_userById($id);
		$this->load->view('update_users',$result);

		if($this->input->post('submit'))
		{
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->User_Model->update_records($name,$email,$password,$id);
			$this->session->set_flashdata('user_success', 'User has been update Successfully.');
			redirect('users','refresh');

		}

	}
    public function delete_row($id){
	    $this->User_Model->row_delete($id);
	    $this->session->set_flashdata('user_success', 'User has been Deleted Successfully.');
	    redirect('users','refresh');
        }
}
