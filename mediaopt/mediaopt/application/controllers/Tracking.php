<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {
	
	public function __construct()
	{
			parent::__construct();
			$this->load->model('tracking_model');
			$this->load->model('employee_model');
			$this->load->helper('url_helper');
	}
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation'); 
		
		
		$this->form_validation->set_rules('id_employee', 'Employee', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('start', 'Start Time', 'required');
		$this->form_validation->set_rules('end', 'End Time', 'required');
		
		$data['employees'] = $this->employee_model->get_employees();
		$data['trackings'] = $this->tracking_model->get_trackings();
		$data['title'] = 'Tracking Employees archive';
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('tracking/index');
			$this->load->view('templates/footer');

		}else
		{
			$this->tracking_model->set_trackings();        
			redirect( base_url() . 'tracking'); 
		}

		
	} 
	public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
           
        $this->tracking_model->delete_trackings($id);        
        redirect( base_url() . 'tracking');      
    }
	 
}
