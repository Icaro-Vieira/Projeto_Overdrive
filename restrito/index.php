<?php
include "../validar.php";
require_once "conexao.php";
require_once "acesso.php";
$sql_nome = "SELECT nome FROM user_adm WHERE id_usuario = $userid";
$exec_nome = mysqli_query($conn, $sql_nome);
$pegar_nome = mysqli_fetch_assoc($exec_nome);

$id_usuario = $_SESSION['cod_usuario'];
if(Acesso::validaUsuario($id_usuario) == false) {
  header("location: perfil_usuario.php");
}

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

  <title>Empresa</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card mb-3">
          <img src="images/logo2.png" class="card-img-top" alt="..." style="background-color: #58151c;">
          <div class="card-body">
            <h5 class="card-title">Primero Projeto Overdrive</h5>
            <p class="card-text">
              Este é um sistema simplificado de cadastro de usuários utilizando HTML5 | PHP | MySQL
            </p>
            <p class="card-text"><small class="text-muted"><?php echo $pegar_nome['nome'] ?></small></p>
            <a href="cadastro_empresa.php" class="btn btn-primary">Cadastrar Empresa</a>
            <a href="pesquisar_empresa.php" class="btn btn-outline-primary">Pesquisa Empresa</a>
            <a href="cadastro.php" class="btn btn-success">Cadastrar Usuários</a>
            <a href="pesquisa.php" class="btn btn-outline-success">Pesquisa Usuários</a>
            <a href="../logout.php" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </div>
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