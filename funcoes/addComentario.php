<?php
    require 'auth.php';
    require 'banco.php';

    $comentario = $_REQUEST["comentario"];
    $userId = $_SESSION['id'];
    $codMaterial = isset($_POST['material'])? $_POST['material']: "";
    echo $codMaterial;
    if(empty($comentario) || empty($userId)) {
        $response = array('mensagem' => "campos obrigatórios faltando");
        exit;
    }

    $sql = "INSERT INTO `comentario` (`comentario`,`user_id`,`material`) VALUES ('$comentario','$userId','$codMaterial')";
    $cadastro = mysqli_query($conn, $sql);

    if (!$cadastro) {
        $response = array('mensagem' => "Erro do servidor");
        $responseJson = json_encode($response);
        http_response_code(500);
        echo $responseJson;
        exit;
    }else {
        // header("Location: http://localhost/i4i/comentarios.php");
    }
?>  