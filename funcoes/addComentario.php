<?php
    require 'auth.php';
    require 'banco.php';

    $comentario = $_REQUEST["comentario"];
    $codMaterial = $_REQUEST['id'];
    $userId = $_SESSION['id'];

    if(empty($comentario) || empty($userId)) {
        $response = array('mensagem' => "campos obrigatórios faltando");
        exit;
    }

    $sql = "INSERT INTO `comentario` (`comentario`,`user_id`,`material`) VALUES ('$comentario','$userId[id]','$codMaterial')";
    $cadastro = mysqli_query($conn, $sql);

    if (!$cadastro) {
        $response = array('mensagem' => "Erro do servidor");
        $responseJson = json_encode($response);
        http_response_code(500);
        echo $responseJson;
        exit;
    }else {
        header("Location: http://localhost/i4i/comentarios.php?id=$codMaterial");
    }
?>  