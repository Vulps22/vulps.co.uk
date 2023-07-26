<?php
// Get the requested URI
$requestUri = $_SERVER['REQUEST_URI'];
$selectedRoute = '';
// Include the routes file
include('routes.php');

// Check if the requested route exists in the defined routes
if (array_key_exists($requestUri, $routes)) {
    $templateFile = $routes[$requestUri]['module'];
    $selectedRoute = $routes[$requestUri];
} else {
    // If the route doesn't exist, serve a 404 page
    http_response_code(404);
    $templateFile = 'error/404.php'; // Create a 404 template in the templates folder
}

// Include the header HTML
include('templates/header.php');
//include the nav bar
include('templates/nav.php');

// Include the requested template
include('templates/' . $templateFile);
// Include the footer HTML
include('templates/footer.php');
?>