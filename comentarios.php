<?php
require 'funcoes/auth.php';
require 'funcoes/banco.php';

$material = $_REQUEST["id"];

$sql = "SELECT * FROM `comentario` WHERE material = $material ORDER BY data DESC";
$consultaComentarios = mysqli_query($conn, $sql);

$sql = "SELECT * FROM `materiais` WHERE id = $material";
$consultaMateriais = mysqli_query($conn, $sql);

?>  
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="styles/condStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styleTd.css">
</head>
<body>
    
    <?php include("inc_menu.php"); ?>
    <?php
       while($materiais = mysqli_fetch_array($consultaMateriais)){
            if($materiais['ativo'] == 0){
                ?><h1>MATERIAL INATIVO NA BASE DE DADOS</h1><?php
                exit;
            }?>
            <div>
                <h1><?=$materiais['material']?></h1>
                <img src="<?= $materiais['imagem']?>" alt="Italian Trulli">
            </div>
            <h2>DESCRIÇÃO: </h2>
            <div> 
                <p><?=$materiais['descricao']?></p>
                <p>data: <?=$materiais['data']?></p>
            </div>
            <h2>ADICIONE SEU COMENTÁRIO:</h2>
            <form action="funcoes/addComentario.php?id=<?= $materiais['id']?>" method="post">
                <input type="text" name="comentario">
                <button type="submit" class="btn btn-sm btn-outline-secondary">comentarios</button>
             </form>   
    <?php } ?>
    
    
    <h2>COMENTÁRIOS:</h2>
    
    <table>
  <tr>
    <th>usuario</th>
    <th>comentario</th>
    <th>data</th>
    <th>editar</th>
  </tr>
        <?php if (!empty($consultaComentarios)) {
            while($comentarios = mysqli_fetch_array($consultaComentarios)){?>
                <tr>
                    <td><?=$comentarios['user_id']?></td>
                    <td><?=$comentarios['comentario']?></td>
                    <td><?=$comentarios['data']?></td>
                    <td><a href="funcoes/excluirComentario.php?id=<?=$comentarios['id']?>&material=<?=$comentarios['material']?>">excluir</a></td>
                </tr> 
            <?php }
        }?>
</body>
</html>