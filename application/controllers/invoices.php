<?php

class Invoices extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        if(!$this->user) redirect('login');
    }

	function index(){
	  	date_default_timezone_set("Australia/Sydney");
	       $data['title'] = "Invoices";
	       $data['view'] = "invoices";
	       $data['name'] = $this->user->name;
	       $this->load->view('in', $data);
	}
	    
	function json() {
	   	$username = $this->user->name;
		echo Paid::get_invoices($username);
	}
	   	
	           
	function sendpaid() {
		$username = $this->user->name;
		$type = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$month = $this->uri->segment(5);
		Paid::add_paid($username, $year, $month, $type);
	}
	
	function getpaid() {
		$username = $this->user->name;
		echo Paid::get_paid($username);
	}
	    
    
}