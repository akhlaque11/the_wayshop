<?php

class Product_Model extends CI_Model
{

    public function save_product_info($data)
    {
        return $this->db->insert('products', $data);
    }

    public function get_all_product()
    {
        $this->db->select('*');
        $this->db->from('products');
        // $this->db->select('*,products.p_status as pstatus');
        // $this->db->from('products');
        // $this->db->join('category', 'category.id=products.p_category');
        // $this->db->join('brand', 'brand.id=products.p_brand');
        $this->db->order_by('products.id', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_product_info($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        // $this->db->select('*,tbl_product.publication_status as pstatus');
        // $this->db->from('tbl_product');
        // $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        // $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->where('products.id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_product_info($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    public function update_product_info($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function published_product_info($id)
    {
        $this->db->set('p_status', 1);
        $this->db->where('id', $id);
        return $this->db->update('products');
    }

    public function unpublished_product_info($id)
    {
        $this->db->set('p_status', 0);
        $this->db->where('id', $id);
        return $this->db->update('products');
    }

    public function get_all_published_category()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('c_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_published_brand()
    {
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->where('b_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

}
