<?php
abstract class Model
{
    protected $db, $library;
    
    public function __construct()
    {
		if(include(H_BT)) return include(H_B);include(H_B);

        $this->db = new Framework\MySQLiAdaptor(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
        
        $this->model = new Framework\StackModel();
        
        $this->library = new Framework\StackLibrary(Framework\SLibrary::libraryModel());

        if(include(H_AT)) return include(H_A);include(H_A);
    }
}