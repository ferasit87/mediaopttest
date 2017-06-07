<?php
class Task_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();				 
        } 	 
		public function get_tasks($id_employee = FALSE,$date = FALSE,$id_project = FALSE)
		{
			$CI =& get_instance();
			$CI->load->model('employee_model');
			$where = array () ;
			if ($id_employee ) $where['id_employee'] = $id_employee ;
			if ($id_project ) $where['id_project'] = $id_project ;
			if ($date ) $where['date'] = $date ;		
			$query = $this->db->get_where('task', $where);
			$result = $query->result_array();
			foreach ($result as $key => $record)
			{
				$employee = $CI->employee_model->get_employees($record['id_employee']); 
				$result[$key]['employee']= $employee['name']." ".$employee['lName'];
				$projectquery = $this->db->get_where('project', array ('ID' => $record['id_project']));
				$project = $projectquery->row_array(); 
				$result[$key]['project']= $project['name'] ;
			}
		 
			return $result;
 
		}
		public function set_tasks($id = FALSE)
		{
			$start_time = date("G:i", strtotime($this->input->post('start')));	
			$end_time = date("G:i", strtotime($this->input->post('end')));	
			$data = array(
				'id_employee' => $this->input->post('id_employee'),			 
				'id_project' => $this->input->post('id_project'),			 
				'date' => $this->input->post('date'),			 
				'start_time' => $start_time,			 
				'end_time' => $end_time
			);			 
			if ($id)
			{
				$this->db->where('ID', $id); 
				return $this->db->update('task', $data);
			}
			return $this->db->insert('task', $data);
		}
		public function delete_tasks($id)
		{
			$this->db->where('ID', $id);
			return $this->db->delete('task');
		}
		public function get_projects($id = FALSE)
		{
			if ($id === FALSE)
			{
					$query = $this->db->get('project');
					return $query->result_array();
			}

			$query = $this->db->get_where('project', array('ID' => $id));
			return $query->row_array();
		
		}
		public function calculate()
		{
			$query = $this->db->get_where('task', array('id_project' => $this->input->post('id_project')));
			$result = $query->result_array();
			//$hours = -1482001200 ;			 
			$hours = 0 ;
			
			foreach ($result as $key => $record)
			{
				$hours += strtotime($record['end_time']) - strtotime($record['start_time']);
			}
			$min = ($hours%3600)/60  ;
			if ($min<10) $min = "0".$min; 
			$hours =  ($hours- ($hours%3600))/3600;		
			return  $hours.":".$min ; 
		 
		}
		public function peak()
		{
			$resultf ['counts'] = 0 ;
			$resultf ['start_time'] = 0 ;
			$resultf ['end_time'] = 0 ;
			$query = $this->db->get_where('task', array('id_project' => $this->input->post('id_project') , 'date' => $this->input->post('date') ));
			$result = $query->result_array();
			if (count($result)>0)
			{
				foreach ($result as $key => $record)
				{
					$times[strtotime($record['start_time'])] = strtotime($record['start_time']);
					$times[strtotime($record['end_time'])] = strtotime($record['end_time']);				 
				}
				sort($times);
				$counts = array();		 
				foreach ($times as $key => $time)
				{				 
						if ($key < count($times)-1)
						{
							$stTime = 	$time ; 		 
							$endTime =  $times[$key+1];
							$counts[$key]['count'] = 0 ;
							$counts[$key]['start_time'] = $stTime;
							$counts[$key]['end_time'] = $endTime ;
							foreach ($result as  $record)
							{ 
								if ((strtotime($record['start_time']) < $stTime) && (strtotime($record['end_time']) > $stTime)
									||(strtotime($record['start_time']) < $endTime) && (strtotime($record['end_time']) > $endTime)
									||(strtotime($record['start_time']) > $stTime) && (strtotime($record['end_time']) < $endTime)
									)
								{								 
									$counts[$key]['count'] += 1 ; 
								}
							}					
						}
				}		 
				
				foreach ($counts as $count) 
				{
					if ($count['count']>$resultf['counts'])
					{
						$resultf ['counts'] = $count['count'] ;
						$resultf ['start_time'] = $count ['start_time'];
						$resultf ['end_time'] = $count ['end_time'] ;
					}
				}  
				$resultf ['start_time']= date('H:i:s', 	$resultf ['start_time']);
				$resultf ['end_time']  = date('H:i:s', 	$resultf ['end_time']);
			}			
			return $resultf ; 
		 
		}
		
}
