<?php

class Slider_Model extends CI_Model
{

    public function save_slider_info($data)
    {
        return $this->db->insert('slider', $data);
    }

    public function getall_slider_info()
    {
        $this->db->select('*');
        $this->db->from('slider');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_slider_info($id)
    {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_slider_info($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('slider');
    }

    public function update_slider_info($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('slider', $data);
    }

    public function published_slider_info($id)
    {
        $this->db->set('publication_status', 1);
        $this->db->where('slider_id', $id);
        return $this->db->update('tbl_slider');
    }

    public function unpublished_slider_info($id)
    {
        $this->db->set('publication_status', 0);
        $this->db->where('slider_id', $id);
        return $this->db->update('tbl_slider');
    }

}
