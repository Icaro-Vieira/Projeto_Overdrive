<?php include "../validar.php" ?>

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

  <title>Pesquisar Empresa</title>
</head>

<body>
  <?php

  $pesquisa = $_POST['busca'] ?? ''; 

  include_once 'conexao.php';

  $sql = "SELECT * FROM company WHERE nome LIKE '%$pesquisa%'";

  $dados = mysqli_query($conn, $sql);

  ?>



  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Pesquisar</h1>

        <!-- -=-=-=-=-=-=-=-=-=- NAVBAR -=-=-=-=-=-=-=-=-=--->
        <nav class="navbar navbar-light bg-light">
          <div class="container-fluid">
            <form class="d-flex" action="pesquisar_empresa.php" method="POST">
              <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
              <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
          </div>
        </nav>

        <!-- -=-=-=-=-=-=-=-=-=- TABELA -=-=-=-=-=-=-=-=-=- -->
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Nome Fantasia</th>
              <th scope="col">CNPJ</th>
              <th scope="col">Endereço</th>
              <th scope="col">Telefone</th>
              <th scope="col">Responsavel</th>
              <th scope="col">Funções</th>
            </tr>
          </thead>
          <!-- -=-=-=-=-=-=-=-=-=- PUXANDO OS DADOS DO BANCO -=-=-=-=-=-=-=-=-=- -->
          <tbody>

            <?php

            while ($linha = mysqli_fetch_assoc($dados)) {
              $cod_company = $linha['cod_company'];
              $nome = $linha['nome'];
              $nome_fantasia = $linha['nome_fantasia'];
              $cnpj = $linha['cnpj'];
              $endereco = $linha['endereco'];
              $telefone = $linha['telefone'];
              $sql_responsavel = "SELECT nome FROM user_adm WHERE id_usuario = $linha[responsavel]";
              $exec = mysqli_query($conn, $sql_responsavel);
              $responsavel = mysqli_fetch_assoc($exec);
            ?>
              <tr>
                <th scope='row'><?php echo $nome ?></th>
                <td><?php echo $nome_fantasia ?></td>
                <td><?php echo $cnpj ?></td>
                <td><?php echo $endereco ?></td>
                <td><?php echo $telefone ?></td>
                <td><?php echo $responsavel['nome'] ?></td>
                <td width=150px>
                  <a href='cadastro_empresa_edit.php?id=<?php echo $cod_company ?>' class='btn btn-success btn-sm'>Editar</a>
                  <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' onclick="<?php echo "pegar_dados('$nome', '$cod_company')" ?>">Excluir</a>
                </td>
              </tr>
              <!-- -=-=-=-=-=-=-=-=-=- BOTÃO CONFIRMAÇÃO -=-=-=-=-=-=-=-=-=- -->
              <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                    </div>
                    <div class="modal-body">
                      <form action="excluir_empresa_script.php" method="POST">
                        <p>Tem certeza que quer Excluir essa Empresa? <b id="nome">Nome da Empresa</b>?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                      <input type="hidden" name="nome" id="nome_empre_1" value="<?= $nome_fantasia ?>" />
                      <input type="hidden" name="id" id="cod_company" value="<?php echo $cod_company ?>" />
                      <input type="submit" class="btn btn-danger" value="Sim">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </tbody>
        </table>

        <!-- -=-=-=-=-=-=-=-=-=- BOTÃO -=-=-=-=-=-=-=-=-=- -->
        <div class="mb-3">
          <a href="index.php" class="btn btn-outline-info"> Voltar para o Inicio</a>
        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    function pegar_dados(nome, cod_company) {

  
      document.getElementById('nome').value = nome;
      document.getElementById('cod_company').value = cod_company;
      
    }
  </script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>