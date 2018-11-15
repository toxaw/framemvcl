<?php
namespace Framework;

class SLibrary
{
	private static $libraryController = array(), $libraryModel = array(), $trigclosedAddLib = false;

	public static function libraryController()
	{
		return self::$libraryController;
	}

	public static function libraryModel()
	{
		return self::$libraryModel;
	}	

	public static function addLib($key, $lib)
	{
		if(!self::$trigclosedAddLib)
		{
			self::$libraryController[$key] = array('library' => $lib,
											 'static' =>false );

			self::$libraryModel[$key] = array('library' => $lib,
											 'static' =>false );
		}
	}

	public static function addLibStatic($key, $lib)
	{
		if(!self::$trigclosedAddLib)
		{
			self::$libraryController[$key] = array('library' => $lib,
											 'static' =>true );

			self::$libraryModel[$key] = array('library' => $lib,
											 'static' =>true );
		}
	}

	public static function addLibController($key, $lib)
	{
		if(!self::$trigclosedAddLib)
			self::$libraryController[$key] = array('library' => $lib,
											       'static' =>false );
	}

	public static function addLibModel($key, $lib)
	{
		if(!self::$trigclosedAddLib)
			self::$libraryModel[$key] = array('library' => $lib,
											 'static' =>false );
	}

	public static function addLibStaticController($key, $lib)
	{
		if(!self::$trigclosedAddLib)
			self::$libraryController[$key] = array('library' => $lib,
											       'static' =>true );
	}

	public static function addLibStaticModel($key, $lib)
	{
		if(!self::$trigclosedAddLib)
			self::$libraryModel[$key] = array('library' => $lib,
											 ' static' =>true );
	}				

	public static function closedAddLib()
	{
		self::$trigclosedAddLib = true;
	}
}