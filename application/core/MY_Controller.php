<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	function __construct()
    {
        parent::__construct();

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


  public function paginate($config = [])
   {
       $config['reuse_query_string'] = TRUE;
       $this->load->library('pagination');
       $this->pagination->initialize($config);
   }

   public function counter($segment = 3)
   {
       $segment_value = $this->uri->segment($segment);
       return empty($segment_value) ? 0 : (int)$segment_value;
   }


}
