<?php defined('BASEPATH') OR die('No direct script access allowed');

class Students extends TL_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
      if ($this->session->userdata('Elevated') ) {
            $this->data['pageTitle'] = 'Manage Students';
            $this->data['allStudentsNum'] = $this->getAllStudentsCount();
            $this->data['oldStudents'] = $this->getOldStudents();
            $this->data['oldStudentsNum'] = $this->getOldStudentsCount();
            $this->data['graduates'] = $this->getGraduatedStudents();
            $this->data['promoteStatus'] = $this->getPromoteStatus($this->data['currentSession']);
			$this->data['houses'] =  $this->house_model->getHouse();

         
//        //For pagination start
            $config['base_url'] = base_url('students/index/');
            $config['per_page'] = 50;
            $config['num_links'] = 5;
            $config['total_rows'] = $this->getAllStudentsCount();

            //pagination link style
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="tsc_pagination">';
            $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item"><a class="active page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            $this->db->where('has_graduated', '0');
            $this->db->where('left_school', '0');
            $this->db->order_by('curr_year');
            $this->db->order_by('branch');
            $this->db->order_by('fname');
            $this->data['students_pagination'] = $this->db->get('students', $config['per_page'], $this->uri->segment(3));
            $str_links = $this->pagination->create_links();
            $this->data["pagLinks"] = explode('&nbsp;', $str_links);

       

     $this->data['pagination'] = $this->pagination->create_links();

            //For pagination end


      //  }elseif( $this->session->userdata('role') == 'Tutor'){

       }elseif($this->session->userdata('role') == 'Tutor'){
           $id = $this->session->userdata('id');
                $this->db->where('tutor_id',  $id);
             $class = $this->db->get('class_tutor')->row();

             if($class){
                 $this->db->where('curr_year', $class->digit);
                 $this->db->where('branch', $class->groups);
                 $this->data['students_pagination'] = $this->db->get('students');
             }


       }

        else {
          redirect('start');
        }


        $this->load->view('administrator/templates/header', $this->data);
        $this->load->view('administrator/students/index', $this->data);
        $this->load->view('administrator/templates/footer', $this->data);
    }

    function deleted()
    {
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $this->data['pageTitle'] = 'Manage Deleted Students';
            $this->data['allStudentsNum'] = $this->getAllStudentsCount();
            $this->data['oldStudents'] = $this->getOldStudents();
            $this->data['oldStudentsNum'] = $this->getOldStudentsCount();
            $this->data['graduates'] = $this->getGraduatedStudents();

//        //For pagination start
            $config['base_url'] = base_url('students/deleted/index/');
            $config['per_page'] = 50;
            $config['num_links'] = 5;
            $config['total_rows'] = $this->getAllStudentsCount();

            //pagination link style
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="tsc_pagination">';
            $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item"><a class="active page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

//            $this->db->where('has_graduated', '0');
//            $this->db->where('left_school', '0');
            $this->db->order_by('curr_year');
            $this->db->order_by('branch');
            $this->db->order_by('fname');
            $this->data['deleted_students_pagination'] = $this->db->get('deleted_students', $config['per_page'], $this->uri->segment(4));

//        $this->data['pagination'] = $this->pagination->create_links();

            $str_links = $this->pagination->create_links();
            $this->data["pagLinks"] = explode('&nbsp;', $str_links);

            //For pagination end

            $this->load->view('templates/header', $this->data);
            $this->load->view('students/deleted', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            redirect('start');
        }
    }

    function getOldStudents()
    {
        $this->db->where('left_school', '1');
        $this->db->order_by('curr_year');
        $this->db->order_by('branch');
        $this->db->order_by('fname');
        $query = $this->db->get('students');
        return $query->result();
    }

    function getGraduatedStudents()
    {
        $this->db->where('has_graduated', '1');
        $this->db->order_by('class_of');
        $this->db->order_by('fname');
        $query = $this->db->get('students');
        return $query->result();
    }

    function getOldStudentsCount()
    {
        $this->db->where('left_school', '1');
        $this->db->where('has_graduated', '1');
        $query = $this->db->get('students');
        return $query->num_rows();
    }

    function getAllStudentsCount()
    {
        $this->db->where('left_school', '0');
        $this->db->where('has_graduated', '0');
        $query = $this->db->get('students');
        return $query->num_rows();
    }

    //Edits password for active students
    function editPassword($pass, $id, $url)
    {
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
           
             $password = hash('sha256', $pass);
            // $id = $this->input->post('id');
            // $url = $this->input->post('url');

            $update = $this->students_model->editPassword($id, $password);
            if ($update) {
                $this->session->set_flashdata('success1', 'Password changed successfully.');
                
            }
            $this->session->set_flashdata('warning', 'There is an error, try again!');
           
        } else {
            redirect('start');
        }
    }

