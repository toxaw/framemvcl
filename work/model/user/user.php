<?php
class ModelUserUser extends Model
{
	public function getUser($data)
	{
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."user WHERE login ='" . $this->db->escape($data['login']) . "' and password ='" . $this->db->escape($data['password']) . "'");

		return $query->row;
	}

	public function getUserById($data)
	{
		$query = $this->db->query("SELECT * FROM ".DB_PREFIX."user WHERE user_id ='" . (int)$data['user_id'] . "'");

		return $query->row;
	}
}