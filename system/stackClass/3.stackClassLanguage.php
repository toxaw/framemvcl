<?php
namespace Framework;

class StackClassLanguage 
{
    private $language;
    
    public function __construct($language = array())
    {   
        if(include(H_BT)) return include(H_B);include(H_B);
 
        $this->language = $language;

        if(include(H_AT)) return include(H_A);include(H_A);
    }
    
    public function get($key)
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        if(!array_key_exists($key, $this->language))
        {
            if(include(H_AT)) return include(H_A);include(H_A);

            return $key;
        }

        if(include(H_AT)) return include(H_A);include(H_A);
        
        return $this->language[$key];
    }
}