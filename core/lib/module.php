<?php

namespace core\lib;

class model extends \PDO{
    public function __construct(){
        $dsn='mysql:host=localhost;dbname=maibo';
        $userName='root';
        $password='';
        try{
            parent::__construct($dsn,$userName,$password);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
}