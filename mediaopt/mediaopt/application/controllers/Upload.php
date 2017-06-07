<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
				$this->load->model('tracking_model');
        }

        public function index()
        {
				$data['title'] = 'Upload Employees bulk records';
				$this->load->view('templates/header', $data);
				$this->load->view('upload/upload_form', $data);
				$this->load->view('templates/footer');
                
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'csv';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
				$data['title'] = 'Upload Employees bulk records';
                $this->load->library('upload', $config);
 
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());					 
						$this->load->view('templates/header', $data);
						$this->load->view('upload/upload_form', $error);
						$this->load->view('templates/footer');
                        
                }
                else
                {				 
                        $content = file_get_contents($_FILES['userfile']['tmp_name']);
						$rows = explode (';',$content);
						foreach ($rows as $row)
						{
							$cols = explode (',',$row);
							$this->tracking_model->set_tracking_csv($cols[0],$cols[1],$cols[2],$cols[3]);  
						}					 
						$data = array('upload_data' => $this->upload->data());
						$this->load->view('templates/header', $data);
						$this->load->view('upload/upload_success', $data);
						$this->load->view('templates/footer');
                       
                }
        }
}
?>