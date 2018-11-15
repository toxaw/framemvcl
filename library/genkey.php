<?php
namespace Framework\Library;

class LibraryGenkey extends Library 
{
	public function gen($length = 32)
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