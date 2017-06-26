<?php
	class Control extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('model');
			$this->load->helper((array('form', 'url')));
			$this->load->database();
		}
		public function index()
		{
			$data=array(
				'name'=>"gaurav singh",
				'email'=>'gaurav@gmail.com',
				'pwd'=>md5('gaurav')
			);
			// $this->model->insert($data);
			// $this->model->update($data);
			// $this->model->delete_rec();
			
			$this->load->library('my_lib');
			$this->load->library('email');
			
			// echo $this->my_lib->add(5,4);
			$this->load->view("view");
		}
		public function upload()
		{
			$config['upload_path'] = './assets/uploads';
			 $config['allowed_types'] = 'gif|jpg|png';
			 $config['max_size'] = 100;
			 $config['max_width'] = 1024;
			 $config['max_height'] = 768;
			 $this->load->library('upload', $config);
			 // $this->index();
			if ( ! $this->upload->do_upload('file'))
			 {
			 $error = array('error' => $this->upload->display_errors());
			 var_dump( $error);
			 // $this->load->view('upload_form', $error);
			 }
			else
			 {
			 $data = array('upload_data' => $this->upload->data());
			 var_dump($data);
			 // $this->load->view('upload_success', $data);
			 }
		 }

		 
		 public function email()
		
	}
?>