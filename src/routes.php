<?php
// Default Routes
$app->get('/', function ($request, $response, $args) {
    // Sample log message
    // $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

// Login
require_once '../controller/login.php';

// Bibliography
require_once '../controller/bibliography.php';