<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('book_model');
	}

	public function index()
	{
		$data['books'] = $this->book_model->get_books();
		$this->load->view('index', $data);
	}

	public function create_book(){
		$this->book_model->create_books();
	}

	public function update_book(){
		$this->book_model->update_book();
	}

	public function delete_book(){
		$this->book_model->delete_book();
	}
}
