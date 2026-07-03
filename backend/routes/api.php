<?php

require_once __DIR__ . '/../controllers/HelloController.php';

$router->get('/api/hello', [
    HelloController::class,'index'
]);