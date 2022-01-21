<?php
session_start();
if (isset($_SESSION['cod_usuario'])) {
	$userid = $_SESSION['cod_usuario'];
} else {
	session_destroy();
	header("location: ../index.php?msg=faça o login");
}
