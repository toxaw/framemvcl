<?php
class VKapi
{
	private $version, $acces_token, $expires_in, $error;

	public function __construct($version, $acces_token, $expires_in)
	{
		$this->error = new VKsys\VKQueryError();
	}

	public function isClient()
	{
		return true;
	}

	public function getUserNameClient()
	{
		$data = array('name' =>'Default', 'surname' => 'Default');
		
		return $data;
	}

	
}