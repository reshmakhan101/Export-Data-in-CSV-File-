<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataModel extends CI_Model {

     public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_data() {
    $query = $this->db->get('feedback'); // Replace with your table name
    return $query->result_array();
}

public function get_data_by_phone($phone) {
    $this->db->where('phone', $phone); // Replace 'phone_column' with your actual column name
    $query = $this->db->get('feedback'); // Replace with your table name
    return $query->result_array();
}

}
