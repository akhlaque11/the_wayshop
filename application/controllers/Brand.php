<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
        $this->load->model('brand_model');
    }

    public function add_brand()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/add_brand', '', true);
        $this->load->view('admin/master', $data);
    }

    public function manage_brand()
    {
        $data                = array();
        $data['all_brand']   = $this->brand_model->getall_brand_info();
        $data['maincontent'] = $this->load->view('admin/manage_brand', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_brand()
    {
        $data = array();
        $data['b_name']         = $this->input->post('brand_name');
        $data['b_description']  = $this->input->post('brand_description');
        $data['b_status'] = $this->input->post('publication_status');

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
        $this->form_validation->set_rules('brand_description', 'Brand Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->brand_model->save_brand_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Brand Inseted Sucessfully');
                redirect('brand/manage_brand');
            } else {
                $this->session->set_flashdata('message', 'Brand Inserted Failed');
                redirect('brand/manage_brand');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('brand/add_brand');
        }

    }

    public function delete_brand($id)
    {
        $result = $this->brand_model->delete_brand_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Brand Deleted Sucessfully');
            redirect('brand/manage_brand');
        } else {
            $this->session->set_flashdata('message', 'Brand Deleted Failed');
            redirect('brand/manage_brand');
        }
    }

    public function edit_brand($id)
    {
        $data                     = array();
        $data['brand_info_by_id'] = $this->brand_model->edit_brand_info($id);
        $data['maincontent']      = $this->load->view('admin/edit_brand', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_brand($id)
    {
        $data                       = array();
        $data['b_name']         = $this->input->post('brand_name');
        $data['b_description']  = $this->input->post('brand_description');
        $data['b_status'] = $this->input->post('publication_status');

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
        $this->form_validation->set_rules('brand_description', 'Brand Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->brand_model->update_brand_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Brand Update Sucessfully');
                redirect('brand/manage_brand');
            } else {
                $this->session->set_flashdata('message', 'Brand Update Failed');
                redirect('brand/manage_brand');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('brand/add_brand');
        }

    }

    public function published_brand($id)
    {
        $result = $this->brand_model->published_brand_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Brand Sucessfully');
            redirect('brand/manage_brand');
        } else {
            $this->session->set_flashdata('message', 'Published Brand  Failed');
            redirect('brand/manage_brand');
        }
    }

    public function unpublished_brand($id)
    {
        $result = $this->brand_model->unpublished_brand_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Brand Sucessfully');
            redirect('brand/manage_brand');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Brand  Failed');
            redirect('brand/manage_brand');
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
