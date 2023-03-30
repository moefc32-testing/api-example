<?php
$request_type = $_SERVER['REQUEST_METHOD'];
$methods = ['GET', 'POST', 'PUT', 'PATCH'];

parse_str(file_get_contents('php://input'), $input);
$name = isset($input['name']) ? ucwords(strtolower(trim($input['name']))) : null;

if (in_array($request_type, $methods)) {
    echo $name ? 'Hello ' . $name . '!' : 'Hello!';
    echo PHP_EOL . 'You are accessing through ' . $request_type . ' method.';
} else {
    http_response_code(405);
    die('Method not allowed!');
}
