<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	
	
	
	public function __construct()
	{
			parent::__construct();
			$this->load->model('employee_model');
			$this->load->helper('url_helper');
	}
	
	public function index()
	{
		$data['employees'] = $this->employee_model->get_employees();
		$data['title'] = 'Employees archive';

		$this->load->view('templates/header', $data);
		$this->load->view('employees/index', $data);
		$this->load->view('templates/footer');
	}
	public function add()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Add a Employees item';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('employees/Add');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->employee_model->set_employee();
			$this->load->view('templates/header', $data);
			$this->load->view('employees/success');
			$this->load->view('templates/footer');
		
		}
	}
	public function view($id = NULL)
	{
		$data['employees_item'] = $this->employee_model->get_employees($id);

		if (empty($data['employees_item']))
		{
				show_404();
		}

		$data['title'] = $data['employees_item']['name'];

		$this->load->view('templates/header', $data);
		$this->load->view('employees/view', $data);
		$this->load->view('templates/footer');
	}
	public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
      
        $data['title'] = 'Edit a employees item';        
        $data['employees_item'] = $this->employee_model->get_employees($id);
       
        $this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('employees/edit', $data);
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->employee_model->set_employee($id);          
            redirect( base_url() . 'employee');
        }
    }    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
              
        $this->employee_model->delete_employee($id);        
       redirect( base_url() . 'employee');      
    }
	 
	 
}
