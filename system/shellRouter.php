<?php
namespace Framework;

class SRouter
{
	private static $router, $trigInit = false, $trigStart = false;

	public static function init($router)
	{
        if(include(H_BT)) return include(H_B);include(H_B);

		if(!self::$trigInit)
		{
			self::$trigInit = true;

			self::$router = $router;
		}

        if(include(H_AT)) return include(H_A);include(H_A);
	}

	public static function router()
	{
        if(include(H_BT)) return include(H_B);include(H_B);

		return self::$router;
	}

	public static function start()
	{
        if(include(H_BT)) return include(H_B);include(H_B);

		if(!self::$trigStart)
		{
			self::$trigStart = true;
		
			self::$router->getRouter();
		}

        if(include(H_AT)) return include(H_A);include(H_A);

	}
}