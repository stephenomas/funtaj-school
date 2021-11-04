<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Assignments_model extends TL_Model{
    public function uploadAssignment($staff_id, $assignment_title, $assignment_link, $subject, $prefix, $digit, $term, $session, $start_date, $end_date){

        $data = array(
            'staff_id' => $staff_id,
            'assignment_title' => $assignment_title,
            'assignment_link' => $assignment_link,
            'subject' => $subject,
            'prefix' => $prefix,
            'digit' => $digit,
            'term' => $term,
            'session' => $session,
            'start_date' => $start_date,
            'end_date' => $end_date,
        );
        $do_update = $this->db->insert('subject_assignments', $data);
        if ($do_update) {
            return true;
        } else {
            return false;
        }
    }
    public function getAssignments()
    {
        return $this->db->select()
            ->from('files')
            ->get()
            ->result();
    }
    public function deleteNote($assignmentId)
    {
        $file = $this->get_file($assignmentId);
        if (!$this->db->where('id', $assignmentId)->delete('assignment'))
        {
            return FALSE;
        }
        unlink('./assets/assignments/' . $file->filename);
        return TRUE;
    }
}