<?php
    require 'banco.php';
    $nome = isset($_POST["nome"])? $_POST['nome']: "";
    $senha = isset($_POST["senha"])? $_POST['senha']: "";

    //validação não nulo
    if(empty($nome) || empty($senha)) {
        $response = array('mensagem' => "nome e senha obrigatórios");
        $responseJson = json_encode($response);
        http_response_code(400);
        echo $responseJson;
        exit;
    }

    //validar se o usuário existe
    $sql = "SELECT * FROM `usuario` WHERE nome = '$nome'";
    $usuariosCadastrados = mysqli_query($conn, $sql);

    if ($arrusuario = mysqli_fetch_array($usuariosCadastrados)) {
        //$senha = md5($senha);
        if($senha == $arrusuario['senha']){
            session_start();
            $_SESSION['id'] = $arrusuario;
            header("Location: http://localhost/i4i/materiais.php");

            $response = array('mensagem' => "OK");
            $responseJson = json_encode($response);
            echo $responseJson;
            exit;
        }
    }
    session_destroy();
    header("Location: http://localhost/i4i/index.php");
?>