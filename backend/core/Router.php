<?php

class Router
{
    private array $routes = [];

    public function get(string $uri, array $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function dispatch(string $httpMethod, string $uri): void
    {
        // Vérifie que des routes existent pour cette méthode HTTP
        if (!isset($this->routes[$httpMethod])) {
            http_response_code(405);
            echo json_encode([
                "message" => "Méthode HTTP non autorisée"
            ]);
            return;
        }
        // Parcourt toutes les routes de cette méthode
        foreach ($this->routes[$httpMethod] as $route => $action) {
            // // Transforme {id} en expression régulière(remplace l'id par un nombre) 
            $pattern = str_replace('{id}', '([0-9]+)', $route);
            // Délimiteurs de regex
            $pattern = '#^' . $pattern . '$#';
            // La route correspond-elle ?
            if (preg_match($pattern, $uri, $matches)) {
                // recherche la méthode associé à get et le contrôller associé à la route
                [$controller, $controllerMethod] = $action;
                require_once __DIR__ . '/../controllers/' . $controller . '.php';
                
                // Garde uniquement les paramètres capturés
                $parameters = array_slice($matches, 1);

                // Appelle le contrôleur
                $controller::$controllerMethod(...$parameters);

                return;
            }
        }
        // Aucune route trouvée
        http_response_code(404);

        echo json_encode([
            "message" => "Route not found"
        ]);
    }
}