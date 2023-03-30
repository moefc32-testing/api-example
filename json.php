<?php
header('Content-Type: application/json');
$request_type = $_SERVER['REQUEST_METHOD'];
$methods = ['GET', 'POST', 'PUT', 'PATCH'];

$input = json_decode(file_get_contents('php://input'), true);
$name = isset($input['name']) ? ucwords(strtolower(trim($input['name']))) : null;

if (in_array($request_type, $methods)) {
    if ($name) $return['name'] = $name;
    $return['message'] = 'You are accessing through ' . $request_type . ' method.';
    $return['code'] = 200;
    
    $return = json_encode($return);
    exit($return);
} else {
    http_response_code(405);
    $return['error'] = 'Method not allowed!';
    $return['code'] = 405;

    $return = json_encode($return);
    die($return);
}
