<?php

class Month extends ActiveRecord\Model
{

    function check_entry($username, $year) {
    		$this->db->where('username', $username);
    		$this->db->where('year', $year);
    		$query = $this->db->get('months');
    		if ($query->num_rows() > 0){ return TRUE; } else { return FALSE; }
    }
 	

function create_year($username, $year, $month, $type) {
	    $form_data = array('username' => $username, 'year' => $year, $month => $type);
	    $this->db->insert('months', $form_data);
}

function update_entry($username, $year, $month, $type) {
	    $data = array( $month => $type );
	 	$this->db->where('username', $username);
	 	$this->db->where('year', $year);
	    $this->db->update('months', $data); 
}

function get_year_data($username, $year) {
			    $query = $this->db->get_where('months', array('username' => $username, 'year' => $year) );
	    if ($query->num_rows() > 0){ echo json_encode ($query->first_row()); } else { return 'FALSE'; }
}




}
