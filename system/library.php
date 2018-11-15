<?php
namespace Framework\Library;

abstract class Library
{
    protected $db;
    
    public function __construct()
    {
        $this->db = new \Framework\MySQLiAdaptor(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
    }
}