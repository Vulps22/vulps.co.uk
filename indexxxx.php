<?php
// Get the requested URI
$requestUri = $_SERVER['REQUEST_URI'];
$router = [];

// Include the routes file
include('routes.php');

// First check for an exact match in the routes
if (array_key_exists($requestUri, $routes)) {
    $router = $routes[$requestUri];
    $templateFile = $router['module'];
} else {
    // No exact match: loop through routes to check for wildcard patterns
    foreach ($routes as $routePattern => $routeData) {
        if (strpos($routePattern, '*') !== false) {
            // Remove the '*' to get the pattern prefix
            $patternPrefix = rtrim($routePattern, '*');
            // Check if the request URI starts with this prefix
            if (strpos($requestUri, $patternPrefix) === 0) {
                $router = $routeData;
                $templateFile = $routeData['module'];
                break;
            }
        }
    }
    
    // If no route was matched, fallback to a 404
    if (empty($router)) {
        http_response_code(404);
        $templateFile = 'error/404.php';
    }
}

if (isset($router['image']) && $router['image'] === true) {
    // If the route is an image, serve the image directly

    // Split the request URI to extract the image name (assumes URL like /raw/img/filename.png)
    $parts = explode('/', $requestUri);
    $imageName = end($parts);
    
    // Construct the image file path; adjust the folder as needed
    $imagePath = 'img/' . $imageName;
    
    if (file_exists($imagePath)) {
        header('Content-Type: image/png');
        readfile($imagePath);
        exit();
    } else {
        http_response_code(404);
        $templateFile = 'error/404.php';
    }
}

// Include the header HTML
include('templates/header.php');
// Include the nav bar
include('templates/nav.php');
// Include the requested template
include('templates/' . $templateFile);
// Include the footer HTML
include('templates/footer.php');
?>
