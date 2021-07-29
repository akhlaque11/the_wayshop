
<?php

class Home_model extends CI_Model
{

// get featured products on home page
    // public function get_all_featured_product()
    // {
    //     $this->db->select('*,tbl_product.publication_status as pstatus');
    //     $this->db->from('tbl_product');
    //     $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
    //     $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
    //     $this->db->order_by('tbl_product.product_id', 'DESC');
    //     $this->db->where('tbl_product.publication_status', 1);
    //     $this->db->where('product_feature', 1);
    //     $this->db->limit(4);
    //     $info = $this->db->get();
    //     return $info->result();
    // }
    public function get_all_categories()
    {
            $info =  $this->db->get('category');
            return $info;
    }
    public function get_all_product(){
         $info = $this->db->get('products');
         return $info;
    }
    public function get_all_featured_product(){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('p_feature', 1);
        $info = $this->db->get();
        return $info->result();
    }

   // to show products in shop page using pagination
   public function get_all_product_pagi($limit,$offset)
   {
       $this->db->select('*');
       $this->db->from('products');
       $this->db->order_by('products.id', 'DESC');
       $this->db->where('products.p_status', 1);
       $this->db->limit($limit,$offset);
       $info = $this->db->get();
       return $info->result();

    //    in this below query product id is conflicting with category or brand ids
    //    $this->db->select('*');
    //    $this->db->from('products');
    //    $this->db->join('category', 'category.id=products.p_category');
    //    $this->db->join('brand', 'brand.id=products.p_brand');
    //    $this->db->order_by('products.id', 'DESC');
    //    $this->db->where('products.p_status', 1);
    //    $this->db->limit($limit,$offset);
    //    $info = $this->db->get();
    //    return $info->result();
       
   }
     // to show categories on single product page
     public function get_all_category()
     {
         $this->db->select('*');
         $this->db->from('category');
        //  $this->db->where('publication_status', 1);
         $query = $this->db->get();
         return $query->result();
     }
        // get products by category when we click on categories which are in shop page
    public function get_all_product_by_cat($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('category', 'category.id=products.p_category');
        $this->db->join('brand', 'brand.id=products.p_brand');
        $this->db->order_by('products.id', 'DESC');
        $this->db->where('products.p_status', 1);
        $this->db->where('category.id', $id);
        $info = $this->db->get();
        return $info->result();
    }
      // to show brands on shop page
      public function get_all_brand()
      {
          $this->db->select('*');
          $this->db->from('brand');
         //  $this->db->where('publication_status', 1);
          $query = $this->db->get();
          return $query->result();
      }
             // get products by brand when we click on brand which are in shop page
    public function get_all_product_by_brand($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('brand', 'brand.id=products.p_brand');
        $this->db->join('category', 'category.id=products.p_category');
        $this->db->order_by('products.id', 'DESC');
        $this->db->where('products.p_status', 1);
        $this->db->where('brand.id', $id);
        $info = $this->db->get();
        return $info->result();
    }
      // to save the cart when we click on buy now button 
      public function get_product_by_idddd($id)
      {
          $this->db->select('*');
          $this->db->from('products');
          $this->db->join('category', 'category.id=products.p_category');
          $this->db->join('brand', 'brand.id=products.p_brand');
          $this->db->order_by('products.id', 'DESC');
          $this->db->where('products.p_status', 1);
          $this->db->where('products.id', $id);
          $info = $this->db->get();
          return $info->row();
      }

      public function get_product_by_id($id = ''){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('p_status', '1');
        if($id){
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
            
        }else{
            $this->db->order_by('p_name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
      // to show single product detail 
      public function get_single_product($id)
      {
          $this->db->select('*');
          $this->db->from('products');
          $this->db->join('category', 'category.id=products.p_category');
          $this->db->join('brand', 'brand.id=products.p_brand');
          $this->db->where('products.id', $id);
          $info = $this->db->get();
          return $info->row();
      }
    //   get customers info
      public function get_customer_info($data)
      {
          $this->db->select('*');
          $this->db->from('customer');
          $this->db->where($data);
          $info = $this->db->get();
          return $info->row();
      }
      public function save_customer_info($data)
      {
          $this->db->insert('customer', $data);
          return $this->db->insert_id();
      }
    //   save shipping address of customer
      public function save_shipping_address($data)
      {
          $this->db->insert('shipping', $data);
          return $this->db->insert_id();
      }
      public function save_order_info($data)
      {
          $this->db->insert('order_tbl', $data);
          return $this->db->insert_id();
      }
      public function save_order_details_info($oddata)
      {
          $this->db->insert('order_detail', $oddata);
      }
      public function get_all_slider_post()
      {
          $this->db->select('*');
          $this->db->from('slider');
          $this->db->where('s_status', 1);
          $info = $this->db->get();
          return $info->result();
      }
  

}