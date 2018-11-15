<?php
namespace Framework;

    $result = array();
    
    $result = scandir(P_LIB);

    foreach($result as $fileName)
    {
        if($result=='.' || $result=='..') continue;

    	if(is_file(P_LIB.'/'.$fileName))
    	{
    		require_once(P_LIB.'/'.$fileName);

    		$libName = explode(".", $fileName);

    		array_pop($libName);

    		$libName = implode(".", $libName);

    		$key = $libName;		

    		if(class_exists($libNameFull = 'Framework\Library\Library'.ucfirst($libName)))
    		{
                if(get_parent_class($libNameFull) != "Framework\Library\Library")
                   (new SysError())->error(16, array($libNameFull));

    			SLibrary::addLib($key, new $libNameFull());
    		}
            else if(class_exists($libNameFull = 'Framework\Library\LibraryS'.ucfirst($libName)))
            {
                if(get_parent_class($libNameFull) != "Framework\Library\Library")
                   (new SysError())->error(16, array($libNameFull));

                SLibrary::addLibStatic($key, new $libNameFull());
            }
            else if(class_exists($libNameFull = 'Framework\Library\LibraryN'.ucfirst($libName)))
            {
                if(get_parent_class($libNameFull) != "Framework\Library\Library")
                   (new SysError())->error(16, array($libNameFull));

                new $libNameFull();
            }
            else if(class_exists($libNameFull = 'Framework\Library\LibraryC'.ucfirst($libName)))
            {
                if(get_parent_class($libNameFull) != "Framework\Library\Library")
                   (new SysError())->error(16, array($libNameFull));

                SLibrary::addLibController($key, new $libNameFull());
            }
            else if(class_exists($libNameFull = 'Framework\Library\LibraryM'.ucfirst($libName)))
            {
                if(get_parent_class($libNameFull) != "Framework\Library\Library")
                   (new SysError())->error(16, array($libNameFull));

                SLibrary::addLibModel($key, new $libNameFull());
            }
            else if(class_exists($libNameFull = 'Framework\Library\LibrarySC'.ucfirst($libName)))
            {
                if(get_parent_class($libNameFull) != "Framework\Library\Library")
                   (new SysError())->error(16, array($libNameFull));

                SLibrary::addLibStaticController($key, new $libNameFull());
            }
            else if(class_exists($libNameFull = 'Framework\Library\LibrarySM'.ucfirst($libName)))
            {
                if(get_parent_class($libNameFull) != "Framework\Library\Library")
                   (new SysError())->error(16, array($libNameFull));

                SLibrary::addLibStaticModel($key, new $libNameFull());
            }
    		else
    		{
				(new SysError())->error(14, array(libName));    			
    		}
    	}
    }
    
    unset($result);
    
    if(isset($fileName))
        unset($fileName);
    
    if(isset($libName))
        unset($libName);
    
    if(isset($key))
        unset($key);

    SLibrary::closedAddLib();

// class Library[name] extends Library

// class LibraryS[name] extends Library

// class LibraryC[name] extends Library

// class LibraryM[name] extends Library

// class LibrarySC[name] extends Library

// class LibrarySM[name] extends Library