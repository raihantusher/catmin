<?php

class Auths extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->helper('form');
        $this->load->model(['User'], '', TRUE);
    }

    function index()
    {
        //$this->login();
    }

    function login()
    {
        $this->output->enable_profiler(FALSE);
        $data['title'] = 'User Authentication';
        $login = $this->input->post('txt_login', TRUE);
        $password = $this->input->post('txt_password', TRUE);
        $data['status'] = "failure";
        if ($_POST) {
            if ($this->auth->login($login, $password)) {
                $data['status'] = "success";
                $data['redirect'] = site_url("/");
            } else {
                $data['error_message'] = 'The username or password you entered is incorrect.';
            }

            if (!$data['error_message']) {
                redirect($data['redirect']);
            }
        }
        $this->layout('Auths/login',[]);
    }

    function logout()
    {
        $this->auth->logout();
        redirect('/auths/login/');
    }

    function register(){

        $this->layout('Auths/register/',[]);
    }

}
