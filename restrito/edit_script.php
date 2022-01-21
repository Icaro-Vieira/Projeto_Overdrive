<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/icons/icone-logo.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Alteração de Cadastro</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <?php
      include_once 'conexao.php';
      $id = $_POST['id'];
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $cnh = $_POST['cnh'];
      $endereco = $_POST['endereco'];
      $telefone = $_POST['telefone'];
      $carro = $_POST['carro'];
      $empresa = $_POST['empresa'];


      // COLOCAR USUARIO COMO ADM
      if ($_POST['adm'] == 'true') {
        $sql = "UPDATE `usuarios` set `nome` = '$nome', `cpf` = '$cpf', `cnh` = '$cnh', `endereco` = '$endereco', `telefone` = '$telefone', `carro` = '$carro', `empresa` = '$empresa' WHERE cod_pessoa = $id";

        $senha = $cpf;
        $senha = md5($senha);
        $sql_adm = "INSERT INTO user_adm (nome, login, senha) VALUES ('$nome', '$cpf', '$senha')";
        $exec_sql_adm = mysqli_query($conn, $sql_adm);
        if (mysqli_query($conn, $sql)) {
          mensagem("$nome alterado com sucesso!", 'success');
        } else {
          mensagem("$nome NÃO alterado!", 'danger');
        }
      } else {
        $sql = "UPDATE `usuarios` set `nome` = '$nome', `cpf` = '$cpf', `cnh` = '$cnh', `endereco` = '$endereco', `telefone` = '$telefone', `carro` = '$carro', `empresa` = '$empresa' WHERE cod_pessoa = $id";

        if (mysqli_query($conn, $sql)) {
          mensagem("$nome alterado com sucesso!", 'success');
        } else {
          mensagem("$nome NÃO alterado!", 'danger');
        }
      }
      ?>
      <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
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