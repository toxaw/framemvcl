<?php
namespace VKsys;

class VKGenSessionTasker
{
	private $key;

	public function __construct()
	{
		$this->db = new Framework\MySQLiAdaptor(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
	}

	public function getKey()
	{
		$key = '';

		do
		{
			$key = $this->generateKey();

			$query = $this->db->query("SELECT COUNT(*) as cnt FROM " . DB_PREFIX . "_vksys_task_session_key WHERE key ='" . $key . "'");

			$count = $query->row['cnt'];
		}
		while ($count < 0);

		$this->db->query("INSERT INTO " . DB_PREFIX . "_vksys_task_session_key (session_key) VALUES ('" . $key . "')");

		return $key; 
	}

	public function clearKey($key)
	{
		$this->db->query("DELETE FROM " . DB_PREFIX . "_vksys_task_session_key WHERE session_key = '" . $key . "'");
	}

	private function generateKey($length = 32)
	{
		$chars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
	
		$numChars = strlen($chars);
	
		$string = '';
	
		for ($i = 0; $i < $length; $i++) 
		{
	    	$string .= substr($chars, rand(1, $numChars) - 1, 1);
	  	}
	
		return $string;
	}
}