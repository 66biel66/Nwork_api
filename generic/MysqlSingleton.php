<?php

namespace Generic;

class MysqlSingleton{

    private static $instance;

    public static function get(){
    
        if(!self::$instance){

            self::$instance = MysqlFactory::getConnection();
        }
        return self::$instance;
    }

}