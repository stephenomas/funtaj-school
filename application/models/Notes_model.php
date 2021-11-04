<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notes_model extends TL_Model{
    public function uploadNote($staff_id, $note_title, $note_link, $subject, $prefix, $digit, $term, $session){

        $data = array(
            'staff_id' => $staff_id,
            'note_title' => $note_title,
            'note_link' => $note_link,
            'subject' => $subject,
            'prefix' => $prefix,
            'digit' => $digit,
            'term' => $term,
            'session' => $session,
        );
        $do_update = $this->db->insert('subject_notes', $data);
        if ($do_update) {
            return true;
        } else {
            return false;
        }
    }
    public function getNotes()
    {
        return $this->db->select()
            ->from('files')
            ->get()
            ->result();
    }
    public function deleteNote($noteId)
    {
        $file = $this->get_file($noteId);
        if (!$this->db->where('id', $noteId)->delete('notes'))
        {
            return FALSE;
        }
        unlink('./assets/notes' . $file->filename);
        return TRUE;
    }
}