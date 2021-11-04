<?php defined('BASEPATH') OR die('No direct script access allowed');

class Home extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
       
    }
    
    public function index(){
        echo "working no need to stress";
    }

}