<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model {

        public $title;
        public $author;
        //public $path;
        public $date_created;
        public $date_updated;

        public function get_books()
        {
                $query = $this->db->get('books');
                return $query->result();
        }

        public function create_books()
        {

                $json = array();
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('author', 'Author', 'required');
                if($this->form_validation->run()){
                        $this->title            = $this->input->post('name'); // please read the below note
                        $this->author          = $this->input->post('author');
                        //$this->book_cover_path = $this->uploadImage();
                        $this->date_created          = date('Y-m-d h:i:sa');;
                        $this->date_updated          = date('Y-m-d h:i:sa');;
                        $res = $this->db->insert('books', $this);
                        if($res){
                                $insert_id = $this->db->insert_id(); 
                                $json = array(
                                        'type' => 'success',
                                        'message' => $this->db->get_where('books', ['id' => $insert_id])->row_array()
                                );
                        } else {
                                $json = array(
                                        'type' => 'error',
                                        'message' => 'Sorry! Cannot Insert the Task'
                                );
                        }
                } else{
                        $json = array(
                                'type' => 'error',
                                'message' => validation_errors()
                        );
                }
                header('Content-Type: application/json');
                echo json_encode($json);
        }

        public function update_book()
        {
                $json = array();
                $this->form_validation->set_rules('book_id', 'ID', 'required');
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('author', 'Author', 'required');
                if($this->form_validation->run()){
                        $id   = $this->input->post('book_id');
                        $data['title']  = $this->input->post('title');
                        $data['author']  = $this->input->post('author');
                        $data['date_updated']  = date('Y-m-d h:i:sa');
                        $update_id = $this->db->update('books', $data, array('id' => $id));
                        if($update_id){
                                $json = array(
                                        'type' => 'success',
                                        'message' => $this->db->get_where('books', ['id' => $id])->row_array()
                                );
                        } else {
                                $json = array(
                                        'type' => 'error',
                                        'message' => 'Sorry! Cannot Update the Book'
                                );
                        }
                } else{
                        $json = array(
                                'type' => 'error',
                                'message' => validation_errors()
                        );
                }
                header('Content-Type: application/json');
                echo json_encode($json);
        }

        public function delete_book(){
                $json = array();
                $id = $this->input->post('id');
                if($id > 0){
                        $res = $this->db->delete('books', ['id' => $id]);
                        if($res != FALSE){
                                $json = array(
                                        'type' => 'success',
                                        'message' => 'Book Deleted Successfully'
                                );   
                        } else {
                                $json = array(
                                        'type' => 'error',
                                        'message' => 'Sorry! Cannot Delete the Book'
                                );                                  
                        }    
                } else{
                        $json = array(
                                'type' => 'error',
                                'message' => 'Invalid ID'
                        );   
                }
                header('Content-Type: application/json');
                echo json_encode($json);
        }


	public function uploadImage()
	{
		return 'path';
		/*if(isset($_FILES['cover']['name'])){
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'jpg|jpeg|png|gig';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('cover')){
				echo $this->upload->display_errors();

			}else{
				return 'dfdf';
			}
		}*/

    }

}
