<?php

class Auth extends MY_Controller
{
    function login()
    {
        $data = array();

        if($_POST)
        {
            // The user has submitted the login form
            $user = User::validate_login($_POST['name'], $_POST['password']);

            if($user)
                redirect('dashboard');
            else
                $data['message'] = 'The user / password combination that you have entered is invalid.';
        }
$data['title'] = "Signup";
$data['menuUrl'] = base_url();
$data['menuItem'] = "Sign in";
        $this->load->view('auth/login', $data);
    }
    
        
    
    
    
    
    
    
    


    function logout()
    {
        User::logout();

        redirect('');
    }
}