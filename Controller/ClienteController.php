<?php


namespace Generic\Controller;


class ClienteController{

    public function listar($dados){
        echo json_encode (["cliente1","cliente2","cliente3"]);
    }

    public function salvar($dados){
        echo json_encode (["status"=>"Cliente salvo com sucesso"]);
    }

    public function apagar($dados){
        echo json_encode (["status"=>"Cliente apagado com sucesso"]);
    }
}
