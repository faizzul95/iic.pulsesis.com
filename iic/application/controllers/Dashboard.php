<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
	   parent::__construct();

	    $this->load->library('session');
        // $this->load->library('form_validation');        
		// $this->load->library('datatables');
        // $this->load->helper('string');

        if($this->session->userdata('logged_in') !== TRUE){
            redirect('auth');
        }
	   
	}

	public function index()
	{
		// check_auth();
        $roleid = $this->session->userdata('roleid');

        $this->session->set_flashdata('current_page','dashboard'); //get highlight on name

        if ($roleid == '1') {
            $this->load->view('dashboard_admission');
        }elseif ($roleid == '2') {
            $this->load->view('dashboard_finance');
        }elseif ($roleid == '3') {
            $this->load->view('dashboard_library');
        }
	}

	public function json() {
        header('Content-Type: application/json');
        echo $this->Event_model->displayActivityDashboard();
    }

}