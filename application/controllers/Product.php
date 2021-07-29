<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
        $this->load->model('product_model');
    }

    public function add_product()
    {
        $data                           = array();
        $data['all_published_category'] = $this->product_model->get_all_published_category();
        $data['all_published_brand']    = $this->product_model->get_all_published_brand();
        $data['maincontent']            = $this->load->view('admin/add_product', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_product()
    {
        $data                    = array();
        $data['get_all_product'] = $this->product_model->get_all_product();
        $data['maincontent']     = $this->load->view('admin/manage_product', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_product()
    {
        $data                              = array();
        $data['p_name']             = $this->input->post('product_title');
        $data['p_short_description'] = $this->input->post('product_short_description');
        $data['p_long_description']  = $this->input->post('product_long_description');
        $data['p_price']             = $this->input->post('product_price');
        $data['p_qty']          = $this->input->post('product_quantity');
        $data['p_category']          = $this->input->post('product_category');
        $data['p_brand']             = $this->input->post('product_brand');
        $data['p_feature']           = $this->input->post('product_feature');
        $data['p_status']        = $this->input->post('publication_status');
        $data['p_author']            = $this->session->userdata('user_id');

        $this->form_validation->set_rules('product_title', 'Product Title', 'trim|required');
        $this->form_validation->set_rules('product_short_description', 'Product Short Description', 'trim|required');
        $this->form_validation->set_rules('product_long_description', 'Product Long Status', 'trim|required');
        // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        $this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');
        $this->form_validation->set_rules('product_quantity', 'Product Quantity', 'trim|required');
        $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');
        $this->form_validation->set_rules('product_brand', 'Product Brand', 'trim|required');
        $this->form_validation->set_rules('product_feature', 'Product Feature', 'trim');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['p_image']['name'])) {
            $config['upload_path']   = './assets/product_images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 10000;
            $config['max_height']    = 8000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('p_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('product/add_product');
            } else {
                $post_image            = $this->upload->data();
                $data['p_image'] = $post_image['file_name'];
            }
        }
        // echo '<pre>';
        // var_dump($data);
        // exit();
        if ($this->form_validation->run() == true) {

            $result = $this->product_model->save_product_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Product Inserted Sucessfully');
                redirect('product/manage_product');
            } else {
                $this->session->set_flashdata('message', 'Product Inserted Failed');
                redirect('product/manage_product');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('product/add_product');
        }
    }

    public function published_product($id)
    {
        $result = $this->product_model->published_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Product Sucessfully');
            redirect('product/manage_product');
        } else {
            $this->session->set_flashdata('message', 'Published Product  Failed');
            redirect('product/manage_product');
        }
    }
    public function unpublished_product($id)
    {
        $result = $this->product_model->unpublished_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Product Sucessfully');
            redirect('product/manage_product');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Product  Failed');
            redirect('product/manage_product');
        }
    }

    public function edit_product($id)
    {
        $data                           = array();
        $data['all_published_category'] = $this->product_model->get_all_published_category();
        $data['all_published_brand']    = $this->product_model->get_all_published_brand();
        $data['product_info_by_id']     = $this->product_model->edit_product_info($id);
        $data['maincontent']            = $this->load->view('admin/edit_product', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_product($id)
    {
        $data                              = array();
        $data['p_name'] = $this->input->post('product_title');
        $data['p_short_description'] = $this->input->post('product_short_description');
        $data['p_long_description']  = $this->input->post('product_long_description');
        $data['p_price']             = $this->input->post('product_price');
        $data['p_qty']          = $this->input->post('product_quantity');
        $data['p_category']          = $this->input->post('product_category');
        $data['p_brand']             = $this->input->post('product_brand');
        $data['p_feature']           = $this->input->post('product_feature');
        $data['p_status']        = $this->input->post('publication_status');
        $data['p_author']            = $this->session->userdata('user_id');

// comment start
        

// comment end




        $product_delete_image = $this->input->post('product_delete_image');

        $delete_image = substr($product_delete_image, strlen(base_url()));

        $this->form_validation->set_rules('product_title', 'Product Title', 'trim|required');
        $this->form_validation->set_rules('product_short_description', 'Product Short Description', 'trim|required');
        $this->form_validation->set_rules('product_long_description', 'Product Long Status', 'trim|required');
        // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        $this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');
        $this->form_validation->set_rules('product_quantity', 'Product Quantity', 'trim|required');
        $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');
        $this->form_validation->set_rules('product_brand', 'Product Brand', 'trim|required');
        $this->form_validation->set_rules('product_feature', 'Product Feature', 'trim');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['p_image']['name'])) {
            $config['upload_path']   = './assets/product_images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 10000;
            $config['max_height']    = 8000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('p_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('product/add_product');
            } else {
                $post_image            = $this->upload->data();
                $data['p_image'] = $post_image['file_name'];
                unlink($delete_image);
            }
        }


        if ($this->form_validation->run() == true) {

            $result = $this->product_model->update_product_info($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'Product Updated Sucessfully');
                redirect('product/manage_product');
            } else {
                $this->session->set_flashdata('message', 'Product Updated Failed');
                redirect('product/manage_product');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('product/add_product');
        }
    }

    public function delete_product($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('assets/product_images/' . $delete_image->p_image);
        $result = $this->product_model->delete_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Product Deleted Sucessfully');
            redirect('manage/product');
        } else {
            $this->session->set_flashdata('message', 'Product Deleted Failed');
            redirect('manage/product');
        }
    }

    private function get_image_by_id($id)
    {
        $this->db->select('p_image');
        $this->db->from('products');
        $this->db->where('products.id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_user()
    {

        $email = $this->session->userdata('user_email');
        $name  = $this->session->userdata('user_name');
        $id    = $this->session->userdata('user_id');

        if ($email == false) {
            redirect('admin');
        }

    }

}
