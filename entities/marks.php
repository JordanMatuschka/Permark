<?php

require_once ("setup.php");

class Mark
{
    public $id;
    public $ShortUrl;

    function __construct($id = NULL, $ShortUrl = NULL)
    {
        $this->id = $id;
        $this->ShortUrl = $ShortUrl;
    }
}


class MarkHandler
{
    private $Config;
    private $db;


    function __construct()
    {
        $this->Config = new Config();
        $this->db = new mysqli($this->Config->sqlServer, $this->Config->sqlUser, $this->Config->sqlPass, $this->Config->sqlDatabase);

        if($this->db->connect_errno > 0)
        {
            die('Unable to connect to database [' . $this->db->connect_error . ']');
        }
    }

    function Query($queryString)
    {
        if(!$result = $this->db->query($queryString))
        {
            die('There was an error running the query [' . $this->db->error . ']');
        }
        return $result;

    }

    function GetAll()
    {
        $marks = array();

        $result = $this->Query("SELECT * FROM `marks`");
        while($row = $result->fetch_assoc())
        {
            $marks[] = new Mark($row['id'], $row['ShortUrl']);
        }
        $result->free();
        return $marks;
    }

    function Add($ShortUrl)
    {
        $this->Query("INSERT INTO `marks` (`id`, `ShortUrl`) VALUES (NULL, '$ShortUrl');");
    }
    
}

$a = new MarkHandler();
print_r( $a->GetAll());

?>
