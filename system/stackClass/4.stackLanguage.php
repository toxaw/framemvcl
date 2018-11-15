<?php
namespace Framework;

class StackLanguage extends StackObject
{
    private $defaultLanguage;

    public function __construct()
    {
        if(include(H_BT)) return include(H_B);include(H_B);
 
        parent::__construct();
        
        $this->typeError['error_get_exists'] = 8;
        
        $this->defaultLanguage = array('text_no_results' => 'Нет данных!',
                                       'text_check' => 'Сохранить',
                                       'text_refresh' => 'Обновить',
                                       'text_add' => 'Проверка',
                                       'text_edit' => 'Редактировать',
                                       'text_save' => 'Сохранить',
                                       'text_delete' => 'Удалить',
                                       );

        if(include(H_AT)) return include(H_A);include(H_A);
    }
    
    public function init($key)
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        /*преобразование ключа*/
        $regenKey = $this->regenKey($key);
        
        /*проверка на уникальность в массиве*/
        if(array_key_exists($regenKey, $this->objects))
            $this->error->error(9, array($key)); 
            
        // генерация пути подключения с проверкой
        $pathFile = P_L.'/'.$key.'.php';
        
        if(file_exists($pathFile))
        {
            global $_;
            
            foreach ($this->defaultLanguage as $textKey => $text) 
            {
                $_[$textKey] = $text;
            }

            if(include(H_AT)) return include(H_A);include(H_A);
            
            include($pathFile);
            
            /*добавление объекта в стек*/
            $this->objects[$regenKey] = new StackClassLanguage($_);
            
            $_ = array();
        }
        else
        {
            $this->error->error(10, array($key));
        }
    }
}