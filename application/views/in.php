<?php 

$data['title'] = $title;
$data['name'] = $name;
//$data['json'] = $json;
$this->load->view('in/header', $data);
$this->load->view($view, $data);       
$this->load->view('in/footer', $data);