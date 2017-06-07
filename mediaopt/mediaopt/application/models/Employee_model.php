<?php
class Employee_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        } 	 
		public function get_employees($id = FALSE)
		{
			if ($id === FALSE)
			{
					$query = $this->db->get('employee');
					return $query->result_array();
			}

			$query = $this->db->get_where('employee', array('ID' => $id));
			return $query->row_array();
 
		}
		public function set_employee($id = FALSE)
		{		
			$data = array(
				'name' => $this->input->post('name'),			 
				'lName' => $this->input->post('lName'),			 
				'email' => $this->input->post('email')
			);
			if ($id)
			{
				$this->db->where('ID', $id); 
				return $this->db->update('employee', $data);
			}
			return $this->db->insert('employee', $data);
		}
		public function delete_employee($id)
		{
			$this->db->where('ID', $id);
			return $this->db->delete('employee');
		}
		 
		
} 