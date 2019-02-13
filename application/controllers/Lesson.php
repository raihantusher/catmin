<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends MY_Controller {

	
	function __construct()
    {
        parent::__construct();

      //  $this->load->helper(array('form', 'url', 'html'));
       $this->load->library('Pagination');

        $this->load->model(['Lesson_model'], '', TRUE);

    }

    function index($course_id){
    	// echo $course_id;
         $data = array();
        
    if($_POST){
            //if form posting is done then

            //hold whole post data into $data array
            $data=$this->input->post();

            if($this->Lesson_model->add($data)){
                $this->session->set_flashdata("success","New course has been added!");
              ///  redirect('/lesson/');
            }
        }//if post is finished here

       // $data=[];
       // $data["headline"]=$data["title"]="Add New Course";
        //$data["action"]="add";
         $data["course_id"]=$course_id;
    	$data["lessons"]=$this->Lesson_model->get_list($course_id);
    	$this->layout("lessons/index", $data);

    }
function add(){
    $data = array();
    if($_POST){
            //if form posting is done then

            //hold whole post data into $data array
            $data=$this->input->post();

            if($this->Lesson_model->add($data)){
                $this->session->set_flashdata("success","New course has been added!");
                redirect('/lesson/');
            }
        }//if post is finished here

        $data=[];
        $data["headline"]=$data["title"]="Add New Course";
        $data["action"]="add";
        $this->layout("lessons/add_lesson");
    
}
function viewpage(){
    $this->layout("lessons/add_lesson");
}
}