<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Scores_model extends TL_Model{
    public function enterEOTScores($scores, $term, $session, $tutor_id, $subject){
        // Check if record exists for student at the current term or session

//            Get current student id
        $student_id = $scores['student_id'];

        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $this->db->where('student_id', $student_id);
        $this->db->where('subject_title', $subject);
//            $this->db->where('tutor_id', $tutor_id);
        $query = $this->db->get('exam');
// If record empty for student, insert
        if($query->num_rows() === 0){
            $this->db->insert('exam', $scores);
            $this->session->set_flashdata('success', 'You have entered '.$subject.' scores for this class successfully!');
            return true;
        }else{
            // If record exist for student: update
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->where('subject_title', $subject);
            $this->db->where('student_id', $student_id);
            $this->db->update('exam', $scores);
            $this->session->set_flashdata('success', 'You have updated '.$subject.' scores for this class successfully!');
            return true;
        }
    }
    public function enterEOTScoresAjax($data, $term, $session, $subject){
        // Check if record exists for student at the current term or session

//            Get current student id
        $student_id = $data['student_id'];

        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $this->db->where('student_id', $student_id);
        $this->db->where('subject_title', $subject);

        $query = $this->db->get('exam');
// If record empty for student, insert
        if($query->num_rows() === 0){
            $this->db->insert('exam', $data);
//            $this->session->set_flashdata('success', 'You have entered '.$subject.' scores for this class successfully!');
            return true;
        }else{
            // If record exist for student: update
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->where('subject_title', $subject);
            $this->db->where('student_id', $student_id);
            $this->db->update('exam', $data);
//            $this->session->set_flashdata('success', 'You have updated '.$subject.' scores for this class successfully!');
            return true;
        }
    }
    public function enterMTScores($scores, $term, $session, $tutor_id, $subject){
        // Check if record exists for student at the current term or session

//            Get current student id
        $student_id = $scores['student_id'];

        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $this->db->where('student_id', $student_id);
        $this->db->where('subject', $subject);
//            $this->db->where('tutor_id', $tutor_id);
        $query = $this->db->get('midterm');
// If record empty for student, insert
        if($query->num_rows() === 0){
            $this->db->insert('midterm', $scores);
//            $this->session->set_flashdata('success', 'You have entered '.$subject.' scores for this class successfully!');
            return true;
        }else{
            // If record exist for student: update
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->where('subject', $subject);
            $this->db->where('student_id', $student_id);
            $this->db->update('midterm', $scores);
//            $this->session->set_flashdata('success', 'You have updated '.$subject.' scores for this class successfully!');
            return true;
        }
    }
    public function enterMTScoresAjax($data, $term, $session, $subject){
        // Check if record exists for student at the current term or session

//            Get current student id
        $student_id = $data['student_id'];

        $this->db->where('term', $term);
        $this->db->where('session', $session);
        $this->db->where('student_id', $student_id);
        $this->db->where('subject', $subject);
//            $this->db->where('tutor_id', $tutor_id);
        $query = $this->db->get('midterm');
// If record empty for student, insert
        if($query->num_rows() === 0){
            $this->db->insert('midterm', $data);
//            $this->session->set_flashdata('success', 'You have entered '.$subject.' scores for this class successfully!');
            return true;
        }else{
            // If record exist for student: update
            $this->db->where('term', $term);
            $this->db->where('session', $session);
            $this->db->where('subject', $subject);
            $this->db->where('student_id', $student_id);
            $this->db->update('midterm', $data);
//            $this->session->set_flashdata('success', 'You have updated '.$subject.' scores for this class successfully!');
            return true;
        }
    }
}