<?php
    class Connection extends mysqli{
        function __construct()
        {
           parent::__construct('localhost', 'root', '', 'api_rest');
           $this->set_charset('utf8');
           $this->connect_error == NULL ? 'Conexión exitosa a la DB' : die('Error de conexión a la BD'); 
        }//end __construct
    }//end class Connection