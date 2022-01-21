<?php

include "restrito/conexao.php";

if (isset($_POST['login'])) {
  

  $login = $_POST['login'];
  $senha = md5($_POST['senha']);

  $sql = "SELECT * from usuarios WHERE cpf = '$login' AND senha = '$senha'";

  $result = mysqli_query($conn, $sql);

  if ($result) {

    $num_registros = mysqli_num_rows($result);


    if ($num_registros == 1) {
      $linha = mysqli_fetch_assoc($result);
      if (($login == $linha['cpf']) and ($senha == $linha['senha'])) {
        session_start();
        $_SESSION['cod_usuario'] = $linha["cod_pessoa"];
        header("location: restrito/perfil_usuario.php");
      } else {
        echo "Login Invalido";
      }
    } else {
      echo "Login ou senha não encontrados ou Invalido!";
    }
  } else {
    echo "Nenhum resultado do Banco de Dados";
  }
}
