<?php

class User extends ActiveRecord\Model
{
    


    
    function checkEmail($email) {
    		$this->db->where('email', $email);
    		$query = $this->db->get('users');
    		if ($query->num_rows() > 0){ return FALSE; } else { return TRUE; }
    	}
    
    function SaveForm($form_data) {
    		//$this->load->database();
    		$this->load->library('encrypt');	
   			//$form_data['name'] = $this->encrypt->encode($form_data['name'],  $this->config->item('encryption_key')); 
    		$form_data['hashed_password'] = User::hash_password($form_data['hashed_password']);
    		$this->db->insert('users', $form_data);
    		
    		if ($this->db->affected_rows() == '1') { return TRUE; } else { return FALSE; }
    	}
    
    
    
    function set_password($plaintext)
    {
        $this->hashed_password = $this->hash_password($plaintext);
    }

    private function hash_password($password)
    {
        $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        $hash = hash('sha256', $salt . $password);

        return $salt . $hash;
    }

    private function validate_password($password)
    {
        $salt = substr($this->hashed_password, 0, 64);
        $hash = substr($this->hashed_password, 64, 64);

        $password_hash = hash('sha256', $salt . $password);

        return $password_hash == $hash;
    }

    public static function validate_login($username, $password)
    {
        $user = User::find_by_username($username);

        if($user && $user->validate_password($password))
        {
            User::login($user->id);

            return $user;
        }
        else
            return FALSE;
    }

    public static function login($user_id)
    {
        $CI =& get_instance();
        $CI->session->set_userdata('user_id', $user_id);
    }

    public static function logout()
    {
        $CI =& get_instance();
        $CI->session->sess_destroy();
    }
}
