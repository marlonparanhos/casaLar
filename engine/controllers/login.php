<?php
session_start();

require_once "../config.php";

$email = $_POST['email'];
$senha = $_POST['senha'];
$res;

$User = new Funcionario();
$User = $User->ReadByEmail($email);

if ($User === NULL) {
	$res = 'no_user_found';
	session_destroy();
} else {
	$verificaEmail = strcmp($email,$User['email']);
	if ($verificaEmail === 0) {
		$verificaSenha = password_verify($senha,$User['senha']);
		if ($verificaSenha) {
			$_SESSION['id'] = $User['id'];
			$_SESSION['nome'] = $User['nome'];
			$_SESSION['tipo_func'] = $User['tipo_func'];
			$res = 'true';
		} else {
			$res = 'wrong_password';
			session_destroy();
		}
	} else {
		$res = 'wrong_user_found';
		session_destroy();
	}
}
echo $res;
?>