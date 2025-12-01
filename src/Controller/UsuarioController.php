<?php


namespace Generic\Controller;

class UsuarioController{

    public function login($dados){
        echo json_encode (["token"=>"abc123xyz"]);
    }
}