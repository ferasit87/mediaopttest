<?php
class Tracking_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();				 
        } 	 
		public function get_trackings($id_employee = FALSE,$date = FALSE)
		{
			$CI =& get_instance();
			$CI->load->model('employee_model');
			$where = array () ;
			if ($id_employee ) $where['id_employee'] = $id_employee ;
			if ($date ) $where['date'] = $date ;		
			$query = $this->db->get_where('logs', $where);
			$result = $query->result_array();
			foreach ($result as $key => $record)
			{
				$employee = $CI->employee_model->get_employees($record['id_employee']); 
				$result[$key]['employee']= $employee['name']." ".$employee['lName'];
			}
			 
			return $result;
 
		}
		public function set_trackings($id = FALSE)
		{
			$start_time = date("G:i", strtotime($this->input->post('start')));	
			$end_time = date("G:i", strtotime($this->input->post('end')));	
			$data = array(
				'id_employee' => $this->input->post('id_employee'),			 
				'date' => $this->input->post('date'),			 
				'start_time' => $start_time,			 
				'end_time' => $end_time
			);			 
			if ($id)
			{
				$this->db->where('ID', $id); 
				return $this->db->update('logs', $data);
			}
			return $this->db->insert('logs', $data);
		}
		public function set_tracking_csv($id_employee,$date,$start_time,$end_time)
		{
		 	
			$data = array(
				'id_employee' => $id_employee,			 
				'date' => $date,			 
				'start_time' => $start_time,			 
				'end_time' => $end_time
			);
			$query = "INSERT INTO m_logs (id_employee, date, start_time, end_time)
					 VALUES ($id_employee, $date, $start_time, $end_time)"; 
		 
			return   $this->db->query($query);
		}
		public function delete_trackings($id)
		{
			$this->db->where('ID', $id);
			return $this->db->delete('logs');
		}
		
}
