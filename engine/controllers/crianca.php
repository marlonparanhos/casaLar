<?php
	require_once "../config.php";

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$nascimento = $_POST['nascimento'];
	$sexo = $_POST['sexo'];
	$cpf = $_POST['cpf'];
	$rg = $_POST['rg'];
	$pai = $_POST['pai'];
	$mae = $_POST['mae'];
	$responsavel = $_POST['responsavel'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$celular = $_POST['celular'];
	
	$action = $_POST['action'];
	
	$Item = new Crianca();
	$Item->SetValues($id, $nome, $nascimento, $sexo, $cpf, $rg, $pai, $mae, $responsavel, $endereco, $bairro, $cidade, $estado, $celular);
	
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