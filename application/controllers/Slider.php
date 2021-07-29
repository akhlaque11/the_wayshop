<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
        $this->load->model('slider_model');
    }

    public function add_slider()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/add_slider', '', true);
        $this->load->view('admin/master', $data);
    }

    public function manage_slider()
    {
        $data                = array();
        $data['all_slider']  = $this->slider_model->getall_slider_info();
        $data['maincontent'] = $this->load->view('admin/manage_slider', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_slider()
    {
        $data                       = array();
        $data['s_name']       = $this->input->post('slider_title');
        $data['s_link']        = $this->input->post('slider_link');
        $data['s_status'] = $this->input->post('publication_status');

        $this->form_validation->set_rules('slider_title', 'Slider Title', 'trim|required');
        $this->form_validation->set_rules('slider_link', 'Slider Link', 'trim|required');
        // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['s_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 10000;
            $config['max_height']    = 9000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('s_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('slider/add_slider');
            } else {
                $post_image           = $this->upload->data();
                $data['s_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->slider_model->save_slider_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Slider Inserted Sucessfully');
                redirect('slider/manage_slider');
            } else {
                $this->session->set_flashdata('message', 'Slider Inserted Failed');
                redirect('slider/manage_slider');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('slider/add_slider');
        }
    }

    public function delete_slider($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('uploads/' . $delete_image->slider_image);
        $result = $this->slider_model->delete_slider_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Slider Deleted Sucessfully');
            redirect('slider/manage_slider');
        } else {
            $this->session->set_flashdata('message', 'Slider Deleted Failed');
            redirect('slider/manage_slider');
        }
    }

    public function edit_slider($id)
    {
        $data = array();
        $data['slider_info_by_id'] = $this->slider_model->edit_slider_info($id);
        $data['maincontent']       = $this->load->view('admin/edit_slider', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_slider($id)
    {
        $data = array();
        $data['s_name'] = $this->input->post('slider_title');
        $data['s_link'] = $this->input->post('slider_link');
        $data['s_status'] = $this->input->post('publication_status');
        $delete_image = $this->input->post('slider_delete_image');

        $this->form_validation->set_rules('slider_title', 'Slider Title', 'trim|required');
        $this->form_validation->set_rules('slider_link', 'Slider Link', 'trim|required');
        // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['slider_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 10000;
            $config['max_height']    = 8000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('slider_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('slider/add_slider');
            } else {
                $post_image           = $this->upload->data();
                $data['s_image'] = $post_image['file_name'];
                unlink('uploads/' . $delete_image);
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->slider_model->update_slider_info($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'Slider Updated Sucessfully');
                redirect('slider/manage_slider');
            } else {
                $this->session->set_flashdata('message', 'Slider Updated Failed');
                redirect('slider/manage_slider');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('slider/add_slider');
        }

    }

    public function published_slider($id)
    {
        $result = $this->slider_model->published_slider_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Slider Sucessfully');
            redirect('slider/manage_slider');
        } else {
            $this->session->set_flashdata('message', 'Published Slider  Failed');
            redirect('slider/manage_slider');
        }
    }

    public function unpublished_slider($id)
    {
        $result = $this->slider_model->unpublished_slider_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Slider Sucessfully');
            redirect('slider/manage_slider');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Slider  Failed');
            redirect('slider/manage_slider');
        }
    }

    private function get_image_by_id($id)
    {
        $this->db->select('s_image');
        $this->db->from('slider');
        $this->db->where('id', $id);
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
