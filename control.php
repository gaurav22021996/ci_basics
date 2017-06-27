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
		 {
			 $this->load->library("email");
			 
			 $this->email->from("gauravmouryaweb@gmail", "Gaurav Mourya");
			 $this->email->to("gauravmourya20@gmail.com");
			 $this->email->subject("Email test");
			 $this->email->message("Email test message");
			 if($this->email->send())
			 {
				 echo "success";
			 }
			 else
			 {
				 echo "error";
			 }
		 }
		 public function validate()
		 {
			 $this->load->helper("form");
			 $this->load->library("form_validation");
			 
			 $this->form_validation->set_rules('name', "Name", "required");
			 if($this->form_validation->run()==FALSE)
			 {
				 $this->index();
			 }
			 else
			 {
				 echo "succeeded";
			 }
			 // $this->input->post("name");
		 }
		 public function sessions()
		 {
			 $this->load->library("session");
			 $this->session->set_userdata("name","gaurav");
			 // $this->session->unset_userdata('name');
			 echo $this->session->userdata("name");
		 }
		public function flashdata()
		{
			$this->load->library("session");
			$this->session->set_flashdata("flash", "data");
			echo $this->session->flashdata("flash");
		}
		public function tempdata()
		{
			$this->load->library("session");
			// $this->session->set_userdata('temp',"data");
			// $this->session->mark_as_temp(array("temp"), 20);
			$this->session->unset_tempdata('temp');
			echo $this->session->tempdata('temp');
		}
		public function session_destroy()
		{
			$this->load->library("session");
			// $this->session->set_userdata("name", "gaurav");
			$this->session->sess_destroy();
			echo $this->session->userdata("name");
		}
		public function cookie()
		{
			$this->load->helper("cookie");
			// set_cookie('name',"gaurav",  3600);
			delete_cookie("name");
			echo get_cookie("name");
			
		}
		public function cache()
		{
			// $this->output->cache(1);
			$this->output->delete_cache();
			// $this->load->view("view");
		}
		public function redirect()
		{
			$this->load->helper("url");
			redirect("cart/index");
		}
	}
?>