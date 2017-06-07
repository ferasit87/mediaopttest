<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
	
	public function __construct()
	{
			parent::__construct();
			$this->load->model('task_model');
			$this->load->model('employee_model');
			$this->load->helper('url_helper');
	}
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation'); 
		
		
		$this->form_validation->set_rules('id_employee', 'Employee', 'required');
		$this->form_validation->set_rules('id_project', 'Project', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('start', 'Start Time', 'required');
		$this->form_validation->set_rules('end', 'End Time', 'required');
		
		$data['employees'] = $this->employee_model->get_employees();
		$data['tasks'] = $this->task_model->get_tasks();
		$data['projects'] = $this->task_model->get_projects();
		 
		$data['title'] = 'Task for Employees archive';
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('task/index');
			$this->load->view('templates/footer');

		}else
		{
			$this->task_model->set_tasks();        
			redirect( base_url() . 'task'); 
		}

		
	} 
	public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
           
        $this->task_model->delete_tasks($id);        
        redirect( base_url() . 'task');      
    }
	public function calculate()
	{
		$this->load->helper('form');
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('id_project', 'Project', 'required');
		
        $data['title'] = 'Billable hours';
		$data['projects'] = $this->task_model->get_projects();
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('task/calculate', $data);
			$this->load->view('templates/footer');  

		}else
		{
			$data['billing'] = $this->task_model->calculate();
			$data['project'] = $this->task_model->get_projects($this->input->post('id_project')) ;
			$this->load->view('templates/header', $data);
			$this->load->view('task/calculate', $data);
			$this->load->view('templates/footer');  
		}
		 
    }
	public function peak()
	{
		$this->load->helper('form');
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('id_project', 'Project', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		
        $data['title'] = 'Peak hour';
		$data['projects'] = $this->task_model->get_projects();
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('task/peak', $data);
			$this->load->view('templates/footer');  

		}else
		{
			$data['timeRanges'] = $this->task_model->peak();
			$data['project'] = $this->task_model->get_projects($this->input->post('id_project')) ;
			$data['date'] = $this->input->post('date')  ;
			$this->load->view('templates/header', $data);
			$this->load->view('task/peak', $data);
			$this->load->view('templates/footer');  
		}
		 
    }
	 
}
