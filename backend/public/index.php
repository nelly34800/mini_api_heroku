<?php
require_once __DIR__ . '/../core/Router.php';

$router = new Router();
//require_once     récupère 1 seule fois 
//  __DIR__        le dossier du fichier (backend/public)
//  . '/../        Remonte d'un dossier (backend)
// routes/api.php' au final : backend/routes/api.php
require_once __DIR__ . '/../routes/api.php';

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$router->dispatch($httpMethod, $uri);