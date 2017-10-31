<?php
namespace core\lib;
class model extends \Medoo\Medoo {
    public function __construct(){
        $db=deploy::all("database");
        parent::__construct($db);
    }
}