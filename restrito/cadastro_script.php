<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/icons/icone-logo.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Cadastro Usuário</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <?php
      include_once 'conexao.php';

      $nome = mysqli_real_escape_string($conn, $_POST['nome']);
      $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
      $cnh = mysqli_real_escape_string($conn, $_POST['cnh']);
      $senha = mysqli_real_escape_string($conn, $_POST['senha']);
      $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
      $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
      $carro = mysqli_real_escape_string($conn, $_POST['carro']);
      $empresa = mysqli_real_escape_string($conn, $_POST['empresa']);


      $senha = md5($senha);

      $sql = "INSERT INTO usuarios (nome, cpf, cnh, endereco, telefone, carro, empresa, senha) VALUES ('$nome','$cpf', '$cnh','$endereco','$telefone','$carro', '$empresa', '$senha')";
      if (mysqli_query($conn, $sql)) {
        mensagem("$nome cadastrado com sucesso!", 'success');
      } else {
        mensagem("$nome NÃO cadastrado!", 'danger');
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