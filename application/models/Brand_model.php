<?php

class Brand_Model extends CI_Model
{

    public function save_brand_info($data)
    {
        return $this->db->insert('brand', $data);
    }

    public function getall_brand_info()
    {
        $this->db->select('*');
        $this->db->from('brand');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_brand_info($id)
    {
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->where('id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_brand_info($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('brand');
    }

    public function update_brand_info($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('brand', $data);
    }

    public function published_brand_info($id)
    {
        $this->db->set('b_status', 1);
        $this->db->where('id', $id);
        return $this->db->update('brand');
    }

    public function unpublished_brand_info($id)
    {
        $this->db->set('b_status', 0);
        $this->db->where('id', $id);
        return $this->db->update('brand');
    }

}
