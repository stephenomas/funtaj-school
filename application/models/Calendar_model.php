<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends TL_Model
{
    public function addEvent($title, $start, $end, $venue)
    {
        $data = array(
            'title' => $title,
            'start' => $start,
            'end' => $end,
            'venue' => $venue
        );
        $this->db->insert('events', $data);

        return TRUE;
    }

    public function deleteEvent($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('events');

        return TRUE;
    }
}