<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends TL_Controller{
    function index()
    {
        $this->data['pageTitle'] = 'Calendar';

        if ($this->session->userdata('Elevated')) {

            $this->load->view('templates/header', $this->data);
            $this->load->view('elevated/calendar', $this->data);
            $this->load->view('templates/footer', $this->data);
        }else{
            if(!$this->session->userdata('Elevated')){
                $this->session->set_flashdata('error', 'Session error! Please login to view requested page.');
                redirect('start', 'refresh');
            }
        }
    }

    function getEvents(){
        $data = $this->db->get("events")->result();
        echo json_encode($data);
    }

    function addEvent(){
        if ($this->session->userdata('Elevated')) {
            $title = $_POST['title'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $venue = $_POST['venue'];

            $add = $this->calendar_model->addEvent($title, $start, $end, $venue);

            if ($add) {
                echo json_encode(array('message' => 'Event Added Successfully'));
            }
        }
    }

    function deleteEvent($id){
        if ($this->session->userdata('Elevated')) {
            $delete = $this->calendar_model->deleteEvent($id);

            if ($delete) {
                echo json_encode(array('message' => 'Event Deleted Successfully'));
            }
        }
    }
}