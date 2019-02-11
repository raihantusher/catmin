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


    function get_role_id()
    {
        $session_data = $this->session->userdata('data');
        return !empty($session_data) ? $session_data['role_id'] : false;
    }


    public function get_login_name()
    {
        $user = $this->session->userdata('data');
        return !empty($user) ? $user['full_name'] : false;
    }

    function is_super_admin()
    {
        $session_data = $this->session->userdata('data');
        return ($session_data['is_super_admin'] == '1' && $session_data['role_id'] == '1');
    }


    function get_user_id()
    {
        return $this->session->userdata('data')['id'];
    }

    function is_ip()
    {
        $user_id = $this->session->userdata('data')['id'];
        $check = $this->db->query("SELECT `is_super_admin`, `role_id` FROM `users` WHERE `id` = '$user_id'")->row();
        return !($check->role_id == '1');
    }




}
