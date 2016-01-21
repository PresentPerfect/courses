<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("America/Los_Angeles");

class Course extends CI_Model
{
	public function add_course($course)
	{
		$query = "INSERT INTO course.courses (course_name, description, created_at, updated_at) VALUES (?,?,?,?)";
		$values = array($course['course_name'], $course['description'], date("Y:m:d, H:i:s"), date("Y:m:d, H:i:s"));
		return $this->db->query($query,$values);
	}

	public function get_all_courses()
	{
		return $this->db->query("SELECT * FROM course.courses")->result_array();
	}

	public function course_by_id($id)
	{
		$query = "SELECT * FROM course.courses WHERE id = ?";
		return $this->db->query($query,array($id))->row_array();
	}

	public function delete_course($id)
	{
		$query = "DELETE FROM course.courses WHERE id = ?";
		return $this->db->query($query,array($id));
	}
}

?>