<?php

/**
 * Application Start
 *
 * @author tdhlakama
 */
class Home extends Generic_input {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['list'] = $this->customer_model->get_all_entries();
        $data['unsentlist'] = $this->customer_model->get_unsent_entries();
        $data['sentlist'] = $this->customer_model->get_sent_entries();
        $this->load->view('home_view' , $data);
        $this->load->view('footer');
    }


}
?>