//Edits password for deactivated students
    function editDaPassword()
    {
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $pass = $this->input->post('password');
            $password = hash('sha256', $pass);
            $id = $this->input->post('id');
            $url = $this->input->post('url');
            $update = $this->students_model->editPassword($id, $password);
            if ($update) {
                $this->session->set_flashdata('success', 'Password changed successfully.');
                redirect($url);
            }
            $this->session->set_flashdata('warning', 'There is an error, try again!');
            redirect($url);
        } else {
            redirect('start');
        }
    }

//    Adds new student
    function addStudent()
    {
        if ($this->session->userdata('LoggedIn')){
            $school_info = $this->school_model->getSchoolInfo();
            foreach ($school_info as $info) {
                $emailextget = $info->email_ext;
            }
            $this->form_validation->set_rules('fname', 'Fast Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('admno', 'Admission No', 'trim|required');
            ///image upload
 
                $config['upload_path']          = './assets/stuimg/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['encrypt_name']             = true;
                $config['max_size']             = 2000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (! $this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->session->set_flashdata('picerr', $this->upload->display_errors());
                    $file = "empty";
                } else {
                   
                    $data = array('upload_data' => $this->upload->data());
                    $image = $this->upload->data();
                    $file = 'assets/stuimg/'.$image['file_name'];
                }
        
            ///dddd                                                                                                                                                                                                                                                 ZZ



            
            $admno = strtoupper($this->input->post('admno'));
            $fname = strtoupper($this->input->post('fname'));
            $mname = strtoupper($this->input->post('mname'));
            $lname = strtoupper($this->input->post('lname'));
			$house = $this->input->post('house');
            $dob = $this->input->post('dob');
            $gender = $this->input->post('gender');
            $class_prefix = $this->input->post('class_prefix');
            $curr_year = $this->input->post('curr_year');
            $branch = $this->input->post('branch');
            $emailext = $emailextget;
            $email = strtolower(strip_quotes($fname . $mname . $lname) . "@" . $emailext);
            if (empty($this->input->post('password'))) {
                $password = hash('sha256', 'password');
            } else {
                $password = hash('sha256', $this->input->post('password'));
            }

            $this->db->where('admno', $admno);
            $admnocheck = $this->db->get('students');
            if ($admnocheck->num_rows() === 0) {
                $create = $this->students_model->addStudent($admno, $fname, $mname, $lname, $dob, $email, $password, $gender, $class_prefix, $curr_year, $branch, $house, $file);

                $this->db->where('admno', $admno);
                $newStuGet = $this->db->get('students');
                foreach ($newStuGet->result() as $stuG) {
                    $newStuId = $stuG->id;
                }
                $newSData = array(
                    'student_id' => $newStuId,
                    'session' => $this->input->post('session'),
                    'prefix' => $class_prefix,
                    'digit' => $curr_year,
                    'groups' => $branch,
                );
                $this->db->insert('students_classes', $newSData);

                if ($create) {
                    $this->session->set_flashdata('success', 'You successfully added a new student.');
                    redirect('students');
                }
                redirect('students');
            } else {
                foreach ($admnocheck->result() as $existing) {
                    $name = $existing->fname . ' ' . $existing->mname . ' ' . $existing->lname;
                    $current_class = $existing->class_prefix . ' ' . $existing->curr_year . $existing->branch;
                }
                $this->session->set_flashdata('error', 'Cannot Add Student! This admision number: ' . $admno . ' is already assigned to ' . $name . ' in ' . $current_class);
                redirect('students');
            }
        }else {
            redirect('start');
        }
    }

    function addOld(){
        if ($this->session->userdata('LoggedIn')){
            $school_info = $this->school_model->getSchoolInfo();
            foreach ($school_info as $info) {
                $emailextget = $info->email_ext;
            }
            $this->form_validation->set_rules('fname', 'Fast Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('admno', 'Admission No', 'trim|required');
            ///image upload
 
                $config['upload_path']          = './assets/stuimg/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['encrypt_name']             = true;
                $config['max_size']             = 2000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (! $this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->session->set_flashdata('picerr', $this->upload->display_errors());
                    $file = "empty";
                } else {
                   
                    $data = array('upload_data' => $this->upload->data());
                    $image = $this->upload->data();
                    $file = 'assets/stuimg/'.$image['file_name'];
                }

                $config1['upload_path']          = './assets/results/';
                $config1['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
                $config1['encrypt_name']             = true;
                $config1['max_size']             = 5000;
                

                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);

                if (! $this->upload->do_upload('result')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->session->set_flashdata('picerr', $this->upload->display_errors());
                    $file2 = "empty";
                } else {
                   
                    $data = array('upload_data' => $this->upload->data());
                    $image1 = $this->upload->data();
                    $file2 = 'assets/results/'.$image1['file_name'];
                }
        
            ///
            $admno = strtoupper($this->input->post('admno'));
            $fname = strtoupper($this->input->post('fname'));
            $mname = strtoupper($this->input->post('mname'));
            $lname = strtoupper($this->input->post('lname'));
			$house = $this->input->post('house');
            $dob = $this->input->post('dob');
            $gender = $this->input->post('gender');
            $class_prefix = $this->input->post('class_prefix');
            $curr_year = $this->input->post('curr_year');
            $branch = $this->input->post('branch');
            $emailext = $emailextget;
            $email = $this->input->post('email');
            if (empty($this->input->post('password'))) {
                $password = hash('sha256', 'password');
            } else {
                $password = hash('sha256', $this->input->post('password'));
            }

            $this->db->where('admno', $admno);
            $admnocheck = $this->db->get('students');
            if ($admnocheck->num_rows() === 0) {
                $create = $this->students_model->add_old($admno, $fname, $mname, $lname, $dob, $email, $password, $gender, $class_prefix, $curr_year, $branch, $house, $file, $file2);

       

                if ($create) {
                    $this->session->set_flashdata('success1', 'You successfully added a new student.');
                    redirect('students/old');
                }else{
                    $this->session->set_flashdata('error', 'Sorry cannot add student');
                    redirect('students/old');
                }
               
            } else {
                foreach ($admnocheck->result() as $existing) {
                    $name = $existing->fname . ' ' . $existing->mname . ' ' . $existing->lname;
                    $current_class = $existing->class_prefix . ' ' . $existing->curr_year . $existing->branch;
                }
                $this->session->set_flashdata('error', 'Cannot Add Student! This admision number: ' . $admno . ' is already assigned to ' . $name . ' in ' . $current_class);
                redirect('students/old');
            }
        }else {
            redirect('start');
        }

    }

//    This is to edit active students
    function editStudent()
    {
		$pass = $this->input->post('password');
		$url = $this->input->post('url');
		$id = $this->input->post('id');

        if ($this->session->userdata('LoggedIn')) {
            $school_info = $this->school_model->getSchoolInfo();
            foreach ($school_info as $info) {
                $emailextget = $info->email_ext;
            }
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('admno', 'Admission No', 'trim|required');

            $admno = strtoupper($this->input->post('admno'));
            $fname = strtoupper($this->input->post('fname'));
            $mname = strtoupper($this->input->post('mname'));
            $lname = strtoupper($this->input->post('lname'));
            $dob = $this->input->post('dob');
            $url = $this->input->post('url');
            $gender = $this->input->post('gender');
            $house =  $this->input->post('house');
            $emailext = $emailextget;
//            if(empty($this->input->post('password'))){
//                $password = hash('sha256', 'password');
//            }else{
//                $password = hash('sha256', $this->input->post('password'));
//            }
            if (empty($this->input->post('email'))) {
                $email = strtolower(strip_quotes($fname . $mname . $lname) . "@" . $emailext);
            } else {
                $email = $this->input->post('email');
            }
            if (empty($this->input->post('curr_year'))) {
                $update = $this->students_model->editStudent($admno, $fname, $mname, $lname, $dob, $email, $gender, $house);
				if(!empty($this->input->post('password'))){
					$password = hash('sha256', $pass);
					$update1 = $this->students_model->editPassword($id, $password);
				}
                if ($update) {
                    $this->session->set_flashdata('success', 'You successfully edited the student\'s details.');
                    redirect($url);
                }
                $this->session->set_flashdata('error', 'There is an error, try again!');
                redirect($url);
            } else {
                $class = $this->input->post('curr_year');
                $prefix = $this->input->post('class_prefix');
                $group = $this->input->post('branch');
                $update = $this->students_model->editStudentClass($admno, $fname, $mname, $lname, $dob, $email, $gender, $class, $prefix, $group, $house);
				if(!empty($this->input->post('password'))){
					$password = hash('sha256', $pass);
					$update1 = $this->students_model->editPassword($id, $password);
				}
                $this->db->where('student_id', $this->input->post('id'));
                $this->db->where('session', $this->input->post('session'));
                $newData = array(
                    'prefix' => $prefix,
                    'digit' => $class,
                    'groups' => $group,
                );
                $this->db->update('students_classes', $newData);

                if ($update) {
                    $this->session->set_flashdata('success', 'You successfully edited the student\'s details.');
                    redirect($url);
                }
                $this->session->set_flashdata('error', 'There is an error, try again!');
                redirect($url);
            }

        } else {
            redirect('start');
        }
    }
    function deletepic($admin){

    }
//    This is to edit deactivated students
    function editDaStudent()
    {
        if ($this->session->userdata('LoggedIn')) {
            $school_info = $this->school_model->getSchoolInfo();
            foreach ($school_info as $info) {
                $emailextget = $info->email_ext;
            }
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('admno', 'Admission No', 'trim|required');

            $admno = strtoupper($this->input->post('admno'));
            $fname = strtoupper($this->input->post('fname'));
            $mname = strtoupper($this->input->post('mname'));
            $lname = strtoupper($this->input->post('lname'));
            $dob = $this->input->post('dob');
            $url = $this->input->post('url');
            $gender = $this->input->post('gender');
            $house =  $this->input->post('house');
            $emailext = $emailextget;
            $password = hash('sha256', 'password');
            if (empty($this->input->post('email'))) {
                $email = strtolower(strip_quotes($fname . $mname . $lname) . "@" . $emailext);
            } else {
                $email = $this->input->post('email');
            }
            if (empty($this->input->post('curr_year'))) {
                $update = $this->students_model->editStudent($admno, $fname, $mname, $lname, $dob, $email, $password, $gender, $house);
                if ($update) {
                    $this->session->set_flashdata('success', 'You successfully edited the student\'s details.');
                    redirect($url);
                }
                $this->session->set_flashdata('warning', 'There is an error, try again!');
                redirect($url);
            } else {
                $class = $this->input->post('curr_year');
                $prefix = $this->input->post('class_prefix');
                $group = $this->input->post('branch');
                $update = $this->students_model->editStudentClass($admno, $fname, $mname, $lname, $dob, $email, $password, $gender, $class, $prefix, $group, $house);

                $this->db->where('student_id', $this->input->post('id'));
                $this->db->where('session', $this->input->post('session'));
                $newData = array(
                    'prefix' => $prefix,
                    'digit' => $class,
                    'groups' => $group,
                );
                $this->db->update('students_classes', $newData);

                if ($update) {
                    $this->session->set_flashdata('success', 'You successfully edited the student\'s details.');
                    redirect($url);
                }
                $this->session->set_flashdata('warning', 'There is an error, try again!');
                redirect($url);
            }

        } else {
            redirect('start');
        }
    }

    function grads()
    {
        $this->data['pageTitle'] = 'Graduated Students';
        $this->data['allStudentsNum'] = $this->getAllStudentsCount();

        $this->load->view('administrator/templates/header', $this->data);
        $this->load->view('administrator/students/grads', $this->data);
        $this->load->view('administrator/templates/footer', $this->data);
    }

    function graduates()
    
    {
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $this->data['pageTitle'] = 'Manage Students';
            $this->data['allStudentsNum'] = $this->getAllStudentsCount();
            $this->data['oldStudents'] = $this->getOldStudents();
            $this->data['oldStudentsNum'] = $this->getOldStudentsCount();
            $this->data['graduates'] = $this->getGraduatedStudents();
            $this->data['promoteStatus'] = $this->getPromoteStatus($this->data['currentSession']);
			$this->data['houses'] =  $this->house_model->getHouse();

        

//        //For pagination start
            $config['base_url'] = base_url('students/index/');
            $config['per_page'] = 50;
            $config['num_links'] = 5;
            $config['total_rows'] = $this->getAllStudentsCount();

            //pagination link style
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="tsc_pagination">';
            $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item"><a class="active page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            $this->db->where('has_graduated', '1');
            $this->db->where('left_school', '0');
            $this->db->order_by('curr_year');
            $this->db->order_by('branch');
            $this->db->order_by('fname');
            $this->data['students_pagination'] = $this->db->get('students', $config['per_page'], $this->uri->segment(3));
            $str_links = $this->pagination->create_links();
            $this->data["pagLinks"] = explode('&nbsp;', $str_links);

//        $this->data['pagination'] = $this->pagination->create_links();

            //For pagination end

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/students/grads', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('start');
        }
        
    
    }

    function das()
    {
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $this->data['pageTitle'] = 'Manage Students';
            $this->data['allStudentsNum'] = $this->getAllStudentsCount();
            $this->data['oldStudents'] = $this->getOldStudents();
            $this->data['oldStudentsNum'] = $this->getOldStudentsCount();
            $this->data['graduates'] = $this->getGraduatedStudents();
            $this->data['promoteStatus'] = $this->getPromoteStatus($this->data['currentSession']);
			$this->data['houses'] =  $this->house_model->getHouse();

        

//        //For pagination start
            $config['base_url'] = base_url('students/index/');
            $config['per_page'] = 50;
            $config['num_links'] = 5;
            $config['total_rows'] = $this->getAllStudentsCount();

            //pagination link style
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="tsc_pagination">';
            $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item"><a class="active page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            $this->db->where('has_graduated', '0');
            $this->db->where('left_school', '1');
            $this->db->order_by('curr_year');
            $this->db->order_by('branch');
            $this->db->order_by('fname');
            $this->data['students_pagination'] = $this->db->get('students', $config['per_page'], $this->uri->segment(3));
            $str_links = $this->pagination->create_links();
            $this->data["pagLinks"] = explode('&nbsp;', $str_links);

//        $this->data['pagination'] = $this->pagination->create_links();

            //For pagination end

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/students/deact', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('start');
        }
        
    }

    public function admno_check()
    {
        $admno = trim($_POST['admno']);
        // if the admno exists return a 1 indicating true
        if ($this->students_model->admno_check($admno)) {
            echo '1';
        }
    }

    function deactivateStudent()
    {
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $admno = $this->input->post('admno');
            $id = $this->input->post('id');
            $url = $this->input->post('url');
            $session = $this->input->post('session');
            $term = $this->input->post('term');
            $reason = $this->input->post('reason');
            $this->db->where('id', $id);

            $data = array(
                'left_school' => 1,
                'left_school_reason' => $reason,
                'left_school_term' => $term,
                'left_school_session' => $session,
            );

            $deactivate = $this->db->update('students', $data);
            if ($deactivate) {
                $data = array(
                    'student_id' => $id,
                    'left_reason' => $reason,
                    'left_term' => $term,
                    'left_session' => $session,
                );

                $this->db->insert('left_returned_students', $data);

                $this->session->set_flashdata('success', 'Student deactivated successfully.');
                redirect($url, 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Try again!');
                redirect($url);
            }
        } else {
            redirect('start');
        }
    }

    function activateStudent($id)
    {
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $data = array(
                'left_school' => 0,
                'left_school_reason' => ' ',
                'left_school_term' => ' ',
                'left_school_session' => ' ',
            );
            $this->db->where('id', $id);
            $activate = $this->db->update('students', $data);
            if ($activate) {
                $this->session->set_flashdata('success', 'Student activated successfully.');
                redirect('students/das');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Try again!');
                redirect('students/das');
            }
        } else {
            redirect('start');
        }
    }

    function deleteStudent($id)
    {
        if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin') {
//            Get Student info
            $this->db->where('id', $id);
            $stu = $this->db->get('students');
            foreach ($stu->result() as $st) {
                $data = array(
                    'id' => $id,
                    'fname' => $st->fname,
                    'mname' => $st->mname,
                    'lname' => $st->lname,
                    'dob' => $st->dob,
                    'admno' => $st->admno,
                    'stu_img' => $st->stu_img,
                    'curr_year' => $st->curr_year,
                    'class_prefix' => $st->class_prefix,
                    'branch' => $st->branch,
                    'has_graduated' => $st->has_graduated,
                    'left_school' => $st->left_school,
                    'email' => $st->email,
                    'religion' => $st->religion,
                    'student_type' => $st->student_type,
                    'left_school_session' => $st->left_school_session,
                    'left_school_reason' => $st->left_school_reason,
                    'left_school_term' => $st->left_school_term,
                    'gender' => $st->gender,
                    'year_joined' => $st->year_joined,
                    'parent' => $st->parent,
                    'password' => $st->password,
                    'class_of' => $st->class_of,
                    'date_graduated' => $st->date_graduated,
                );
//                Insert info into table 'deleted_students'
                $this->db->insert('deleted_students', $data);
            }
//Remove from table students
            $this->db->where('id', $id);
            $this->db->delete('students');

            $this->db->where('id', $id);
            $this->db->delete('students_classes');

            $this->session->set_flashdata('success', 'Student deleted successfully.');
            redirect('students');
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to perform that action.');
            redirect('students');
        }
    }

