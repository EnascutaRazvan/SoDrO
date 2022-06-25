<?php
class connectionDB{
public $dbhost;
public $dbuser;
public $dbpass;
public $dbname;
public $con;


    function __construct(
    $dbhost,
    $dbuser,
    $dbpass,
    $dbname,
    )
    {
     
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
        

        $this->con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        
        if(!$this->con)
        die("connection error : ".mysqli_connect_error());

    }
}