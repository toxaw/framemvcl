<?php
namespace Framework;

session_start();

require_once(P_ERROR);

require_once(P_DB);

require_once(P_HOOK);

require_once(P_SLIBRARY);

require_once(P_LIBRARY);

require_once(P_LINCL);

require_once(P_INCL);

require_once(P_TOOLS);

require_once(P_SROUTER);

require_once(P_ROUTER);

SRouter::init(new Router());

require_once(P_CONTROLLER);

require_once(P_MODEL);

SRouter::start();

die();