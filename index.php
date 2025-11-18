<?php
require_once "generic/Autoload.php";
require_once __DIR__ . "/vendor/autoload.php";

use Generic\Rotas;

$rotas = new Rotas();
$rotas->carregar();
