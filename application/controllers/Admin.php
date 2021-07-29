<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('admin_model');
        // $this->user_login_check();
    }
    public function index()
    {
        $this->load->view('admin/login');
    }
    public function admin_login_check()
    {

        $this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'User Password', 'required');

        if ($this->form_validation->run() == true) {
            $data = array();
            $data['email'] = $this->input->post('user_email');
            $data['password'] = md5($this->input->post('user_password'));

            $result = $this->Admin_model->admin_login_check($data);

            if ($result) {
                $this->session->set_userdata('user_email', $result->email);
                $this->session->set_userdata('user_name', $result->name);
                $this->session->set_userdata('user_id', $result->user_id);
                redirect('admin_dashboard');
            } else {
                $this->session->set_flashdata('message', 'Your Email Or Password Does Not Match');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('admin');
        }

    }
}