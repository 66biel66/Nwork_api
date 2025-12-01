<?php 

namespace Generic;
class Retorno{

    public function sucesso ($dados){
        return ["status"=>true,"dados"=>$dados];}

    public static function erro ($mensagem,$status =400){
        http_response_code($status);
        return ["status"=>false,"mensagem"=>$mensagem];}

}