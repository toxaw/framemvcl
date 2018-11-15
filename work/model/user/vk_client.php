<?php
class ModelUserVk_client extends Model
{
	public function getVk_clients($data =array())
	{
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."user WHERE login ='". $this->db->escape($data['login'])."' and password ='". $this->db->escape($data['password'])."'");

		return $query->row;
	}
}