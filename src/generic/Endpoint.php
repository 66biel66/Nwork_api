<?php

namespace Generic;
class Endpoint{

    public $controller;
    public $metodo;
    public $requerToken;


    public function __construct($controller,$metodo,$requerToken){
        $this->controller=$controller;
        $this->metodo=$metodo;
        $this->requerToken=$requerToken;
    }

    public function requireToken() {
        return $this->requerToken;
    }
}