//    Restore deleted student
    function restoreStudent($id)
    {
        if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin') {
//            Get Student info
            $this->db->where('id', $id);
            $stu = $this->db->get('deleted_students');
            foreach ($stu->result() as $st) {
                $data = array(
                    'id' => $id,
                    'fname' => $st->fname,
                    'mname' => $st->mname,
                    'lname' => $st->lname,
                    'dob' => $st->dob,
                    'admno' => $st->admno,
                    'stu_img' => $st->stu_img,
                    'curr_year' => $st->curr_year,
                    'class_prefix' => $st->class_prefix,
                    'branch' => $st->branch,
                    'has_graduated' => $st->has_graduated,
                    'left_school' => $st->left_school,
                    'email' => $st->email,
                    'religion' => $st->religion,
                    'student_type' => $st->student_type,
                    'left_school_session' => $st->left_school_session,
                    'left_school_reason' => $st->left_school_reason,
                    'left_school_term' => $st->left_school_term,
                    'gender' => $st->gender,
                    'year_joined' => $st->year_joined,
                    'parent' => $st->parent,
                    'password' => $st->password,
                    'class_of' => $st->class_of,
                    'date_graduated' => $st->date_graduated,
                );
//                Insert info into table 'deleted_students'
                $this->db->insert('students', $data);
            }
//Remove from table deleted students
            $this->db->where('id', $id);
            $this->db->delete('deleted_students');

            $this->session->set_flashdata('success', 'Student restored successfully. Go back to Manage Students to see the restored student');
            redirect('students/deleted');
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to perform that action.');
            redirect('students/deleted');
        }
    }

