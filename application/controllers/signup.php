<?php

class Signup extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        if($this->user) redirect('dashboard');
    }

    function index()
    {

  
  //libraries
  $this->load->library('form_validation');
  $this->load->library('uri');
  
  //helpers
  $this->load->helper('form');
  $this->load->helper('url');
  
  

  
  $this->form_validation->set_rules('name', 'Name', 'required');			
  	$this->form_validation->set_rules('username', 'Email', 'required|valid_email|callback_email_check');			
  	$this->form_validation->set_rules('hashed_password', 'Password', 'required|min_length[6]');			
  	$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[hashed_password]');
  	
  	$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
  
  	if ($this->form_validation->run() == FALSE) // validation hasn't been passed
  	{
  	
  	
  	$data['title'] = "Signup";
  	$data['menuUrl'] = base_url();
  	$data['menuItem'] = "Sign in";
		$this->load->view('signup', $data);

  	
  	}
  	else // passed validation proceed to post success logic
  	{
  	 	// build array for the model
  		
  		$form_data = array(
  				       	'name' => set_value('name'),
  				       	'username' => set_value('username'),
  				       	'hashed_password' => set_value('hashed_password'),
  				       	'user_id' => mt_rand(0, 999999999999999999)
  					);
  				
  		// run insert model to write data to db
  	
  		if (User::SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
  		{
  			redirect('dashboard');   // or whatever logic needs to occur
  		}
  		else
  		{
  		echo 'An error occurred saving your information. Please try again later';
  		// Or whatever error handling is necessary
  		}
  	}
  

}

}
