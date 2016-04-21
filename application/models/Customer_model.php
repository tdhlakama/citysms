<?php

/*
 * File Name: customer_model.php
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_last_entries($total)
    {
        $this->db->distinct();
        $this->db->from('customer', $total);
        $this->db->group_by('customer_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_entries()
    {
        $this->db->distinct();
        $this->db->from('customer');
        $this->db->group_by('customer_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_customers()
    {
        $this->db->distinct();
        $this->db->from('customer');
        $this->db->group_by('account_no');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_unsent_entries()
    {
        $this->db->distinct();
        $this->db->from('customer');
        $this->db->where('message_status', NULL);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_sent_entries()
    {
        $this->db->distinct();
        $this->db->from('customer');
        $this->db->where('message_status is not NULL');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_balances($account_no)
    {
        $this->db->distinct();
        $this->db->select('MONTHNAME(billing_date) as monthname');
        $this->db->select('YEAR(billing_date) as year');
        $this->db->select('balance');
        $this->db->from('customer');
        $this->db->where('account_no', $account_no);
        $query = $this->db->get();
        return $query->result();
    }

    public function entry_exists($account_no, $billing_date)
    {
        $this->db->distinct();
        $this->db->from('customer');
        $this->db->where('billing_date', $billing_date);
        $this->db->where('account_no', $account_no);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all()
    {
        $this->db->distinct();
        $this->db->from('customer');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_list()
    {
        $this->db->distinct();
        $this->db->from('customer');
        $query = $this->db->get();
        return $query->result();
    }

    function get($id)
    {
        $this->db->from('customer');
        $this->db->where('customer_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($account_no, $name, $email, $cell, $balance, $billing_date)
    {
        $this->account_no = $account_no;
        $this->name = $name;
        $this->email = $email;
        $this->cell = $cell;
        $this->balance = $balance;
        $this->billing_date = $billing_date;
        $this->db->insert('customer', $this);
        return $this->db->insert_id();
    }

    public function update($customer_id,$account_no, $name, $email, $cell, $balance, $billing_date)
    {
        $this->account_no = $account_no;
        $this->name = $name;
        $this->email = $email;
        $this->cell = $cell;
        $this->balance = $balance;
        $this->billing_date = $billing_date;
        $this->message_status = null;
        $this->db->where('customer_id', $customer_id);
        $this->db->update('customer', $this);
    }

    public function update_send($id, $message_status)
    {
        $this->message_status = $message_status;
        $this->db->where('customer_id', $id);
        $this->db->update('customer', $this);
    }

    public function get_row_count()
    {
        $this->db->distinct();
        return $this->db->count_all('customer');
    }

    function delete($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }

    function get_customers($q)
    {
        $this->db->from('customer');
        $this->db->like('name', $q, 'both');
        $this->db->or_like('account_no', $q);
        $query = $this->db->get();
        return $query->result();
    }
}
