<?php

class Conect {

  public static function Retornar() {
    return mysqli_connect('localhost', 'root', '', 'empresa');
  }
  public static function Init() {
    date_default_timezone_set('America/Sao_Paulo');
  }

}


Conect::Init();
$con = Conect::Retornar();