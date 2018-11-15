<?php
namespace Framework\Library;

class Hook
{
	private static $key = '', $args = array(), $newArgs = array(), $hooks = array(), $trigClosedAdd = false;

	public static function addInfo($backtrace, $defined_vars, $before)
	{ 
		self::$key = self::genKey($backtrace);

		if(!self::is(self::$key)) return false;
	
		if(!(self::isB(self::$key)==$before)) return false;

		self::$args['local'] = array();

		self::$args['property'] = array();
		
		self::$args['local'] = $defined_vars;

		return true;
	}

	public static function addProp($key, $value)
	{
		self::$args['property'][$key] = $value;
	}

	public static function exec()
	{
		self::$newArgs['local'] = array();

		self::$newArgs['property'] = array();
		
		$callback = self::$hooks[self::$key]['callback'];

		$newArgs = $callback(self::$args);

		if(isset($newArgs['local']))
			self::$newArgs['local']  = $newArgs['local'];

		if(isset($newArgs['property']))
			self::$newArgs['property']  = $newArgs['property'];
	}

	public static function getLocal()
	{
		$local = self::$newArgs['local'];

		self::uns();

		return $local;
	}

	public static function getProp()
	{
		return self::$newArgs['property'];
	}	

	public static function uns()
	{
		self::$key = '';

		self::$args = array();

		self::$newArgs = array();

	}

	private static function genKey($backtrace)
	{
		$className = $backtrace[1]['class'];

		$className = explode('\\', $className);

		$className = array_pop($className);

		$functionName = $backtrace[1]['function'];
		
		return $className.'/'.$functionName;		
	}

	public static function add($path, $callback)
	{
		if(!self::$trigClosedAdd)
		{
			if(!array_key_exists($path, self::$hooks))
			{
				self::$hooks[$path] = array('r'=> false,
											'b' => false,
											'callback' => $callback);
			}
			else
			{
				(new \Framework\SysError())->error(17, array($path));
			}
		}
	}

	public static function addR($path, $callback)
	{
		if(!self::$trigClosedAdd)
		{
			if(!array_key_exists($path, self::$hooks))
			{
				self::$hooks[$path] = array('r'=> true,
											'b' => false,
											'callback' => $callback);
			}
			else
			{
				(new \Framework\SysError())->error(17, array($path));
			}
		}
	}

	public static function addB($path, $callback)
	{
		if(!self::$trigClosedAdd)
		{
			if(!array_key_exists($path, self::$hooks))
			{
				self::$hooks[$path] = array('r'=> false,
											'b' => true,
											'callback' => $callback);
			}
			else
			{
				(new \Framework\SysError())->error(17, array($path));
			}
		}
	}

	public static function addBR($path, $callback)
	{
		if(!self::$trigClosedAdd)
		{
			if(!array_key_exists($path, self::$hooks))
			{
				self::$hooks[$path] = array('r'=> true,
											'b' => true,
											'callback' => $callback);
			}
			else
			{
				(new \Framework\SysError())->error(17, array($path));
			}
		}
	}

	public static function isR($backtrace, $before)
	{
		$key = self::genKey($backtrace);

		if(!self::is($key)) return false;

		if(!(self::isB($key)==$before)) return false;
		
		return self::$hooks[$key]['r'];
	}		

	private static function is($key)
	{
		if(array_key_exists($key, self::$hooks))
			return true; 

		return false;
	}

	private static function isB($key)
	{
		return self::$hooks[$key]['b'];
	}

	public static function closedAdd()
	{
		self::$trigClosedAdd = true;
	}

}