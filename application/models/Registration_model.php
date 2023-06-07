<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model {

    public function checkEmailExist($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }

    public function saveRegistrationData($name, $email, $password, $phone) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone
        );

        $this->db->insert('users', $data);
    }

    public function getRegistrations($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function getTotalRegistrations() {
        return $this->db->count_all('users');
    }
    
}
