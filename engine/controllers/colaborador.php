<?php
	require_once "../config.php";
	
	$id = $_POST['id'];
	$nome_colab= $_POST['nome_colab'];
	$celular_colab= $_POST['celular_colab'];
	$email_colab= $_POST['email_colab'];
	
	$action = $_POST['action'];
	
	$Item = new Colaborador();
	$Item->SetValues($id, $nome_colab, $celular_colab, $email_colab);
	
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