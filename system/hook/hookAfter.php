<?php

if(\Framework\Library\Hook::addInfo(debug_backtrace(),get_defined_vars(), false))
{
	foreach (get_class_vars(get_class()) as $u9W6FqHeo6t => $u9W6FqHeo7t) 
	{
		\Framework\Library\Hook::addProp($u9W6FqHeo6t , $this->$u9W6FqHeo6t);

		unset($u9W6FqHeo6t);

		unset($u9W6FqHeo7t);
	}

	\Framework\Library\Hook::exec();

	foreach (Framework\Library\Hook::getProp() as $u9W6FqHeo6t => $u9W6FqHeo7t) 
	{
		$this->$u9W6FqHeo6t = $u9W6FqHeo7t;

		unset($u9W6FqHeo6t);

		unset($u9W6FqHeo7t);
	}

	if (\Framework\Library\Hook::isR(debug_backtrace(), false))
		return \Framework\Library\Hook::getLocal();

	extract(\Framework\Library\Hook::getLocal(), EXTR_OVERWRITE);
}