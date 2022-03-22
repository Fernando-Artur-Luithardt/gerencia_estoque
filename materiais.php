<?php
require 'funcoes/auth.php';
require 'funcoes/banco.php';

$sql = "SELECT * FROM `materiais`";
$consultaMateriais = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link href="starter-template.css" rel="stylesheet">
  <title>Controle Materiais</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php include("inc_menu.php"); ?>


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
                <?php
                if (!empty($consultaMateriais)) {
                    while($materiais = mysqli_fetch_array($consultaMateriais)){?>
                       <?php if ($materiais["ativo"] == 1){?>
                            <div class="col">
                            <div class="card shadow-sm">   
                            <img src="<?= $materiais['imagem']?>" class="img-thumbnail" alt="Cinque Terre">
                                <div class="card-body">
                                <h5 class="card-text"><?=$materiais['material']?></h5>
                                <p class="card-text"><?=$materiais['descricao']?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <form action="comentarios.php?id=<?= $materiais['id']?>" method="post">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">comentarios</button>
                                        </form>
                                    </div>
                                    <!-- <small class="text-muted">usuário: <?=$materiais['unidades']?></small> -->
                                </div>
                                </div>
                            </div>
                            </div>
                       <?php}?>        
                    <?php }
                }}?>
            </div>
        </div>
    </div>

</body>
</html>