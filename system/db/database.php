<?php 
class database{
    //khoi tao thanh vien
    var $sql, $statement,$pdo;
    function __construct()
    {   
        //khoi tao gia tri cho thanh vien
        try{
            //bo sung cau hinh PDO de hien thi loi truy van
            $options = [
                PDO::ATTR_EMULATE_PREPARES=>false,
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            ];
            $this->pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';port='.PORT,USERNAME,PASSWORD,$options );
            $this->pdo->query('set names utf8');           
        }catch(PDOException $e)
        {
            exit($e->getMessage());
            // return false;
        }
    }
    function setquery($sql)
    {
        $this->sql = $sql;
        return $this;
    }
    function loadrow($params =[])
    {
        try{
            $this->statement  = $this->pdo->prepare($this->sql);     
            $this->statement->execute($params);
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e)
        {
            exit($e->getMessage());
            // return false;
        }
    }
    function loadrows($params =[])
    {
        try{
            $this->statement  = $this->pdo->prepare($this->sql);     
            $this->statement->execute($params);
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e)
        {
            exit($e->getMessage());
            // return false;
        }
    }
    function save($params =[])
    {
        try{
            $this->statement  = $this->pdo->prepare($this->sql);     
            return $this->statement->execute($params);           
        }catch(PDOException $e)
        {
            exit($e->getMessage());
            // return false;
        }
    }
    function disconnect()
    {
        $this->pdo = null;
        $this->statement = null;
        $this->sql = '';
    }
}