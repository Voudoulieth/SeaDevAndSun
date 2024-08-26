<?php
$request = $_SERVER['REQUEST_URI'];
$valid_routes = [
    '/',
    '/login',
    '/logout',
    '/dashboardAdmin',
    '/listeCompte',
    '/user/dashboardClient',
    '/test-route'
];

if (in_array($request, $valid_routes)) {
    require __DIR__ . '/public/index.php';
} else {
    http_response_code(404);
    echo '404 Not Found';
}
