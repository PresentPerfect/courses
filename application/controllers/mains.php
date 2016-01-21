<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("America/Los_Angeles");
	
	class Mains extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->output->enable_profiler(TRUE);

			// $this->output->set_header("HTTP/1.0 200 OK");
			// $this->output->set_header("HTTP/1.1 200 OK");
			// $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
			// $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			// $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
			// $this->output->set_header("Pragma: no-cache");
			//$this->load->model('');
		}



		public function index()
		{
			$this->load->model('course');
			$all_courses = $this->course->get_all_courses();

			$this->load->view('add_page',array('all_courses'=>$all_courses));
		}

		public function remove($id)
		{
			$this->load->model('course');
			$course_by_id = $this->course->course_by_id($id);
			// echo "value of course_by_id is ";
			// var_dump($course_by_id);
			// die();

			$this->load->view('view_remove',array('course_by_id'=>$course_by_id));
		}

		public function delete_course($id)
		{			
			$this->load->model('course');
			$delete_course = $this->course->delete_course($id);
			// echo "value of delete_course is:  ";
			// die($delete_course);
			redirect('/');
		}

		public function add_course()
		{			
			$this->load->library("form_validation");
			$this->form_validation->set_rules("course_name","Course Name","trim|min_length[5]|required");
			$this->form_validation->set_rules("description","Description","trim|min_length[15]|required");
			if ($this->form_validation->run() === false)
			{	
				// echo "I'm in add_course/if, validation fail working";
				$this->view_data["errors"] = validation_errors();
				$this->session->set_flashdata('error_msg',$this->view_data['errors']);
				redirect('/');
			}
			else
			{				
				// echo "var_dumping post:  ";
				// var_dump($this->input->post());
				// die();

				$this->load->model('course');
				$add_course = $this->course->add_course($this->input->post());
				redirect('/');
			}


		}
	}

?>