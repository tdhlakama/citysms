<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of User Model
 *
 * @author tdhlakama
 */
class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_last_ten_entries() {
        $query = $this->db->get('user', 10);
        return $query->result();
    }

    public function get_list() {
        $query = $this->db->get('user');
        return $query->result();
    }

    public function save() {
        $this->username = $this->input->post('username');
        $this->password = $this->input->post('password');
        $this->status = strlen(trim($this->input->post('status')) <= 0 ? NULL : $this->input->post('status'));
        $this->email = $this->input->post('email');
        $this->db->insert('user', $this);
    }

    public function update($id) {
        $this->username = $this->input->post('username');
        $this->password = $this->input->post('password');
        $this->status = strlen(trim($this->input->post('status')) <= 0 ? NULL : $this->input->post('status'));
        $this->email = $this->input->post('email');
        $this->db->where('user_id', $id);
        $this->db->update('user', $this);
    }

    function get_row_count() {
        return $this->db->count_all('user');
    }

    function delete($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    function get_user($username) {
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->row();
    }

}
