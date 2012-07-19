<?php

class Paid extends ActiveRecord\Model
{

/*    function check_entry($username, $year) {
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
} */

function get_invoices($username) {
$this->db->order_by("year", "asc");
	    $this->db->where('username', $username);
	    $query = $this->db->get('months');
	   	if ($query->num_rows() > 0){ echo json_encode($query->result_array()); } else { return 'FALSE'; }
}

function add_paid($username, $year, $month, $type) {
	   $form_data = array('username' => $username, 'year' => $year, 'month' => $month, 'type' => $type);
	   $this->db->insert('paid', $form_data);
}

function get_paid($username) {
		$this->db->where('username', $username);
		$query = $this->db->get('paid');
		if ($query->num_rows() > 0){ echo json_encode($query->result_array()); } else { return 'FALSE'; }
}


}
