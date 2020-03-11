<?php
class Product extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Product_model');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		if($this->session->userdata('user_details')){
			$data['products'] = $this->Product_model->product_view();
			$this->load->view('product/product_view', $data);
		}else{
			$this->load->view('login/login_view');
		}
	}
	public function product_create(){
		if($this->session->userdata('user_details')) {
			$this->load->view('product/product_add');
		}else{
			$this->load->view('login/login_view');
		}
	}
	//Product add by codelgniter.........
	//Product add by codelgniter.........
//	public function product_add(){
//		$name   = $this->input->post('name');
//		$result = $this->Product_model->check_duplicate_product($name);
//		if ($result){
//			$this->session->set_flashdata('user_success', 'Product Name Is Not Valid');
//			redirect(base_url("product/product_create"));
//		}else{
//			$data = array(
//				'name'        => $this->input->post('name'),
//				'price'       => $this->input->post('price'),
//				'description' => $this->input->post('description'),
//				'tag'         => $this->input->post('tag')
//			);
//			$result = $this->Product_model->product_add($data);
//			if ($result == true) {
//				$this->session->set_flashdata('user_success', 'Product Added Successfully.');
//				redirect('product/index');
//			}else{
//				$this->session->set_flashdata('user_success', 'Product not added.');
//				redirect('product/index');
//			}
//		}
//	}
//Product add by codelgniter.........//Product add by codelgniter.........

	//This is Using Ajax...Controller.....
	//This is Using Ajax..Controller......
	public function view_update_product(){
		if($this->session->userdata('user_details')){
			$id = $this->input->get('id');
			$Result = $this->Product_model->view_product_by_id($id);
			echo json_encode($Result);
		}else{
			$this->load->view('login/login_view');
		}
	}
	public function update(){
		if($this->session->userdata('user_details')){
			$id = $this->input->post('id');
			$data = array(
				'name'        => $this->input->post('name'),
				'price'       => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'tag'         => $this->input->post('tag')
			);
			$result = $this->Product_model->update_product($id, $data);
			echo json_encode($result);
		}else{
			$this->load->view('login/login_view');
		}

	}
	public function delete(){
		if($this->session->userdata('user_details')){
			$id = $this->input->post('id');
			$result = $this->Product_model->product_delete($id);
			echo json_encode($result);
		}else{
			$this->load->view('login/login_view');
		}
	}
	public function add_product(){
		if($this->session->userdata('user_details')){
			$validation = $this->Product_model->rules();
			if ($validation->run() == FALSE){
				echo validation_errors();
			}else{
				$data = array(
					'name'        => $this->input->post('name'),
					'price'       => $this->input->post('price'),
					'description' => $this->input->post('description'),
					'tag'         => $this->input->post('tag')
				);
				$result = $this->Product_model->product_add($data);
				echo json_encode($result);
			}
		}else{
			$this->load->view('login/login_view');
		}
	}
	//This is Using Ajax..Controller......
	//This is Using Ajax..Controller......
//Update product by CI.......//Update product by CI.......//Update product by CI.......
//	public function update_product()
//	{
//		if($this->input->post('submit'))
//		{
//			$id     = $this->input->post('id');
//			$name   = $this->input->post('name');
//			$result = $this->Product_model->check_duplicate_product_by_id($id, $name);
//			if (!$result){
//				$this->session->set_flashdata('user_success', 'Product Name Is Not Valid.');
//				redirect('product/view_update_product/'.$id);
//			}else {
//				$data = array(
//					'name'        => $this->input->post('name'),
//					'price'       => $this->input->post('price'),
//					'description' => $this->input->post('description'),
//					'tag'         => $this->input->post('tag')
//						);
//				$result = $this->Product_model->update_product($id, $data);
//					}
//			if ($result == true){
//				$this->session->set_flashdata('user_success', 'Product has been updated Successfully.');
//				redirect('product');
//			}else{
//				$this->session->set_flashdata('user_success', 'Product not updated.');
//				redirect('product');
//			}
//		}
//	}
//Update product by CI.......//Update product by CI.......//Update product by CI.......
//Delete product by CI........//Delete product by CI........//Delete product by CI........
//	public function delete_product($id){
//		if ($result = $this->Product_model->product_delete($id)){
//			$this->session->set_flashdata('user_success', 'Product Deleted Successfully.');
//			redirect('product');
//		}else{
//			$this->session->set_flashdata('user_success', 'Product not Deleted.');
//			redirect('product');
//		}
//	}
	//Delete product by CI........//Delete product by CI........//Delete product by CI........
}
