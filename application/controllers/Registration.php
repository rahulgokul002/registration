<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('registration_model');
    }

    public function index() {
        $this->load->view('registration_form');
    }

    public function check_email() {
        $email = $this->input->post('email');
        $isEmailExist = $this->registration_model->checkEmailExist($email);
        
        if ($isEmailExist) {
            echo "Email already used!";
        } else {
            echo "";
        }
    }

    public function submit() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        $this->registration_model->saveRegistrationData($name, $email, $password, $phone);
        redirect('registration/registrations');
    }

    public function registrations($page = 1) {
        $limit = 2; 
        $offset = ($page - 1) * $limit;
        $this->load->library('pagination');
        $config['base_url'] = base_url('registration/registrations');
        $config['total_rows'] = $this->registration_model->getTotalRegistrations();
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 3;
    
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
    
        $this->pagination->initialize($config);
    
        $data['registrations'] = $this->registration_model->getRegistrations($limit, $offset);
        $data['pagination'] = $this->pagination->create_links();
    
        $this->load->view('registration_success', $data);
    }
    
}
