<?php
//define
define("P_SYSTEM", ROOT.'/system');

define("P_START", P_SYSTEM.'/startup.php');

define("P_ERROR", P_SYSTEM.'/error.php');

define("P_STACKCLASS", P_SYSTEM.'/stackClass');

define("P_DB", P_SYSTEM.'/db.php');

define("P_TOOLS", P_SYSTEM.'/tools.php');

define("P_CONTROLLER", P_SYSTEM.'/controller.php');

define("P_MODEL", P_SYSTEM.'/model.php');

define("P_LINCL", P_SYSTEM.'/library_includer.php');

define("P_LIBRARY", P_SYSTEM.'/library.php');

define("P_SLIBRARY", P_SYSTEM.'/shellLibrary.php');

define("P_HOOK", P_SYSTEM.'/hook/hook.php');

define('H_AT', P_SYSTEM.'/hook/hookAfterType.php');

define('H_BT', P_SYSTEM.'/hook/hookBeforeType.php');

define('H_A', P_SYSTEM.'/hook/hookAfter.php');

define('H_B', P_SYSTEM.'/hook/hookBefore.php');

define("P_INCL", P_SYSTEM.'/class_includer.php');

define("P_ROUTER", P_SYSTEM.'/router.php');

define("P_SROUTER", P_SYSTEM.'/shellRouter.php');

define("P_C", P_WORK.'/controller');

define("P_M", P_WORK.'/model');

define("P_L", P_WORK.'/language');

define("P_V", P_WORK.'/view');

//Stack->config
define("ONE_MODEL", false);

define("ONE_LANGUAGE", false);

//Router->config
$router_config['private_path'] = array('common\/.+');

$router_config['run_path'] = 'home/home';

$router_config['default_method'] = 'index';

$router_config['404_path'] = 'common/404_not_found';

//Class_includer->config
$class_includer_config['load_directories'] = array(P_CLASS, P_STACKCLASS);
