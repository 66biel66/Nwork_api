<?php

namespace Generic;

use generic\Token;

class Rotas {

    private $rotas = [ ];

    public function __construct(){
        $this->rotas['/login'] = new Endpoint("Controller/UsuarioController","login",false);

        $this->rotas['/cliente/listar'] = new Endpoint("Controller/ClienteController","listar",true);
        $this->rotas['/cliente/salvar'] = new Endpoint("Controller/ClienteController","salvar",true);
        $this->rotas['/cliente/apagar'] = new Endpoint("Controller/ClienteController","apagar",true);

}

    public function carregar(){
        
        $rotas = $_SERVER ['PATH_INFO'] ?? '/';

        if (!isset($this->rotas[$rotas])){
            echo json_encode (["error"=>"Rota nao encontrada"]);
            return;
        }


        $tk = $this -> rotas [$rotas];

        if ($tk -> requireToken()){
            $auth  = $_SERVER ['HTTP_AUTHORIZATION'] ?? '';

            if (!preg_match('/Bearer\s(\S+)/',$auth,$matches)){
                echo json_encode (["error"=>"Token nao informado"]);
                return;
            }
        
        }

        if(!Token::validar($matches[1])){
            echo json_encode (["error"=>"Token invalido"]);
            return;
        }

        require_once $tk -> controller . "php";
        $class =  $tk -> controller;
        $obj = new $class();

        $dados=json_decode(file_get_contents('php://input'),true)??[];

        $obj -> {$tk -> metodo}($dados);



    }
}