<?php

namespace Generic;

Use PDO;

class  MysqlFactory{

        public static function getConnection(){

            return new PDO("mysql:host=localhost;workshop=nwork_api","root","");

    }
}