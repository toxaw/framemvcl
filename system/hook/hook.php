<?php
namespace Framework\Library;

class Hook
{
	private static $key = '', $args = array(), $newArgs = array(), $hooks = array(), $trigClosedAdd = false, $before = true;

	public static function addInfo($backtrace, $defined_vars, $before)
	{
		self::$key = self::genKey($backtrace);

		if(!self::is(self::$key)) return false;
		
		if(!self::isB(self::$key) && $before) return false;
		//echo '<pre>';
		//print_r(self::$hooks[self::$key]);
		//echo(self::$key.' '.self::isB(self::$key));

		self::$before = $before;

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
		
		$args = self::$args;

		foreach (self::getCallBacks(self::$key, false, self::$before) as $callback)
		{

			$args = $callback($args);
		}
		
		foreach (self::getCallBacks(self::$key, true, self::$before) as $callback)
		{
			$args = $callback($args);
		}

		if(isset($newArgs['local']))
			self::$newArgs['local'] = $args['local'];

		if(isset($newArgs['property']))
			self::$newArgs['property'] = $args['property'];
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

		self::$before = true;
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
				self::$hooks[$path][] = array('r'=> false,
											'b' => false,
											'callback' => $callback);
		}
	}

	public static function addR($path, $callback)
	{
		if(!self::$trigClosedAdd)
		{
				self::$hooks[$path][] = array('r'=> true,
											'b' => false,
											'callback' => $callback);
		}
	}

	public static function addB($path, $callback)
	{
		if(!self::$trigClosedAdd)
		{
				self::$hooks[$path][] = array('r'=> false,
											'b' => true,
											'callback' => $callback);
		}
	}

	public static function addBR($path, $callback)
	{
		if(!self::$trigClosedAdd)
		{
				self::$hooks[$path][] = array('r'=> true,
											'b' => true,
											'callback' => $callback);
		}
	}

	public static function isR($backtrace, $before)
	{
		$key = self::genKey($backtrace);

		if(!self::is($key)) return false;

		if(!self::isB($key) && $before) return false;

		for($i=0;$i<count(self::$hooks[$key]);$i++)
		{
			if(self::$hooks[$key][$i]['r'])
				return true;			
		}

		return false;
	}		

	private static function is($key)
	{
		if(array_key_exists($key, self::$hooks))
			return true; 

		return false;
	}

	private static function isB($key)
	{

		for($i=0;$i<count(self::$hooks[$key]);$i++)
		{
			if(self::$hooks[$key][$i]['b'])
				return true;		
		}

		return false;
	}

	public static function closedAdd()
	{
		self::$trigClosedAdd = true;
	}

	private static function getCallBacks($key, $return, $before)
	{
		$callBacks = array();
		//echo "<pre>";print_r(self::$hooks[$key]);echo('|'.$return.'|'.$before.'|<br>');
		for($i=0;$i<count(self::$hooks[$key]);$i++)
		{
			if(self::$hooks[$key][$i]['r']==$return && self::$hooks[$key][$i]['b']==$before)
				{$callBacks[] = self::$hooks[$key][$i]['callback'];	}
			
		}

		return $callBacks;
	}

}