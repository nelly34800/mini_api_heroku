<?php

class HelloController
{
    public static function index(): void
    {
        header('Content-Type: application/json');

        echo json_encode([
            "message" => "Bonjour Heroku !"
        ]);
    }
}