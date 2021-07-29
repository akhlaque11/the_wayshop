<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->get_user();
        // $this->load->model('category_model');
    }
    // add category from dashboard
    public function add_category()
    {
        $data = array();
        $data['maincontent'] = $this->load->view('admin/add_category', '', true);
        $this->load->view('admin/master', $data);
    }
    public function save_category()
    {
        $data                         = array();
        $data['c_name']        = $this->input->post('category_name');
        $data['c_description'] = $this->input->post('category_description');
        $data['c_status']   = $this->input->post('publication_status');

        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Category Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');
        // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');

        
        if (!empty($_FILES['c_image']['name'])) {
            $config['upload_path']   = './assets/category_images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 10000;
            $config['max_height']    = 8000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('c_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('category/add_category');
            } else {
                $post_image            = $this->upload->data();
                $data['c_image'] = $post_image['file_name'];
            }
        }
        
        // var_dump($data);
        // exit();
        if ($this->form_validation->run() == true) {
            $result = $this->Category_model->save_category_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Category Inserted Sucessfully');
                redirect('category/manage_category');
            } else {
                $this->session->set_flashdata('message', 'Category Insertion Failed');
                redirect('category/manage_category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/category');
        }

    }

      // manage categories 
      public function manage_category()
      {
          $data = array();
          $data['all_categroy'] = $this->Category_model->getall_category_info();
          $data['maincontent']  = $this->load->view('admin/manage_category', $data, true);
          $this->load->view('admin/master', $data);
      }
    //   delete category
      public function delete_category($id)
      {
          $result = $this->Category_model->delete_category_info($id);
          if ($result) {
              $this->session->set_flashdata('message', 'Category Deleted Sucessfully');
              redirect('category/manage_category');
          } else {
              $this->session->set_flashdata('message', 'Category Deleted Failed');
              redirect('category/manage_category');
          }
      }
        // edit category
    public function edit_category($id)
    {
        $data                        = array();
        $data['category_info_by_id'] = $this->Category_model->edit_category_info($id);
        $data['maincontent']         = $this->load->view('admin/edit_category', $data, true);
        $this->load->view('admin/master', $data);
    }
    public function update_category($id)
    {
        $data = array();
        $data['c_name'] = $this->input->post('c_name');
        $data['c_description'] = $this->input->post('c_description');
        $data['c_status'] = $this->input->post('c_status');

        $this->form_validation->set_rules('c_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('c_description', 'Category Description', 'trim|required');
        $this->form_validation->set_rules('c_status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['c_image']['name'])) {
            $config['upload_path']   = './assets/category_images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 10000;
            $config['max_height']    = 8000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('c_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('category/add_category');
            } else {
                $post_image            = $this->upload->data();
                $data['c_image'] = $post_image['file_name'];
            }
        }




        if ($this->form_validation->run() == true) {
            $result = $this->Category_model->update_category_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Category Update Sucessfully');
                redirect('category/manage_category');
            } else {
                $this->session->set_flashdata('message', 'Category Update Failed');
                redirect('category/manage_category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('category/add_category');
        }

    }

// publish and unpublish category
public function published_category($id)
{
    $result = $this->Category_model->published_category_info($id);
    if ($result) {
        $this->session->set_flashdata('message', 'Published Category Sucessfully');
        redirect('category/manage_category');
    } else {
        $this->session->set_flashdata('message', 'Published Category  Failed');
        redirect('category/manage_category');
    }
}
public function unpublished_category($id)
{
    $result = $this->Category_model->unpublished_category_info($id);
    if ($result) {
        $this->session->set_flashdata('message', 'UnPublished Category Sucessfully');
        redirect('category/manage_category');
    } else {
        $this->session->set_flashdata('message', 'UnPublished Category  Failed');
        redirect('category/manage_category');
    }
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