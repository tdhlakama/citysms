<?php

/*
 * File Name: customer.php
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends Generic_input
{

    public function __construct()
    {
        parent::__construct();
    }

    function listAll()
    {
        $this->breadcrumbs->push('Customer', '/customer/listAll');
        $data['list'] = $this->customer_model->get_all_customers();
        $this->load->view('customer_list_view', $data);
        $this->load->view('footer');
    }

    function upload()
    {
        $this->breadcrumbs->push('Customer', '/customer/listAll');
        $this->load->view('customer_upload_view');
        $this->load->view('footer');
    }

    function do_upload()
    {
        if ($this->upload->do_upload()) {
            $file_data = $this->upload->data();
            $file_path = base_url() . 'resources/uploads/' . $file_data['file_name'];
            $this->read_uploaded_file($file_path);
        } else {
            $file_data = $this->upload->data();
            $file_path = base_url() . 'resources/uploads/' . $file_data['file_name'];
            $this->read_uploaded_file($file_path);
            $this->session->set_flashdata('msg', $file_path . ' - ' . $this->upload->display_errors() . '<div class="alert alert-danger text-center">Upload Failed </div> . ');
            $this->load->view('customer_upload_view');
            $this->load->view('footer');
        }

    }

    public function uploadData()
    {
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "csv",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload()) {
            $file_data = $this->upload->data();
            $file_path = base_url() . './uploads/' . $file_data['file_name'];
            $this->read_uploaded_file($file_path);
        } else {
            $this->session->set_flashdata('msg', $this->upload->display_errors() . '<div class="alert alert-danger text-center">Upload Failed </div> . ');
            $this->load->view('customer_upload_view');
            $this->load->view('footer');
        }
    }


    public function read_uploaded_file($file_path)
    {
        $csv = array_map('str_getcsv', file($file_path));
        foreach ($csv as $item) {
            $account_no = $item[0];
            $name = $item[1];
            $cell = $item[2];
            $email = $item[3];
            $balance = $item[4];
            $billing_date = $item[5];
            $d = new DateTime($billing_date);
            $formatted_date = $d->format('Y-m-d'); // 2003-10-16
            $this->customer_model->save($account_no, $name, $email, $cell, $balance, $formatted_date);
        }
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Upload Success Full </div> . ');
        redirect('customer/listAll');
    }

    function delete($id)
    {
        $this->customer_model->delete($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Recorded Deleted from Database!!!</div>');

    }

    function search()
    {
        $keyword = $this->input->post('keyword');
        $data['list'] = $this->customer_model->get_customers($keyword);
        $this->load->view('customer_list_view', $data);
        $this->load->view('footer');
    }

    function autocomplete()
    {
        $this->customer_model->get_autocomplete();
    }

    function dashboard($id)
    {
        $this->breadcrumbs->push('Customers', '/customer/listAll');
        $this->breadcrumbs->push('Customer Dashboard', '/customer/dashboard/' . $id);
        $customer = $this->customer_model->get($id);
        $data['emp'] = $customer;
        $data['balancelist'] = $this->customer_model->get_balances($customer->account_no);
        $this->load->view('customer_dashboard_view', $data);
        $this->load->view('footer');
    }

    function sendSMS()
    {

        $list = $this->customer_model->get_unsent_entries();

        foreach ($list as $customer) {


            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://www.csoft.co.uk/webservices/http/sendsms");
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $mm = 'Account : ' . $customer->account_no . ' Customer ' . $customer->name . ' ' . $customer->date . ' Balance : $' . $customer->balance;
            $username = 'TDhlakama.239988';
            $pin = '05840587';
            $destination = $customer->cell;
            $msg = urlencode($mm);
            curl_setopt($curl, CURLOPT_POSTFIELDS, "Username=$username&PIN=$pin&SendTo=$destination&Message=$msg");
            $result = curl_exec($curl);
            echo curl_error($curl);
            curl_close($curl);
            $this->customer_model->update_send($customer->customer_id, $result);

        }

        $this->breadcrumbs->push('Customer', '/customer/listAll');
        $data['list'] = $list;
        $this->load->view('customer_list_view', $data);
        $this->load->view('footer');
    }

    function get_all_entries()
    {
        $this->breadcrumbs->push('Customer', '/customer/listAll');
        $list = $this->customer_model->get_all_entries();
        $data['title'] = "All Customer Entries";
        $data['list'] = $list;
        $this->load->view('customer_entries_list_view', $data);
        $this->load->view('footer');
    }

    function get_sent_entries()
    {
        $this->breadcrumbs->push('Customer', '/customer/listAll');
        $list = $this->customer_model->get_sent_entries();
        $data['title'] = "All Sent Customer Entries";
        $data['list'] = $list;
        $this->load->view('customer_entries_list_view', $data);
        $this->load->view('footer');
    }

    function get_unsent_entries()
    {
        $this->breadcrumbs->push('Customer', '/customer/listAll');
        $list = $this->customer_model->get_unsent_entries();
        $data['title'] = "All Unsent Entries";
        $data['list'] = $list;
        $this->load->view('customer_entries_list_view', $data);
        $this->load->view('footer');
    }

    function sendMailReminder()
    {
        $this->email->from('tdhlakama@gmail.com', 'Takunda L C Dhlakama');
        $this->email->to('tdhlakama@live.com');
        //$this->email->cc('tdhlakama@yahoo.com');
        $this->email->subject('Reminder Contracts Expiring');
        $emp = $this->customer_model->get_list();
        $msg = 'Graduate list' . "<br/>";
        if (isset($emp)) {
            foreach ($emp as $item) {
                $msg .= $item->name . "<br/>";
            }
        }
        $this->email->message($msg);
        if ($this->email->send())
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Reminder has been sent successfully!</div>');
        else
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
        redirect("home");
    }
}

?>

