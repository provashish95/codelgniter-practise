<?php
class Customer extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->model('Customers_Model');
	}
}
