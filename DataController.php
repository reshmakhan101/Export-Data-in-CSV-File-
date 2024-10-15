<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DataModel'); // Load your model
    }


 public function index() {
        $this->load->view('data_view'); // Load the view file
    }


    public function download_csv() {
       // Get the phone number from the form input
    $phone = $this->input->post('phone');

    // Fetch data based on the provided phone number or all data if none is provided
    if (!empty($phone)) {   
        $data = $this->DataModel->get_data_by_phone($phone); // Fetch data for the provided phone number
    } else {           
        $data = $this->DataModel->get_all_data(); // Fetch all data if no phone number is provided
    }

    // Check if any data is found
    if (empty($data)) {
        show_error('No data found.', 404);
    }
    
        // Set headers for download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="data.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Open output stream
        $output = fopen('php://output', 'w');

        // Add column headers (optional)
        fputcsv($output, array('id', 'name', 'phone', 'age', 'gender', 'flat_no', 'building', 'recommend', 'reason', 'internet_issue', 'issue', 'raised_complaint', 'service_rating', 'service_reason', 'prompt_action_rating', 'guidance_rating', 'home_visit_rating', 'timely_resolution_rating', 'handling_rating', 'valued_rating','courteous_rating', 'available_rating', 'knowledge_rating', 'query_resolution_rating', 'promises_fulfilled_rating', 'continue_service', 'exit_reason ', 'improvement', 'created_at')); // Replace with your column names

        // Add data rows
        foreach ($data as $row) {
            fputcsv($output, $row);
        }

        fclose($output);
        exit; // Prevent any further output
    }
}
