<?php
abstract class Controller
{
    protected $data, $model, $language, $library, $tools;
    
    public function __construct()
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        $this->data = array();
        
        $this->model = new Framework\StackModel();
        
        $this->language = new Framework\StackLanguage();

        $this->library = new Framework\StackLibrary(Framework\SLibrary::libraryController());

        $this->tools = new Framework\Tools();

        if(include(H_AT)) return include(H_A);include(H_A);
    }

    protected function view($path)
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        $pathFile = P_V.'/'.$path.'.tpl';
        
        $error = new Framework\SysError();
        
        if(file_exists($pathFile))
        {
            extract($this->data, EXTR_OVERWRITE);
            
            if(include(H_AT)) return include(H_A);include(H_A);

            include($pathFile);
        }
        else 
        {
            $error->error(13, array($path));
        }
    }
}


