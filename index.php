<?php
require __DIR__ . '/vendor/autoload.php';

use App\Generic\Rotas;

$rotas = new Rotas();
$rotas->handle($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);