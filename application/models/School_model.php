<?php defined('BASEPATH') OR die('No direct script assess allowed!');

class School_model extends TL_Model{
    public function getSchoolInfo(){
        $schoolget = $this->db->get('school_details');
        return $schoolget->result();
    }
    public function updateSchoolDetails($id, $email, $name, $address, $phone, $principal, $vp, $website, $appslog, $emailext, $defaultpw, $campus){
        $this->db->where('id', $id);

        $data = array(
            'id' => $id,
            'email' => $email,
            'school_name' => $name,
            'app_slog' => $appslog,
            'vice_principal' => $vp,
            'address' => $address,
            'website' => $website,
            'phone' => $phone,
            'principal' => $principal,
            'email_ext' => $emailext,
            'default_password' => $defaultpw,
            'campus' => $campus,
        );
        $update = $this->db->update('school_details', $data);
        if ($update){
            return true;
        } return false;
    }
    public function setSchoolLogo($id, $logo){
        $this->db->where('id', $id);

        $data = array('logo' => $logo);
        $do_update = $this->db->update('school_details', $data);
        if ($do_update) {
            return true;
        } else {
            return false;
        }
    }
    public function uploadSignature($full_name, $position, $signature, $term, $session){
        $data = array(
            'full_name' => $full_name,
            'position' => $position,
            'term' => $term,
            'session' => $session,
            'signature' => $signature
        );

        $this->db->where('session', $session);
        $this->db->where('term', $term);
        $this->db->where('position', $position);
        $get = $this->db->get('signatures');
        if($get->num_rows() < 1){
            $this->db->insert('signatures', $data);
            return true;
        }else{
            $this->db->where('session', $session);
            $this->db->where('term', $term);
            $this->db->where('position', $position);
            $this->db->update('signatures', $data);

            return true;
        }
    }
    public function createTerm($term){
        $data = array(
            'terms' => $term,
        );
        $insert = $this->db->insert('school_terms', $data);
        if ($insert){
            return true;
        }
    }
    public function createSession($session){ 
        $data = array(
            'sessions' => $session,
        );
        $insert = $this->db->insert('school_sessions', $data);
        if ($insert){
            return true;
        }
    }

    public function setNumberOfDays($numberOfDays, $term, $session){
        $data = array(
            'possible_att' => $numberOfDays,
        );

        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $update = $this->db->update('class_tutor', $data);
        if($update){
            return true;
        }
    }

    public function setTerm($term){
        $query = $this->db->get('current_term_session');
        foreach ($query->result() as $q){
            $id = $q->id;
        }
        $data = array(
            'term' => $term
        );
        $this->db->where('id', $id);
        $this->db->update('current_term_session', $data);
        return true;
    }
    public function setSession($session){
        $query = $this->db->get('current_term_session');
        foreach ($query->result() as $q){
            $id = $q->id;
        }
        $data = array(
            'session' => $session
        );
        $this->db->where('id', $id);
        $this->db->update('current_term_session', $data);

        $this->db->where('curr_year !=', 0);
        $stuGet = $this->db->get('students');

        foreach ($stuGet->result() as $student){
            $student_id = $student->id;

            $this->db->where('session', $session);
            $this->db->where('student_id', $student_id);

            $exits = $this->db->get('students_classes');
            if($exits->num_rows() < 1){
                $data = array(
                    'student_id' => $student_id,
                    'prefix' => $student->class_prefix,
                    'digit' => $student->curr_year,
                    'groups' => $student->branch,
                    'session' => $session,
                );
                $this->db->insert('students_classes', $data);
            }else{

            }
        }

        return true;
    }
    function setTermDates($currentTerm, $currentSession, $startDate, $endDate){
        $this->db->where('terms', $currentTerm);
        $this->db->where('sessions', $currentSession);

        $get = $this->db->get('terms_dates');
        if ($get->num_rows() < 1){
            $data = array(
                'terms' => $currentTerm,
                'sessions' => $currentSession,
                'startdate' => $startDate,
                'enddate' => $endDate
            );
            $this->db->insert('terms_dates', $data);
            return true;
        }else{
            $this->db->where('terms', $currentTerm);
            $this->db->where('sessions', $currentSession);

            $data = array(
                'terms' => $currentTerm,
                'sessions' => $currentSession,
                'startdate' => $startDate,
                'enddate' => $endDate
            );
            $this->db->update('terms_dates', $data);
            return true;
        }
    }
    function deleteSubject($id){
        $this->db->where('id', $id);
        $delete = $this->db->delete('subjects');
        if ($delete){return true;}
    }
    function editSubject($id, $subject, $code){
        $data = array(
            'subjects' => $subject,
            'code' => $code
        );
        $this->db->where('id', $id);
        $update = $this->db->update('subjects', $data);
        if ($update){return true;}
    }
    function addSubject($subject, $code){
        $data = array(
            'subjects' => $subject,
            'code' => $code
        );
        $insert = $this->db->insert('subjects', $data);
        if ($insert){return true;}
    }
    function addClass($prefix, $digit, $group, $currentSession){
        $data = array(
            'prefix' => $prefix,
            'digit' => $digit,
            'groups' => $group,
            'session' => $currentSession,
        );
        $insert = $this->db->insert('classes', $data);
        if ($insert){return true;}
    }
    function deleteClass($id){
        $this->db->where('id', $id);
        $delete = $this->db->delete('classes');
        if ($delete){return true;}
    }
    function editClass($id, $prefix, $digit, $group, $currentSession){
        $data = array(
            'prefix' => $prefix,
            'digit' => $digit,
            'groups' => $group,
            'session' => $currentSession,
        );
        $this->db->where('id', $id);
        $update = $this->db->update('classes', $data);
        if ($update){return true;}
    }
    function setClassTutor($id, $prefix, $digit, $group, $currentSession, $currentTerm, $tutor_id){
//        $this->db->where('class_id', $id);
        $this->db->where('digit', $digit);
        $this->db->where('groups', $group);
        $this->db->where('prefix', $prefix);
        $this->db->where('session', $currentSession);
        $this->db->where('term', $currentTerm);
        $check = $this->db->get('class_tutor');

        $data = array(
//            'class_id' => $id,
            'prefix' => $prefix,
            'digit' => $digit,
            'groups' => $group,
            'tutor_id' => $tutor_id,
            'session' => $currentSession,
            'term' => $currentTerm,
        );

        if ($check->num_rows() < 1){
            $insert = $this->db->insert('class_tutor', $data);
            if ($insert){return true;}
        }else{
//            $this->db->where('class_id', $id);
            $this->db->where('digit', $digit);
            $this->db->where('groups', $group);
            $this->db->where('prefix', $prefix);
            $this->db->where('session', $currentSession);
            $this->db->where('term', $currentTerm);
            $update = $this->db->update('class_tutor', $data);
            if ($update){return true;}
        }
    }
    public function addStudentImage($id, $stu_img)
    {
        $this->db->where('id', $id);

        $data = array('stu_img' => $stu_img);
        $do_update = $this->db->update('students', $data);
        if ($do_update) {
            return true;
        } else {
            return false;
        }
    }
}