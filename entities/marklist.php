<?php
// Add: INSERT INTO `permark`.`marklist` (`MarkId`, `Url`, `LastVisited`) VALUES ('1', 'http://dilbert.com/fast/2013-07-11/', NOW());

require_once("setup.php");

class MarkList
{
    public $id;
    public $LastVisited;
    public $MarkId;
    public $Url;
}

class MarkListHandler
{
    private $Config;
    private $db;

    function __construct()
    {
        $this->Config = new Config();
    }

}
?>
