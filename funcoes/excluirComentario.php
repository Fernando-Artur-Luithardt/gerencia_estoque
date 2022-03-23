<?php
require 'auth.php';
require 'banco.php';

$idComentario = $_REQUEST['id'];
$codMaterial = $_REQUEST["material"];

$sql = "DELETE FROM `comentario` WHERE id = $idComentario";
$deletaComentario = mysqli_query($conn, $sql);

if (!$deletaComentario) {
    $response = array('mensagem' => "Erro do servidor");
    $responseJson = json_encode($response);
    http_response_code(500);
    echo $responseJson;
    exit;
}else {
    header("Location: http://localhost/i4i/comentarios.php?id=$codMaterial");
}

?>  