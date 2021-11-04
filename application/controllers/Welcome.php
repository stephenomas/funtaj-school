<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends TL_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function index()
	{
	    if (!$this->session->userdata('LoggedIn')){
            $this->data['pageTitle'] = 'Login';
            $this->load->view('administrator/login', $this->data);
        }else{
	        redirect('start');
        }
	}
}
