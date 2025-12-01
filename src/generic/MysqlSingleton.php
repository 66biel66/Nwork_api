<?php
// ...existing code...
namespace generic\MysqlSingleton;

class MysqlSingleton
{
    private static ?MysqlSingleton $instance = null;

    private function __construct()
    {
        // conexão ou configuração
    }
    public static function getInstance(): MysqlSingleton
    {
        if (self::$instance === null) {
            self::$instance = new MysqlSingleton();
        }
        return self::$instance;
    }

    // ... métodos auxiliares ...
}