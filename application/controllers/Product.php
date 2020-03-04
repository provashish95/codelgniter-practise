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
		$data['products'] = $this->Product_model->product_view();
		$this->load->view('product/product_view', $data);
	}
	public function product_create(){
		$this->load->view('product/product_add');
	}
	public function product_add(){
		$name   = $this->input->post('name');
		$result = $this->Product_model->check_duplicate_product($name);
		if ($result){
			$this->session->set_flashdata('user_success', 'Product Name Is Not Valid');
			redirect(base_url("product/product_create"));
		}else{
			$data = array(
				'name'        => $this->input->post('name'),
				'price'       => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'tag'         => $this->input->post('tag')
			);
			$result = $this->Product_model->product_add($data);
			if ($result == true) {
				$this->session->set_flashdata('user_success', 'Product Added Successfully.');
				redirect('product/index');
			}else{
				$this->session->set_flashdata('user_success', 'Product not added.');
				redirect('product/index');
			}
		}
	}
	public function view_update_product($id){
		$this->data['product']=$this->Product_model->view_product_by_id($id);
		$this->load->view('product/product_update',$this->data);
	}
	public function update_product()
	{
		if($this->input->post('submit'))
		{
			$id     = $this->input->post('id');
			$name   = $this->input->post('name');
			$result = $this->Product_model->check_duplicate_product_by_id($id, $name);
			if (!$result){
				$this->session->set_flashdata('user_success', 'Product Name Is Not Valid.');
				redirect('product/view_update_product/'.$id);
			}else {
				$data = array(
					'name'        => $this->input->post('name'),
					'price'       => $this->input->post('price'),
					'description' => $this->input->post('description'),
					'tag'         => $this->input->post('tag')
						);
				$result = $this->Product_model->update_product($id, $data);
					}
			if ($result == true){
				$this->session->set_flashdata('user_success', 'Product has been updated Successfully.');
				redirect('product');
			}else{
				$this->session->set_flashdata('user_success', 'Product not updated.');
				redirect('product');
			}
		}
	}
	public function delete_product($id){
		if ($result = $this->Product_model->product_delete($id)){
			$this->session->set_flashdata('user_success', 'Product Deleted Successfully.');
			redirect('product');
		}else{
			$this->session->set_flashdata('user_success', 'Product not Deleted.');
			redirect('product');
		}
	}

}
