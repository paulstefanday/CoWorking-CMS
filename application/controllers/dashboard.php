<?php

class Dashboard extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->user) redirect('login');
    }

    function index()
    {
   date_default_timezone_set("Australia/Sydney");
       $data['title'] = "Dashboard";
       $data['view'] = "dashboard";
       $data['name'] = $this->user->name;

       $this->load->view('in', $data);
    }
    
    function update() {

   	$username = $this->user->name;
   	$type = $this->uri->segment(3);
    $year = $this->uri->segment(4);
    $month = $this->uri->segment(5);
    
    	//echo $username . $type . $year . $month;
   // echo Month::check_entry($username, $year);
    if (Month::check_entry($username, $year)) 
    { echo "worked"; Month::update_entry($username, $year, $month, $type); } else { echo "made new one"; Month::create_year($username, $year, $month, $type); }
    
    }
    
	 function check() {
    	$username = $this->user->name;
    	$year = $this->uri->segment(3);
  		echo Month::get_year_data($username, $year);
    }
        

    function pricing() {
           $data['title'] = "Pricing";
           $data['view'] = "pricing";
           $data['name'] = $this->user->name;
    
           $this->load->view('in', $data);
    }
    
}