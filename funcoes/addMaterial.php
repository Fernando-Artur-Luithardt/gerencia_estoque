<?php
    require 'auth.php';
    require 'banco.php';

    $material = $_REQUEST["material"];
    $descricao = $_REQUEST['descricao'];
    $userId = $_SESSION['id'];
    
    if(empty($material) || empty($descricao)) {
        $response = array('mensagem' => "campos obrigatórios faltando");
        exit;
    }

    $sql = "INSERT INTO `materiais` (`ativo`,`descricao`,`material`) VALUES ('1','$descricao','$material')";
    $cadastro = mysqli_query($conn, $sql);

    if (!$cadastro) {
        $response = array('mensagem' => "Erro do servidor");
        $responseJson = json_encode($response);
        http_response_code(500);
        echo $responseJson;
        exit;
    }else {
        header("Location: http://localhost/i4i/materiais.php");
    }
?>