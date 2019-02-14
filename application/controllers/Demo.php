<?php

class Demo extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->helper('form');
        $this->load->model(['User'], '', TRUE);
    }


    public function index(){
    	$this->auth->register(["login"=>"demo","password"=>"demoe1234","email"=>"demo@demo.com"]);
    }


 }