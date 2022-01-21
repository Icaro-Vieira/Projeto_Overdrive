<?php
session_start();
if (!isset($_SESSION['cod_usuario'])) {
  echo "<script> history.back() </script>";
}

?>

<?php
  require_once "acesso.php";
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

  <title>Cadastro Empresa</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Cadastro da empresa</h1>
        <form action="cadastro_empresa_script.php" method="POST">
          <div class="mb-3">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" required>
          </div>
          <div class="mb-3">
            <label for="nome_fantasia">Nome Fantasia:</label>
            <input type="text" class="form-control" name="nome_fantasia" required>
          </div>
          <div class="mb-3">
            <label for="cnpj">CNPJ:</label>
            <input type="text" class="form-control" name="cnpj" required>
          </div>
          <div class="mb-3">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" name="endereco" required>
          </div>
          <div class="mb-3">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" name="telefone" required>
          </div>

          <div class="mb-3">
            <input type="submit" class="btn btn-success" name="Cadastrar" value="Cadastrar">
          </div>

          <div class="mb-3">
            <a href="index.php" class="btn btn-info"> Voltar para o Inicio </a>
          </div>
        </form>
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