<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends MY_Controller {


	function __construct()
    {
        parent::__construct();

      //  $this->load->helper(array('form', 'url', 'html'));
       $this->load->library('Pagination');

        $this->load->model(['Course_model'], '', TRUE);

    }

	public function index()
	{


        $data = $cond = $this->input->get();
				$data["counter"]=$this->counter();
        $data['courses']    = $this->Course_model->get_list($data['counter'], ROW_PER_PAGE, $cond);

				$config=[]; //for pagination configuration
				$config['reuse_query_string'] = TRUE;
				$config['base_url'] = site_url('Course/index/');
				$data['total_rows'] = $config['total_rows'] = $this->Course_model->get_list(0, 0, $cond);

				$config['first_link'] = '<< First';
		$config['last_link'] = 'Last >>';
		$config['next_link'] = 'Next ' . '&gt;';
		$config['prev_link'] = '&lt;' . ' Previous';
		$config['num_tag_open'] = '<span class="number">';
		$config['num_tag_close'] = '</span>';

		$config['cur_tag_open'] = '<span class="current"><a href="#">';
		$config['cur_tag_close'] = '</a></span>';

		$this->pagination->initialize($config);
				var_dump($this->pagination->create_links());
				//$this->paginate($config);

      //  $this->paginate($config);

		 	$data["links"]=$this->pagination->create_links();



        $data['headline'] = $data['title'] = 'All Courses';

				echo "<h1>".$this->get_login_name()."</h1>";
				$this->layout("Course/index",$data);
	}

 public function hello(){

		 $data=$cond=$this->input->get();
	 // init params
			 $params = array();
			 $limit_per_page = 1;
			 $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
			 $total_records = $this->Course_model->get_list(0, 0, $cond);

			 if ($total_records > 0)
			 {
				 $data["counter"]=$this->counter();
					 // get current page records
						$params["results"] =$this->Course_model->get_list($data['counter'], ROW_PER_PAGE, $cond);


					 $config['base_url'] = base_url() . 'main/index';
					 $config['total_rows'] = $total_records;
					// $config['per_page'] = $limit_per_page;
					 //$config["uri_segment"] = $this;

					 // custom paging configuration
					 $config['num_links'] = 2;
					 $config['use_page_numbers'] = TRUE;
					 $config['reuse_query_string'] = TRUE;

					 $config['full_tag_open'] = '<div class="pagination">';
					 $config['full_tag_close'] = '</div>';

					 $config['first_link'] = 'First Page';
					 $config['first_tag_open'] = '<span class="firstlink">';
					 $config['first_tag_close'] = '</span>';

					 $config['last_link'] = 'Last Page';
					 $config['last_tag_open'] = '<span class="lastlink">';
					 $config['last_tag_close'] = '</span>';

					 $config['next_link'] = 'Next Page';
					 $config['next_tag_open'] = '<span class="nextlink">';
					 $config['next_tag_close'] = '</span>';

					 $config['prev_link'] = 'Prev Page';
					 $config['prev_tag_open'] = '<span class="prevlink">';
					 $config['prev_tag_close'] = '</span>';

					 $config['cur_tag_open'] = '<span class="curlink">';
					 $config['cur_tag_close'] = '</span>';

					 $config['num_tag_open'] = '<span class="numlink">';
					 $config['num_tag_close'] = '</span>';

					 $this->pagination->initialize($config);

					 // build paging links
				print_r($this->pagination->create_links());
			}




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
