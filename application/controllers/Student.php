<?php

class Student extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->helper('form');
        $this->load->model(['User'], '', TRUE);
    }

    function home(){
    	
    }
}
