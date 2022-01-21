<?php

session_start();
include_once 'conexao.php';

?>


<!doctype html>

<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/icons/icone-logo.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Cadastro Empresa</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <?php



      if (isset($_POST['Cadastrar'])) {

        // var_dump($_POST['nome']);
        // var_dump($_POST['nome_fantasia']);
        // var_dump($_POST['cnpj']);
        // var_dump($_POST['endereco']);
        // var_dump($_POST['telefone']);
        // return;

        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $nome_fantasia = mysqli_real_escape_string($conn, $_POST['nome_fantasia']);
        $cnpj = mysqli_real_escape_string($conn, $_POST['cnpj']);
        $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
        $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
        $responsavel = $_SESSION["cod_usuario"];

        $sql_query_to_insert = "INSERT INTO company (nome, nome_fantasia, cnpj, endereco, telefone, responsavel) VALUES ('$nome', '$nome_fantasia', '$cnpj', '$endereco', '$telefone', '$responsavel')";

        $sql_insert = mysqli_query($conn, $sql_query_to_insert);

        /*echo $sql_insert = "INSERT INTO `company` (nome, nome_fantasia, cnpj, endereco, telefone, responsavel) VALUES ('$nome', '$nome_fantasia', '$cnpj', '$endereco', '$telefone', '$responsavel')";*/

        if ($sql_insert) {
          mensagem("Empresa cadastrada com sucesso!", 'success');
        } else {
          mensagem("Empresa NÃO cadastrada!", 'danger');
        }
      }


      if (isset($_POST["editar"])) {
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $nome_fantasia = mysqli_real_escape_string($conn, $_POST['nome_fantasia']);
        $cnpj = mysqli_real_escape_string($conn, $_POST['cnpj']);
        $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
        $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
        $responsavel = $_SESSION["cod_usuario"];

        $sql = "UPDATE company SET nome = '$nome', nome_fantasia = '$nome_fantasia', cnpj = '$cnpj', endereco = '$endereco', telefone = '$telefone' WHERE cod_company = $_POST[id]";

        if (mysqli_query($conn, $sql)) {
          mensagem("Empresa atualizada com sucesso!", 'success');
        } else {
          mensagem("Empresa NÃO cadastrada!", 'danger');
        }
      }
      ?>
      <a href="index.php" class="btn btn-primary">Voltar</a>
    </div>
  </div>







  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>