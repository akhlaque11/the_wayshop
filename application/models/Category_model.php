<?php

class Category_Model extends CI_Model
{

     // add category
     public function save_category_info($data)
     {
         return $this->db->insert('category', $data);
     }
     // get info of categor in manage view
    public function getall_category_info()
    {
        $this->db->select('*');
        $this->db->from('category');
        $info = $this->db->get();
        return $info->result();
    }
    // delete category
    public function delete_category_info($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('category');
    }
      // edit category
      public function edit_category_info($id)
      {
          $this->db->select('*');
          $this->db->from('category');
          $this->db->where('id', $id);
          $info = $this->db->get();
          return $info->row();
      }
      public function update_category_info($data, $id)
      {
          $this->db->where('id', $id);
          return $this->db->update('category', $data);
      }
        // publish and unpublish category
    public function published_category_info($id)
    {
        $this->db->set('c_status', 1);
        $this->db->where('id', $id);
        return $this->db->update('category');
    }
    public function unpublished_category_info($id)
    {
        $this->db->set('c_status', 0);
        $this->db->where('id', $id);
        return $this->db->update('category');
    }
}