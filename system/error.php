<?php
namespace Framework;

class SysError
{
    private $textError;
    
    public function __construct()
    {
        $this->textError = array(
            0 => 'done!',
            1 => 'can\'t to start default controller to path "[replace1]"!',
            2 => 'can\'t to start controller to path "[replace1]"!',
            3 => 'model "[replace1]" is included!',
            4 => 'model "[replace1]" to pathFile is not exists!',
            5 => 'model "[replace1]" to class is not exists!',
            6 => 'model "[replace1]" to class error parent!',
            7 => 'model "[replace1]" is not init!',
            8 => 'language "[replace1]" is not init!',
            9 => 'language "[replace1]" is included!',
            10 => 'language "[replace1]" to pathFile is not exists!',
            11 => 'class "[replace1]" is exists!',
            12 => 'page "[replace1]" not found 404!',
            13 => 'view "[replace1]" is not exists!',
            14 => 'library "[replace1]" class to file is not found!',
            15 => 'library "[replace1]" is not include!',
            16 => 'library "[replace1]" to class error parent!',
            17 => 'hook "[replace1]" already added!'
        );
    }
    public function error($number, $replace = array())
    {
        $text = $this->textError[$number];
        
        $i = 1;
        
        foreach ($replace as $value) 
        {
            $text = str_replace('[replace'.$i.']', $value, $text);
            $i++;   
        }
        
        die('<br/><b style="color:'.($number==0?'green">':'red">Error: ').''.$text.'</b><br/>');
    }
}