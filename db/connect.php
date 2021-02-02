<?php
class Connection{
    public static function Connect(){
        define('server', 'localhost');
        define('db_name','fullecomm');
        define('user', 'root');
        define('password','');

        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $connection = new PDO("mysql:host=".server."; dbname=".db_name,user,password, $options);
            return $connection;
        }catch(PDOException $e){
            die("Connetion Error:".$e->getMessage());
        }
    }

}