//Permanently delete student
    function permanentDeleteStudent($id)
    {
        if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin') {
            $this->db->where('id', $id);
            $this->db->delete('deleted_students');

            $this->session->set_flashdata('success', 'Student permanently deleted.');
            redirect('students/deleted');
        } else {
            $this->session->set_flashdata('warning', 'You are not authorised to perform that action.');
            redirect('students/deleted');
        }
    }

    function search()
    {
        $this->data['pageTitle'] = 'Search Students';

        $this->load->view('templates/header', $this->data);
        $this->load->view('students/search', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

//    Search Students
    function searchStudents()
    {
        $this->db->where('left_school', 0);
        $this->db->where('has_graduated', 0);
        $this->db->order_by('fname', 'asc');
        $query = $this->db->get('students');
        echo json_encode($query->result());
    }
//    Promotion functions
//    Promote Students
    function promoteStudents($status)
    {
        $session = $this->data['currentSession'];

        $this->db->where('session', $session);
        $getPromoteStatus = $this->db->get('students_promotions');
        $session_promote_status = 0;
        foreach ($getPromoteStatus->result() as $stats) {
            $session_promote_status = $stats->done_promotion;
        }
        if ($session_promote_status == 1) {
//      Do nothing if promotion has been done for session
        } else {
//      DO promotion using update
//          Graduands first
            $this->db->where('left_school', 0);
            $this->db->where('has_graduated', 0);
            $this->db->where('curr_year =', 12);

            $data = array(
                'curr_year' => 0,
                'has_graduated' => 1,
                'class_of' => $session,
            );
            $graduate_year_12 = $this->db->update('students', $data);
            if ($graduate_year_12) {
//          Other classes
                $this->db->where('curr_year >', 0);
                $this->db->where('left_school', 0);
                $this->db->where('has_graduated', 0);
                $get_stus = $this->db->get('students');

                foreach ($get_stus->result() as $stu) {
                    $stu_id = $stu->id;
                    $curr_year = $stu->curr_year;
                    $promote_data = $curr_year + 1;
                    $promote_array = array(
                        'curr_year' => $promote_data,
                    );
                    $this->db->where('id', $stu_id);
                    $this->db->where('curr_year', $curr_year);
                    $this->db->where('left_school', 0);
                    $this->db->where('has_graduated', 0);
                    $this->db->update('students', $promote_array);
                }
//                  Set promotion status to 1 (Done for session)
                $status_data = array(
                    'session' => $session,
                    'done_promotion' => $status,
                );

                $this->db->where('session', $session);
                $this->db->update('students_promotions', $status_data);
            }
        }
        redirect('students', 'refresh');
    }

    //    Undo Promote Students
    function undoPromoteStudents($status)
    {
        $session = $this->data['currentSession'];

        $this->db->where('session', $session);
        $getPromoteStatus = $this->db->get('students_promotions');
        $session_promote_status = 0;
        foreach ($getPromoteStatus->result() as $stats) {
            $session_promote_status = $stats->done_promotion;
        }
        if ($session_promote_status == 0) {
//      Do nothing if promotion has been done for session
        } else {
//      UNDO promotion using update
            //          Other classes
            $this->db->where('curr_year >', 0);
            $this->db->where('left_school', 0);
            $this->db->where('has_graduated', 0);
            $get_stus = $this->db->get('students');

            foreach ($get_stus->result() as $stu) {
                $stu_id = $stu->id;
                $curr_year = $stu->curr_year;
                $promote_data = $curr_year - 1;
                $promote_array = array(
                    'curr_year' => $promote_data,
                );
                $this->db->where('id', $stu_id);
                $this->db->where('curr_year', $curr_year);
                $this->db->where('left_school', 0);
                $this->db->where('has_graduated', 0);
                $undo_promote_others = $this->db->update('students', $promote_array);
                if ($undo_promote_others) {
                    //          Graduands later
                    $this->db->where('left_school', 0);
                    $this->db->where('has_graduated', 1);
                    $this->db->where('curr_year', 0);
                    $this->db->where('class_of', $session);

                    $data = array(
                        'curr_year' => 12,
                        'has_graduated' => 0,
                        'class_of' => '',
                    );

                    $this->db->update('students', $data);

                }
//                  Set promotion status to 0 (Not done for session)
                $status_data = array(
                    'session' => $session,
                    'done_promotion' => $status,
                );

                $this->db->where('session', $session);
                $this->db->update('students_promotions', $status_data);
            }
        }
        redirect('students', 'refresh');
    }

//    Functions to get the promotion status of the current or currently selected session
    function getPromoteStatusJson($session)
    {
        $this->db->where('session', $session);
        $getPromoteStatus = $this->db->get('students_promotions');
        echo json_encode($getPromoteStatus->result());
    }

    function getPromoteStatus($session)
    {
        $this->db->where('session', $session);
        $getPromoteStatus = $this->db->get('students_promotions');
        return $getPromoteStatus->result();
    }
//    End of functions to get the promotion status of the current or currently selected session

    function old(){
        if ($this->session->userdata('Elevated') || $this->session->userdata('role') == 'Tutor') {
            $this->data['pageTitle'] = 'Manage Students';
            $this->data['allStudentsNum'] = $this->getAllStudentsCount();
            $this->data['oldStudents'] = $this->getOldStudents();
            $this->data['oldStudentsNum'] = $this->getOldStudentsCount();
            $this->data['graduates'] = $this->getGraduatedStudents();
            $this->data['promoteStatus'] = $this->getPromoteStatus($this->data['currentSession']);
			$this->data['houses'] =  $this->house_model->getHouse();

        

//        //For pagination start
            $config['base_url'] = base_url('students/index/');
            $config['per_page'] = 50;
            $config['num_links'] = 5;
            $config['total_rows'] = $this->getAllStudentsCount();

            //pagination link style
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="tsc_pagination">';
            $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item"><a class="active page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            $this->db->where('has_graduated', '1');
            $this->db->or_where('left_school', '1');
            $this->db->order_by('curr_year');
            $this->db->order_by('branch');
            $this->db->order_by('fname');
            $this->data['students_pagination'] = $this->db->get('students', $config['per_page'], $this->uri->segment(3));
            $str_links = $this->pagination->create_links();
            $this->data["pagLinks"] = explode('&nbsp;', $str_links);

//        $this->data['pagination'] = $this->pagination->create_links();

            //For pagination end

            $this->load->view('administrator/templates/header', $this->data);
            $this->load->view('administrator/students/old', $this->data);
            $this->load->view('administrator/templates/footer', $this->data);
        } else {
            redirect('start');
        }
    }

    function edit_old(){
        $pass = $this->input->post('password');
		$url = $this->input->post('url');
		$id = $this->input->post('id');

        if ($this->session->userdata('LoggedIn')) {
            $school_info = $this->school_model->getSchoolInfo();
            foreach ($school_info as $info) {
                $emailextget = $info->email_ext;
            }
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('admno', 'Admission No', 'trim|required');

            $admno = strtoupper($this->input->post('admno'));
            $fname = strtoupper($this->input->post('fname'));
            $mname = strtoupper($this->input->post('mname'));
            $lname = strtoupper($this->input->post('lname'));
            $dob = $this->input->post('dob');
            $url = $this->input->post('url');
            $gender = $this->input->post('gender');
            $house =  $this->input->post('house');
            $emailext = $emailextget;
//            if(empty($this->input->post('password'))){
//                $password = hash('sha256', 'password');
//            }else{
//                $password = hash('sha256', $this->input->post('password'));
//            }
            if(!empty($this->input->post('result'))){
                $config1['upload_path']          = './assets/results/';
                $config1['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
                $config1['encrypt_name']             = true;
                $config1['max_size']             = 5000;
                

                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);

                if (! $this->upload->do_upload('result')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->session->set_flashdata('picerr', $this->upload->display_errors());
                    $file2 = "empty";
                } else {
                   
                    $data = array('upload_data' => $this->upload->data());
                    $image1 = $this->upload->data();
                    $file2 = 'assets/results/'.$image1['file_name'];

                    $this->students_model->editResult($file2, $admno);
                }


            }
               



            if (empty($this->input->post('email'))) {
                $email = strtolower(strip_quotes($fname . $mname . $lname) . "@" . $emailext);
            } else {
                $email = $this->input->post('email');
            }
            if (empty($this->input->post('curr_year'))) {
                $update = $this->students_model->editStudent($admno, $fname, $mname, $lname, $dob, $email, $gender, $house);
				if(!empty($this->input->post('password'))){
					$password = hash('sha256', $pass);
					$update1 = $this->students_model->editPassword($id, $password);
				}
                if ($update) {
                    $this->session->set_flashdata('success', 'You successfully edited the student\'s details.');
                    redirect($url);
                }
                $this->session->set_flashdata('error', 'There is an error, try again!');
                redirect($url);
            } else {
                $class = $this->input->post('curr_year');
                $prefix = $this->input->post('class_prefix');
                $group = $this->input->post('branch');
                $update = $this->students_model->editStudentClass($admno, $fname, $mname, $lname, $dob, $email, $gender, $class, $prefix, $group, $house);
				if(!empty($this->input->post('password'))){
					$password = hash('sha256', $pass);
					$update1 = $this->students_model->editPassword($id, $password);
				}
                $this->db->where('student_id', $this->input->post('id'));
                $this->db->where('session', $this->input->post('session'));
                $newData = array(
                    'prefix' => $prefix,
                    'digit' => $class,
                    'groups' => $group,
                );
                $this->db->update('students_classes', $newData);

                if ($update) {
                    $this->session->set_flashdata('success', 'You successfully edited the student\'s details.');
                    redirect($url);
                }
                $this->session->set_flashdata('error', 'There is an error, try again!');
                redirect($url);
            }

        } else {
            redirect('start');
        }
    }
}
