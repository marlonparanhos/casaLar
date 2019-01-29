<?php
	require_once "../config.php";
	
	$id = $_POST['id'];
	$nome_func = $_POST['nome_func'];
	$cpf_func = $_POST['cpf_func'];
	$celular_func = $_POST['celular_func'];
	$email_func = $_POST['email_func'];
	$senha_func = $_POST['senha_func'];
	
	$action = $_POST['action'];
	
	$Item = new Funcionario();
	$Item->SetValues($id, $nome_func, $cpf_func, $celular_func, $email_func, password_hash($senha_func, PASSWORD_DEFAULT));
	
	switch($action){
		case 'create':
			$res = $Item->Create();
			if($res === NULL){
				$res = "true";
			}else{
				$res = "false";
			}
			echo $res;
		break;
		
		case 'update':
			$res = $Item->Update();

			if($res === NULL){
				$res= 'true';
			}else{
				$res = 'false';
			}
			echo $res;
		break;

		case 'delete':
			$res = $Item->Delete();
			if($res === NULL){
				$res= 'true';
			}else{
				$res = 'false';
			}
			echo $res;
		break;
	}
?>