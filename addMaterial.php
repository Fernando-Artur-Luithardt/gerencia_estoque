
<?php
require 'funcoes/auth.php';
require 'funcoes/banco.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Material</title>
    <!-- Bootstrap CSS -->
    
    <style>
        #entrada{
            background-color:black;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include("inc_menu.php"); ?>



  <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            
      </div>
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" action="funcoes/addMaterial.php" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="firstname" class="form-label">Nome Material</label>
              <input name="material" type="text" class="form-control" id="firstname" value="" required>
            </div>
            <div class="col-sm-12">
              <label for="nome_proprietario" class="form-label">Descrição: </label>
              <input name="descricao" type="text" class="form-control" id="nome_proprietario" value="" required>
            </div>
            <div class="col-12">
            <label for="nome_proprietario" class="form-label">Foto </label>
            <input type="file" id="avatar" name="foto" accept="image/png, image/jpeg">
            </div>
          <hr class="my-4">
          <button type="submit">salvar</button>
        </form>
        </div>
    </div>
</div>

  </body>
</html>