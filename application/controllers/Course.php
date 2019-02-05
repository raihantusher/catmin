<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {


	function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'html'));


        $this->load->model(['Course_model'], '', TRUE);




    }

	public function index()
	{


        $data = $cond = $this->input->get();
				$data["counter"]=0;
        $data['course']    = $this->Course_model->get_list($data['counter'], ROW_PER_PAGE, $cond);





        $config['base_url'] = site_url('Course/index/');

        $data['total_rows'] = $config['total_rows'] = $this->Course_model->get_list(0, 0, $cond);


      //  $this->paginate($config);

        $data['headline'] = $data['title'] = 'Activity Info';

				$this->layout("Course/index",$data);
	}

	public function add(){

		if($_POST){
			$data=$this->input->post();

			$this->Course_model->add($data);
		}
		$this->layout("Course/save");
	}

	public function layout($view_locator, $data = null, $is_report = false, $return = false)
	{
			//get title and headline from data
			$title = (isset($data['title']) ? $data['title'] : 'INSIGHT');
			$headline = (isset($data['headline']) ? $data['headline'] : 'INSIGHT');

			if ($return) {
					return $this->load->view('Layout/master', ['content' => $this->load->view($view_locator, $data, true), 'title' => $title, 'headline' => $headline, 'is_report' => $is_report], true);
			} else {
					$this->load->view('Layout/master', ['content' => $this->load->view($view_locator, $data, true), 'title' => $title, 'headline' => $headline, 'is_report' => $is_report]);
			}
	}
}
