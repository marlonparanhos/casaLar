<?php
	class Funcionario{
		private $id;
		private $nome_func;
		private $cpf_func;
		private $celular_func;
		private $email_func;
		private $senha_func;


		public function SetValues($id, $nome_func, $cpf_func, $celular_func, $email_func, $senha_func){ 
			$this->id = $id;
			$this->nome_func = $nome_func;
			$this->cpf_func = $cpf_func;
			$this->celular_func = $celular_func;
			$this->email_func = $email_func;
			$this->senha_func = $senha_func;
		}

		public function Create(){
			$sql = "
				INSERT INTO funcionario
						  (
				 			nome_func,
							cpf_func,
							celular_func,
							email_func,
							senha_func
						  )  
				VALUES 
					(
						'$this->nome_func',
						'$this->cpf_func',
						'$this->celular_func',
						'$this->email_func',
						'$this->senha_func'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		public function Read($id){
			$sql = "
				SELECT
					 *
				FROM
					funcionario AS t1
				WHERE
					id = '$id'
			";
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		public function ReadAll(){
			$sql = "
				SELECT
					 *
				FROM
					funcionario AS t1		
			";
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		public function ReadAll_Paginacao($inicio, $registros){
			$sql = "
				SELECT
					 *
				FROM
					funcionario AS t1					
					
				LIMIT $inicio, $registros;
			";
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		public function Update(){
			$sql = "
				UPDATE funcionario SET
				
				nome_func = '$this->nome_func',
				cpf_func = '$this->cpf_func',
				celular_func = '$this->celular_func',
				email_func = '$this->email_func',
				senha_func = '$this->senha_func'

				WHERE id = '$this->id';
			";

			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		public function Delete(){
			$sql = "
				DELETE FROM funcionario
				WHERE id = '$this->id';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		public function ReadByEmail($email){
			$sql = "
				SELECT *
				FROM
					funcionario
				WHERE
					email_func = '$email'
			";
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}

		function __construct(){ 
			$this->id;
			$this->nome_func;
			$this->cpf_func;
			$this->celular_func;
			$this->email_func;
			$this->senha_func;
		}

		function __destruct(){
			$this->id;
			$this->nome_func;
			$this->cpf_func;
			$this->celular_func;
			$this->email_func;
			$this->senha_func;
		}	
	};
?>