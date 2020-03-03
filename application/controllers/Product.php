<?php
class Product extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Product_model');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('session');
	}

	public function index(){
		$data['users'] = $this->Product_model->product_view();
		$this->load->view('product/product_view', $data);
	}
	public function product_create(){
		$this->load->view('product/product_add');
	}
	public function product_add(){
		$data = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'description' => $this->input->post('description'),
			'tag' => $this->input->post('tag')
		);
		$this->Product_model->product_add($data);
		$this->session->set_flashdata('user_success', 'product Add Successfully.');
		redirect('product/index','refresh');
	}
	public function update_product($id){
		$result['data']=$this->Product_model->display_productById($id);
		$this->load->view('product/product_update',$result);
		if($this->input->post('submit'))
		{
			$name = $this->input->post('name');
			$price = $this->input->post('price');
			$description = $this->input->post('description');
			$tag = $this->input->post('tag');
			$this->Product_model->update_product($name,$price,$description,$tag,$id);
			$this->session->set_flashdata('user_success', 'Product has been update Successfully.');
			redirect('product','refresh');
		}
	}
	public function delete_product($id){
		$this->Product_model->product_delete($id);
		$this->session->set_flashdata('user_success', 'User has been Deleted Successfully.');
		redirect('product','refresh');
	}

}
