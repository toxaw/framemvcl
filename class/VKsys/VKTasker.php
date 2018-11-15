<?php
namespace VKsys;

class VKTasker
{
	private $limit, $db, $key, $gener;

	public function __construct()
	{
		$this->db = new Framework\MySQLiAdaptor(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

		$this->key = '';

		$this->gener = new VKGenSessionTasker();

		$query = $this->db->query("SELECT config_value FROM " . DB_PREFIX . "_vksys_config WHERE config_key = 'count_task_time'");

		$result = $query->row;

		$this->limit = (int)$result['config_value'];
	}

	public function run($tasks, $cron = false)
	{
		if(!$this->isActiveCron() && $cron)
			return;
				
		$this->key = $this->gener->genKey();

		while (!$this->isPermission()) 
		{
			usleep(permission_sleep_time*1000);
		}

		foreach ($tasks as $url) 
		{
			$this->addTask($url);
		}	

		$this->runTask();

		$this->closedSession();
	}

	private function isActiveCron()
	{
		$query = $this->db->query("SELECT config_value FROM " . DB_PREFIX . "_vksys_config WHERE config_key = 'is_active_cron'");

		$result = $query->row;

		if($result['config_value']=='true')
			return true;

		return false;
	}

	private function isPermission()
	{
		$this->db->query("UPDATE " . DB_PREFIX . "_vksys_config SET config_value = '" . $this->key . "' WHERE config_key = 'is_perform_key' AND config_value = ''");

		$query = $this->db->query("SELECT config_value FROM " . DB_PREFIX . "_vksys_config WHERE config_key = 'is_perform_key'");

		$resultKey = $query->row['config_value'];

		if($resultKey==$this->key)
			return true;

		return false;
	}

	private function closedSession()
	{
		$this->db->query("UPDATE " . DB_PREFIX . "_vksys_config SET config_value = '' WHERE config_key = 'is_perform_key'");

		$this->gener->clearKey($this->key);
	}

	private function runTask()
	{
		do 
		{
   			$tasks = $this->getOrdTasks();

   			foreach ($tasks as $task) 
   			{
   				$url = $task['task_GET'];
   				
   				$this->runCurl($url);

   				$this->deleteTask($task['task_id']);
   			}

   			usleep(interval_stack_query_time*1000);
		} 
		while (count($task) > 0);
	}

	private function runCurl($url)
	{
        if( $curl = curl_init() ) 
        {
            curl_setopt($curl, CURLOPT_URL, $url);
        
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        
            $out = curl_exec($curl);
        
            curl_close($curl);
        
            return $out;
        }

        return '';
	}

	private function getOrdTasks()
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "_vksys_task LIMIT ". $limit);

		return $query->rows;
	}

	private function deleteTask($task_id)
	{
		$this->db->query("DELETE FROM " . DB_PREFIX . "_vksys_task WHERE task_id = '" . (int)$task_id . "'");
	}

	public function setCountTaskTime()
	{

	}

	public function getCountTaskTime()
	{
		
	}

	private function addTask($url)
	{
		$this->db->query("INSERT INTO " . DB_PREFIX . "_vksys_task (task_GET) VALUES ('".$this->db->escape($url)."')");
	}
}


