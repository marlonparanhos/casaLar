<?php
	class Colaborador{
		private $id;
		private $nome_colab;
		private $celular_colab;
		private $email_colab;

		public function SetValues($id, $nome_colab, $celular_colab, $email_colab){ 
			$this->id = $id;
			$this->nome_colab = $nome_colab;
			$this->celular_colab = $celular_colab;
			$this->email_colab = $email_colab;
		}

		public function Create(){
			$sql = "
				INSERT INTO colaborador
						  (
				 			nome_colab,
							celular_colab,
							email_colab
						  )  
				VALUES 
					(
						'$this->nome_colab',
						'$this->celular_colab',
						'$this->email_colab'
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
					colaborador AS t1
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
					colaborador AS t1		
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
					colaborador AS t1					
					
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
				UPDATE colaborador SET
				
				nome_colab = '$this->nome_colab',
				celular_colab = '$this->celular_colab',
				email_colab = '$this->email_colab'

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
				DELETE FROM colaborador
				WHERE id = '$this->id';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		function __construct(){ 
			$this->id;
			$this->nome_colab;
			$this->celular_colab;
			$this->email_colab;
		}

		function __destruct(){
			$this->id;
			$this->nome_colab;
			$this->celular_colab;
			$this->email_colab;
		}	
	};
?>