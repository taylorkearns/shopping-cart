<?php

class DatabaseConnection
{
    var $host;
    var $username;
    var $password;
    var $connection;
    var $database;
    
    function db_connect($h, $u, $p)
    {
        $this->host = $h;
        $this->username = $u;
        $this->password = $p;
        $this->connection = mysql_connect($this->host, $this->username, $this->password);
        return $this->connection;
    }
}

?>