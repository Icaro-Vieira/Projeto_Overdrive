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
  <?php

  include_once 'conexao.php';

  $id = $_GET['id'] ?? '';
  $sql = "SELECT * FROM usuarios WHERE cod_pessoa = $id";

  $dados = mysqli_query($conn, $sql);
  $linha = mysqli_fetch_assoc($dados);

  ?>


  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Cadastro Usuário</h1>
        <form action="edit_script.php" method="POST">
          <div class="mb-3">
            <label for="nome">Nome completo:</label>
            <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>">
          </div>
          <div class="mb-3">
            <label>CPF:</label>
            <input type="text" class="form-control" name="cpf" required value="<?php echo $linha['cpf']; ?>">
          </div>
          <div class="mb-3">
            <label>CNH:</label>
            <input type="text" class="form-control" name="cnh" required value="<?php echo $linha['cnh']; ?>">
          </div>
          <div class="mb-3">
            <label>Endereço:</label>
            <input type="text" class="form-control" name="endereco" required value="<?php echo $linha['endereco']; ?>">
          </div>
          <div class="mb-3">
            <label>Telefone:</label>
            <input type="text" class="form-control" name="telefone" required value="<?php echo $linha['telefone']; ?>">
          </div>
          <div class="mb-3">
            <label>Carro:</label>
            <input type="text" class="form-control" name="carro" required value="<?php echo $linha['carro']; ?>">
          </div>
          <div class="mb-3">
            <label>Empresa:</label>
            <input type="text" class="form-control" name="empresa" required value="<?php echo $linha['empresa']; ?>">
          </div>
          <div class="mb-3">
            <label>Deseja tornar esse usuário administrador?</label>
            <select class="form-control" name="adm">
              <option value="false" selected>Não</option>
              <option value="true">Sim</option>
            </select>
          </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-success" value="Salvar Alterações">
            <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']; ?>">
          </div>

          <div class="mb-3">
            <a href="pesquisa.php" class="btn btn-info"> Voltar para o Inicio </a>
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