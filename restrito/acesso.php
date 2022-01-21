<?php
  include_once 'conexao.php';

  Class Acesso {
    public static function validaUsuario($id_usuario) {
      
    
      // obter os dados do usuario em questão (id recebido pro parametro)
      $user_infos = "SELECT * FROM usuarios WHERE cod_pessoa = $id_usuario";
      $user_infos = mysqli_query($GLOBALS['conn'], $user_infos);
      $user_infos = mysqli_fetch_assoc($user_infos);

      $user_cpf = $user_infos['cpf'];

      // verificar se este usuario está incluso na tablea de administradores do sistema
      $verifica_usuario = "SELECT * FROM user_adm WHERE login = $user_cpf";
      $verifica_usuario = mysqli_query($GLOBALS['conn'], $verifica_usuario);

      $verifica_usuario = mysqli_num_rows($verifica_usuario);

      if($verifica_usuario > 0) {
        return true;
      } else {
        return false;
      }

    }
  }
  
