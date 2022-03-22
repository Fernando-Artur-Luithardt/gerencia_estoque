<?php
session_start();

if (!isset($_SESSION['id'])) {
    $response = array('mensagem' => "Login Necessário");
    $responseJson = json_encode($response);
    http_response_code(400);
    echo $responseJson;
    exit;
}

?>