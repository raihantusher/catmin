<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends MY_Controller {


	function __construct()
    {
        parent::__construct();

      //  $this->load->helper(array('form', 'url', 'html'));


        $this->load->model(['Course_model'], '', TRUE);




    }

	public function index()
	{


        $data = $cond = $this->input->get();
				$data["counter"]=$this->counter();
        $data['courses']    = $this->Course_model->get_list($data['counter'], ROW_PER_PAGE, $cond);

				$config=[]; //for pagination configuration
				$config['base_url'] = site_url('Course/index/');
				$data['total_rows'] = $config['total_rows'] = $this->Course_model->get_list(0, 0, $cond);
				$this->paginate($config);

      //  $this->paginate($config);

        $data['headline'] = $data['title'] = 'All Courses';

				echo "<h1>".$this->get_login_name()."</h1>";
				$this->layout("Course/index",$data);
	}

	public function add(){
		if($_POST){
			//if form posting is done then

			//hold whole post data into $data array
			$data=$this->input->post();

			if($this->Course_model->add($data)){
				$this->session->set_flashdata("success","New course has been added!");
				redirect('/course/');
			}
		}//if post is finished here

		$data=[];
		$data["headline"]=$data["title"]="Add New Course";
		$data["action"]="add";
		$this->layout("Course/save");
	}


 public function edit($id){

	 if($_POST){
		 //if form posting is done then

		 //hold whole post data into $data array
		 $data=$this->input->post();

		 if($this->Course_model->edit($id,$data)){
			 $this->session->set_flashdata("success","New course has been updated successfully !");
			 redirect('/course/');
		 }
	 }//if post is finished here

	 $data =[];
	 $data["action"]="edit/".$id;
	 $data["row"]=$this->Course_model->get_info_by_id($id);
	 $data["headline"]=$data["title"]="Update Course Info";
	 $this->layout("Course/save",$data);
 }



 function delete($id)
	 {
			 if ($this->Course_model->delete($id)) {
					 $this->session->set_flashdata('success', "Course has been deleted successfully");
					 redirect('/course/');
			 } else {
					 $this->session->set_flashdata('warning', "Something is going wrong!");
					 redirect('/course/');
			 }
	 }

}
