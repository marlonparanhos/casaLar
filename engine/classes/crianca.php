<?php
	class Crianca{
		private $id;
		private $nome;
		private $nascimento;
		private $sexo;
		private $cpf;
		private $rg;
		private $pai;
		private $mae;
		private $responsavel;
		private $endereco;
		private $bairro;
		private $cidade;
		private $estado;
		private $celular;

		public function SetValues($id, $nome, $nascimento, $sexo, $cpf, $rg, $pai, $mae, $responsavel, $endereco, $bairro, $cidade, $estado, $celular){ 
			$this->id = $id;
			$this->nome = $nome;
			$this->nascimento = $nascimento;
			$this->sexo = $sexo;
			$this->cpf = $cpf;
			$this->rg = $rg;
			$this->pai = $pai;
			$this->mae = $mae;
			$this->responsavel = $responsavel;
			$this->endereco = $endereco;
			$this->bairro = $bairro;
			$this->cidade = $cidade;
			$this->estado = $estado;
			$this->celular = $celular;
		}

		public function Create(){
			$sql = "
				INSERT INTO crianca
						  (
				 			nome,
							nascimento,
							sexo,
							cpf,
							rg,
							pai,
							mae,
							responsavel,
							endereco,
							bairro,
							cidade,
							estado,
							celular
						  )  
				VALUES 
					(
						'$this->nome',
						'$this->nascimento',
						'$this->sexo',
						'$this->cpf',
						'$this->rg',
						'$this->pai',
						'$this->mae',
						'$this->responsavel',
						'$this->endereco',
						'$this->bairro',
						'$this->cidade',
						'$this->estado',
						'$this->celular'
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
					crianca AS t1
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
					crianca AS t1		
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
					crianca AS t1					
					
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
				UPDATE crianca SET
				
				nome = '$this->nome',
				nascimento = '$this->nascimento',
				sexo = '$this->sexo',
				cpf = '$this->cpf',
				rg = '$this->rg',
				pai = '$this->pai',
				mae = '$this->mae',
				responsavel = '$this->responsavel',
				endereco = '$this->endereco',
				bairro = '$this->bairro',
				cidade = '$this->cidade',
				estado = '$this->estado',
				celular = '$this->celular'
				  
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
				DELETE FROM crianca
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
			$this->nome;
			$this->nascimento;
			$this->sexo;
			$this->cpf;
			$this->rg;
			$this->pai;
			$this->mae;
			$this->responsavel;
			$this->endereco;
			$this->bairro;
			$this->cidade;
			$this->estado;
			$this->celular;
		}

		function __destruct(){
			$this->id;
			$this->nome;
			$this->nascimento;
			$this->sexo;
			$this->cpf;
			$this->rg;
			$this->pai;
			$this->mae;
			$this->responsavel;
			$this->endereco;
			$this->bairro;
			$this->cidade;
			$this->estado;
			$this->celular;
		}	
	};
?>