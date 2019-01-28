<?php
require_once "../engine/config.php";

//Dados gerais
$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
$cidade = $_POST['cidade'];
$endereco_residencial = $_POST['endereco_residencial'];
$estado = $_POST['select_estado'];
$campus = $_POST['select_campus'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$tel_fixo = $_POST['tel_fixo'];
$celular = $_POST['celular'];
$senha = $_POST['senha'];
$select_deficiencia = $_POST['select_deficiencia'];
$ingressou_vaga_deficiente = $_POST['select_vaga_deficiencia'];
$tipo_usuario = $_POST['select_tipo_usuario'];

switch ($_POST['select_tipo_deficiencia']) {
	//Dados deficiente auditivo
	case '0':
	$select_tipo_deficiencia = $_POST['select_tipo_deficiencia'];
	$comunica_atraves = $_POST['comunica_atraves'];
	$select_grau_surdez_dir = $_POST['select_grau_surdez_dir'];
	$select_grau_surdez_esq = $_POST['select_grau_surdez_esq'];
	$usa_aparelho_dir = $_POST['usa_aparelho_dir'];
	$usa_aparelho_esq = $_POST['usa_aparelho_esq'];
	$implante_coclear_dir = $_POST['implante_coclear_dir'];
	$implante_coclear_esq = $_POST['implante_coclear_esq'];
	break;
	//Dados deficiente físico
	case '1':
	$tipo_defiencia_fisica = $_POST['tipo_defiencia_fisica'];
	$outro_tipo_def_fisica = $_POST['outro_tipo_def_fisica'];
	break;
	//Dados deficiente visual
	case '2':
	$tipo_defiencia_visual = $_POST['tipo_defiencia_visual'];
	break;
	case '3':
		//Dados deficiente mental
	$deficiencia_mental = $_POST['deficiencia_mental'];
	break;
	//Dados deficiência múltipla
	case '4':
	$deficiencia_multipla = $_POST['deficiencia_multipla'];
	break;
	//Dados tea
	case '5':
	$deficiencia_tea = $_POST['deficiencia_tea'];
	break;
	//Dados outros tipos necessidade educacional especial
	case '6':
	$outro_tipo_necessidade = $_POST['outro_tipo_necessidade'];
	$necessidade_especial_especifica = $_POST['necessidade_especial_especifica'];
	break;
}

//convertendo data de nascimento para padrão Y-m-d
$dataFormatada = str_replace("/", "-", $_POST['nascimento']);
$dataFormatada = date('Y-m-d', strtotime($dataFormatada));

$aux_campus;
$aux_sexo;
$aux_tipo_usuario;

if($sexo == '0'){$aux_sexo = "Masculino";}elseif($sexo == '1'){$aux_sexo = "Feminino";}else{$aux_sexo = "Outro...";}

if($campus == '0'){$aux_campus = "Campus I";}elseif ($campus == '1'){$aux_campus = "Campus JK";}elseif ($campus == '2'){$aux_campus = "Teófilo Otoni";}elseif ($campus == '3'){
	$aux_campus = "Curvelo";}elseif($campus == '4'){$aux_campus = "Couto de Magalhães";}elseif ($campus == '5'){$aux_campus = "Janaúba";}elseif ($campus == '6'){$aux_campus = "Unaí";}else{$aux_campus = "Polo EAD";}

	if($tipo_usuario == '0'){$aux_tipo_usuario = "Estudante";}elseif($tipo_usuario == '1'){$aux_tipo_usuario = "Funcionário Terceirizado";}else{$aux_tipo_usuario = "Servidor";}

//Dados graduação
	$curso_grad = $_POST['curso_grad'];
	$matricula_grad = $_POST['matricula_grad'];
	$periodo_grad = $_POST['periodo_grad'];
	$select_turno_grad = $_POST['select_turno_grad'];
	$select_bolsista_grad = $_POST['select_bolsista_grad'];

	$modalidade = $_POST['modalidade'];

//Dados pós-graduação
	$matricula_pos = $_POST['matricula_pos'];
	$curso_pos = $_POST['curso_pos'];

//Dados ead
	$matricula_ead = $_POST['matricula_ead'];
	$periodo_ead = $_POST['periodo_ead'];
	$curso_ead = $_POST['curso_ead'];
	$select_polo_ead = $_POST['select_polo_ead'];

//Dados terceirizado
	$empresa_terc = $_POST['empresa_terc'];
	$funcao_terc = $_POST['funcao_terc'];

//Dados servidor
	$cargo_serv = $_POST['cargo_serv'];
	$departamento_serv = $_POST['departamento_serv'];
	$siape_serv = $_POST['siape_serv'];

	$aux_turno;
	$aux_bolsista;

//Condições do tipo_usuario = Estudante
	if($select_turno_grad === '0') {
		$aux_turno = "Matutino";
	}else{
		$aux_turno = "Noturno";
	}

	if($select_bolsista_grad === '0') {
		$aux_bolsista = "Sim";
	}else{
		$aux_bolsista = "Não";
	}
	?>

	<!doctype html>
	<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123433057-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-123433057-1');
		</script>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" type = "image/x-icon" href = "../img/favicon.ico "/>
		<title>PROACE/DASA :: Cadastro</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/materialize.css">
		<link rel="stylesheet" href="../css/mbox-0.0.1.css">
		<link href="../css/somesystem.css" rel="stylesheet">

		<style type="text/css">
		.negrito {
			font-weight: 700;
		}
	</style>

</head>
<body>
	<div class="container row">
		<h2 class="center title_responsivo">Confirmação de Dados</h2>
		<a class="waves-effect waves-light btn" id="Retornar"> <i class="fa fa-arrow-left"></i> Voltar</a>

		<br><br>
		<div class="input-field col m6 s12">
			<input class="negrito" type="text" id="nome" disabled required value="<?php echo $nome; ?>">
			<label >Nome *</label>
		</div>


		<div class="input-field col m3 s12">
			<input class="negrito" type="text" id="nascimento" disabled required value="<?php echo $nascimento; ?>">
			<label >Nascimento *</label>
		</div>

		<div class="input-field col m3 s12">
			<input class="negrito" type="text" id="sexo" disabled required value="<?php echo $aux_sexo; ?>">
			<label>Gênero *</label>
		</div>
		<br>
		<div class="input-field col m6 s12">
			<input class="negrito" type="text" disabled id="cidade" required value="<?php echo $cidade; ?>">
			<label >Cidade *</label>
		</div>

		<div class="input-field col m6 s12">
			<input type="text" id="endereco_residencial" disabled name="endereco_residencial" required value="<?php echo $endereco_residencial; ?>">
			<label >Endereço residencial *</label>
		</div>

		<br>
		<div class="input-field col m4 s12">
			<select class="negrito" name="select_estado" disabled id="estado">
				<option value="" disabled>Selecione...</option>
				<option value="AC" <?php if($estado == 'AC'){ echo "selected"; } ?>>Acre</option>
				<option value="AL" <?php if($estado == 'AL'){ echo "selected"; } ?>>Alagoas</option>
				<option value="AP" <?php if($estado == 'AP'){ echo "selected"; } ?>>Amapá</option>
				<option value="AM" <?php if($estado == 'AM'){ echo "selected"; } ?>>Amazonas</option>
				<option value="BA" <?php if($estado == 'BA'){ echo "selected"; } ?>>Bahia</option>
				<option value="CE" <?php if($estado == 'CE'){ echo "selected"; } ?>>Ceará</option>
				<option value="DF" <?php if($estado == 'DF'){ echo "selected"; } ?>>Distrito Federal</option>
				<option value="ES" <?php if($estado == 'ES'){ echo "selected"; } ?>>Espirito Santo</option>
				<option value="GO" <?php if($estado == 'GO'){ echo "selected"; } ?>>Goiás</option>
				<option value="MA" <?php if($estado == 'MA'){ echo "selected"; } ?>>Maranhão</option>
				<option value="MS" <?php if($estado == 'MS'){ echo "selected"; } ?>>Mato Grosso do Sul</option>
				<option value="MT" <?php if($estado == 'MT'){ echo "selected"; } ?>>Mato Grosso</option>
				<option value="MG" <?php if($estado == 'MG'){ echo "selected"; } ?>>Minas Gerais</option>
				<option value="PA" <?php if($estado == 'PA'){ echo "selected"; } ?>>Pará</option>
				<option value="PB" <?php if($estado == 'PB'){ echo "selected"; } ?>>Paraíba</option>
				<option value="PR" <?php if($estado == 'PR'){ echo "selected"; } ?>>Paraná</option>
				<option value="PE" <?php if($estado == 'PE'){ echo "selected"; } ?>>Pernambuco</option>
				<option value="PI" <?php if($estado == 'PI'){ echo "selected"; } ?>>Piauí</option>
				<option value="RJ" <?php if($estado == 'RJ'){ echo "selected"; } ?>>Rio de Janeiro</option>
				<option value="RN" <?php if($estado == 'RN'){ echo "selected"; } ?>>Rio Grande do Norte</option>
				<option value="RS" <?php if($estado == 'RS'){ echo "selected"; } ?>>Rio Grande do Sul</option>
				<option value="RO" <?php if($estado == 'RO'){ echo "selected"; } ?>>Rondônia</option>
				<option value="RR" <?php if($estado == 'RR'){ echo "selected"; } ?>>Roraima</option>
				<option value="SC" <?php if($estado == 'SC'){ echo "selected"; } ?>>Santa Catarina</option>
				<option value="SP" <?php if($estado == 'SP'){ echo "selected"; } ?>>São Paulo</option>
				<option value="SE" <?php if($estado == 'SE'){ echo "selected"; } ?>>Sergipe</option>
				<option value="TO" <?php if($estado == 'TO'){ echo "selected"; } ?>>Tocantins</option>
			</select>
			<label>Estado *</label>
		</div>
		<br>
		<div class="input-field col m4 s12">
			<input class="negrito" type="text" id="campus" disabled required value="<?php echo $aux_campus; ?>">
			<label>Campus *</label>
		</div>
		<br>
		<div class="input-field col m4 s12">
			<input class="negrito" type="text" id="cpf" required disabled value="<?php echo $cpf; ?>">
			<label >CPF *</label>
		</div>
		<br>
		<div class="input-field col m12 s12">
			<input class="negrito" type="email" id="email" disabled required value="<?php echo $email; ?>">
			<label >e-mail *</label>
		</div>
		<br>
		<div class="input-field col m6 s12">
			<input class="negrito" type="text" id="tel_fixo" disabled value="<?php echo $tel_fixo; ?>">
			<label >Tel. Fixo </label>
		</div>
		<br>
		<div class="input-field col m6 s12">
			<input class="negrito" type="text" id="celular" disabled required value="<?php echo $celular; ?>">
			<label >Celular *</label>
		</div>
		<br>
		<div class="input-field col m6 s12">
			<input class="negrito" type="password" readonly id="senha" disabled required value="<?php echo $senha; ?>">
			<label >Senha *</label>
		</div>
		<br>
		<div class="input-field col m6 s12">
			<input class="negrito" type="text" id="tipo_usuario" disabled required value="<?php echo $aux_tipo_usuario; ?>">
			<label>Tipo de Usuário *</label>
		</div>

		<!-- ###### Separação das telas de confirmação ###### -->

		<?php
//CONFIRMAÇÃO GRADUAÇÃO
		if ($tipo_usuario == '0' && $modalidade == '0') {
			?>

			<br>
			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="matricula_grad" disabled required value="<?php echo $matricula_grad; ?>">
				<label >Matrícula *</label>
			</div>

			<br>
			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="curso_grad" disabled required value="<?php echo $curso_grad; ?>">
				<label >Curso *</label>
			</div>

			<br>
			<div class="input-field col m4 s12">
				<input class="negrito" type="text" id="select_turno_grad" disabled required value="<?php echo $aux_turno; ?>">
				<label >Turno *</label>
			</div>

			<br>
			<div class="input-field col m3 s12">
				<input class="negrito" type="text" id="periodo_grad" disabled required value="<?php echo $periodo_grad; ?>">
				<label >Período *</label>
			</div>

			<br>
			<div class="input-field col m5 s12">
				<input class="negrito" type="text" id="select_bolsista_grad" disabled required value="<?php echo $aux_bolsista; ?>">
				<label >Recebe assistência estudantil da Proace? *</label>
			</div>

			<br>
			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="select_deficiencia" disabled required value="<?php if($select_deficiencia == 0) echo 'Não'; else echo 'Sim'; ?>">
				<label>Você tem deficiência ou alguma necessidade educacional especial? *</label>
			</div>

			<?php if ($select_deficiencia == 1) { ?>
				<br>
				<div class="input-field col m6 s12">
					<input class="negrito" type="text" id="select_vaga_deficiencia" disabled required value="<?php if($ingressou_vaga_deficiente == 0) echo 'Não'; else echo 'Sim'; ?>">
					<label>Você ingressou por vaga para pessoa com deficiência (PcD)? * </label>
				</div>
			<?php } ?>
			<br><br>
			<?php

//CONFIRMAÇÃO PÓS-GRADUAÇÃO
		}elseif ($tipo_usuario == '0' && $modalidade == '1') {
			?>
			<br>
			<div class="input-field col m4 s12">
				<input class="negrito" type="text" id="matricula_pos" disabled required value="<?php echo $matricula_pos; ?>">
				<label>Matrícula *</label>
			</div>

			<div class="input-field col m8 s12">
				<input class="negrito" type="text" id="curso_pos" disabled required value="<?php echo $curso_pos; ?>">
				<label>Curso *</label>
			</div>
			<?php

//CONFIRMAÇÃO EAD
		} elseif ($tipo_usuario == '0' && $modalidade == '2') {
			?>
			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="matricula_ead" disabled required value="<?php echo $matricula_ead; ?>">
				<label>Matrícula *</label>
			</div>

			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="periodo_ead" disabled value="<?php echo $periodo_ead; ?>">
				<label>Período </label>
			</div>
			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="curso_ead" disabled value="<?php echo $curso_ead; ?>">
				<label>Curso *</label>
			</div>
			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="select_polo_ead" disabled value="<?php echo $select_polo_ead; ?>">
				<label>Polo *</label>
			</div>
			<?php

//CONFIRMAÇÃO TERCEIRIZADO
		}elseif ($tipo_usuario == '1') {
			?>
			<br>
			<div class="input-field col m4 s12">
				<input class="negrito" type="text" id="empresa_terc" disabled required value="<?php echo $empresa_terc; ?>">
				<label>Empresa *</label>
			</div>

			<div class="input-field col m8 s12">
				<input class="negrito" type="text" id="funcao_terc" disabled required value="<?php echo $funcao_terc; ?>">
				<label>Função *</label>
			</div>
			<?php

//CONFIRMAÇÃO SERVIDOR
		} elseif ($tipo_usuario == '2' || $tipo_usuario == '3') {
			?>
			<br>
			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="cargo_serv" disabled required value="<?php echo $cargo_serv; ?>">
				<label>Cargo *</label>
			</div>

			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="departamento_serv" disabled value="<?php echo $departamento_serv; ?>">
				<label>Departamento / Setor *</label>
			</div>

			<div class="col m3"></div>
			<div class="input-field col m6 s12">
				<input class="negrito" type="text" id="siape_serv" disabled value="<?php echo $siape_serv; ?>">
				<label>SIAPE *</label>
			</div>
			<?php
		}
		?>

		<br>

		<div class="col m12 s12">
			<?php
		// Dados def. auditiva #########################
			if ($select_deficiencia == '1' && $select_tipo_deficiencia == '0') {
				$comunica_atraves = ($comunica_atraves == 0) ? "Língua Brasileira de Sinais" : "Língua Brasileira";

				switch ($select_grau_surdez_dir) {
					case '0': $aux_select_grau_surdez_dir = "Leve - entre 26 e 40 dB"; break;
					case '1': $aux_select_grau_surdez_dir = "Média - entre 41 e 65 dB"; break;
					case '2': $aux_select_grau_surdez_dir = "Severa - entre 66 e 95 dB"; break;
					case '3': $aux_select_grau_surdez_dir = "Profunda - maior ou igual a 96 dB"; break;
				}

				switch ($select_grau_surdez_esq) {
					case '0': $aux_select_grau_surdez_esq = "Leve - entre 26 e 40 dB"; break;
					case '1': $aux_select_grau_surdez_esq = "Média - entre 41 e 65 dB"; break;
					case '2': $aux_select_grau_surdez_esq = "Severa - entre 66 e 95 dB"; break;
					case '3': $aux_select_grau_surdez_esq = "Profunda - maior ou igual a 96 dB"; break;
				}

				$aux_usa_aparelho_dir = ($usa_aparelho_dir == 0) ? "Sim" : "Não";
				$aux_usa_aparelho_esq = ($usa_aparelho_esq == 0) ? "Sim" : "Não";

				$aux_implante_coclear_dir = ($implante_coclear_dir == 0) ? "Sim" : "Não";
				$aux_implante_coclear_esq = ($implante_coclear_esq == 0) ? "Sim" : "Não";
				?>
				<h2 class="center title_responsivo">Informações sobre a Deficiência</h2>
				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="Deficiência Auditiva">
					<label>Deficiência:</label>
				</div>
				<div class="input-field col m8 s12">
					<input class="negrito" type="text" disabled required value="<?php echo $comunica_atraves; ?>">
					<label>Se comunica através da:</label>
				</div>
				<br>
				<div class="input-field col m6 s12">
					<input class="negrito" type="text" disabled value="<?php echo $aux_select_grau_surdez_dir; ?>">
					<label >Grau de surdez no ouvido direito:</label>
				</div>
				<br>
				<div class="input-field col m6 s12">
					<input class="negrito" type="text" disabled required value="<?php echo $aux_select_grau_surdez_esq; ?>">
					<label >Grau de surdez no ouvido esquerdo:</label>
				</div>
				<br>
				<div class="input-field col m6 s12">
					<input class="negrito" type="text" readonly disabled required value="<?php echo $aux_usa_aparelho_dir; ?>">
					<label >Usa aparelho no ouvido direito:</label>
				</div>
				<br>
				<div class="input-field col m6 s12">
					<input class="negrito" type="text" disabled required value="<?php echo $aux_usa_aparelho_esq; ?>">
					<label>Usa aparelho no ouvido esquerdo:</label>
				</div>
				<br>
				<div class="input-field col m6 s12">
					<input class="negrito" type="text" disabled required value="<?php echo $aux_implante_coclear_dir; ?>">
					<label>Usa implante Coclear no ouvido direito:</label>
				</div>
				<br>
				<div class="input-field col m6 s12">
					<input class="negrito" type="text" disabled required value="<?php echo $aux_implante_coclear_esq; ?>">
					<label>Usa implante Coclear no ouvido esquerdo:</label>
				</div>
				<?php
			}
		// Dados def. física #########################
			elseif ($select_deficiencia == '1' && $select_tipo_deficiencia == '1') {
				switch ($tipo_defiencia_fisica) {
					case '0': $aux_def_fisica = 'Amputação ou ausência de membro'; break;
					case '1': $aux_def_fisica = 'Hemiparesia'; break;
					case '2': $aux_def_fisica = 'Hemiplegia'; break;
					case '3': $aux_def_fisica = 'Membros com deformidade congênita ou adquirida'; break;
					case '4': $aux_def_fisica = 'Mobilidade reduzida'; break;
					case '5': $aux_def_fisica = 'Monoparesia'; break;
					case '6': $aux_def_fisica = 'Monoplegia'; break;
					case '7': $aux_def_fisica = 'Nanismo'; break;
					case '8': $aux_def_fisica = 'Ostomia'; break;
					case '9': $aux_def_fisica = 'Paralisia cerebral'; break;
					case '10': $aux_def_fisica = 'Paraparesia'; break;
					case '11': $aux_def_fisica = 'Paraplegia'; break;
					case '12': $aux_def_fisica = 'Tetraparesia'; break;
					case '13': $aux_def_fisica = 'Tetraplegia'; break;
					case '14': $aux_def_fisica = 'Triparesia'; break;
					case '15': $aux_def_fisica = 'Triplegia'; break;
					case '16': $aux_def_fisica = 'Outro...'; break;
				}
				?>
				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="Deficiência Física">
					<label >Deficiência:</label>
				</div>

				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="<?php echo $aux_def_fisica; ?>">
					<label>Tipo:</label>
				</div>
				<?php

				if ($tipo_defiencia_fisica == 16) {
					?>
					<div class="input-field col m4 s12">
						<input class="negrito" type="text" required disabled value="<?php echo $outro_tipo_def_fisica; ?>">
						<label>Tipo:</label>
					</div>
					<?php
				}
			}
		// Dados def. visual #########################
			elseif ($select_deficiencia == '1' && $select_tipo_deficiencia == '2') {
				switch ($tipo_defiencia_fisica) {
					case '0': $aux_def_visual = 'Cegueira (acuidade visual é igual ou menor que 0,05 no melhor olho, com a melhor correção óptica)'; break;
					case '1': $aux_def_visual = 'Baixa visão (acuidade visual entre 0,3 e 0,05 no melhor olho, com a melhor correção óptica)'; break;
					case '2': $aux_def_visual = 'Visão monocular (conforme Súmula 377/2009 do Supremo Tribunal de Justiça)'; break;
				}
				?>
				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="Deficiência Visual">
					<label >Deficiência:</label>
				</div>

				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="<?php echo $aux_def_visual; ?>">
					<label>Tipo:</label>
				</div>
				<?php
			}
		// Dados def. mental #########################
			elseif ($select_deficiencia == '1' && $select_tipo_deficiencia == '3') {
				?>
				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="Deficiência Mental">
					<label >Deficiência:</label>
				</div>

				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="<?php echo $deficiencia_mental; ?>">
					<label>Tipo:</label>
				</div>
				<?php
			}
		// Dados def. múltipla #########################
			elseif ($select_deficiencia == '1' && $select_tipo_deficiencia == '4') {
				?>
				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="Deficiência Múltipla">
					<label >Deficiência:</label>
				</div>

				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="<?php echo $deficiencia_multipla; ?>">
					<label>Tipo:</label>
				</div>
				<?php
			}
		// Dados transtorno de espectro autista #########################
			elseif ($select_deficiencia == '1' && $select_tipo_deficiencia == '5') {
				?>
				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="Transtorno de Espectro Autista">
					<label >Deficiência:</label>
				</div>

				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="<?php echo $deficiencia_tea; ?>">
					<label>Tipo:</label>
				</div>
				<?php
			}
		// Dados outro tipo deficiência #########################
			elseif ($select_deficiencia == '1' && $select_tipo_deficiencia == '6') {
				switch ($tipo_defiencia_fisica) {
					case '0': $aux_otd = 'Dislexia'; break;
					case '1': $aux_otd = 'Transtorno de déficit de atenção e hiperatividade (TDAH)'; break;
					case '2': $aux_otd = 'Disgrafia'; break;
					case '3': $aux_otd = 'Discalculia'; break;
					case '4': $aux_otd = 'Dislalia'; break;
					case '5': $aux_otd = 'Gagueira'; break;
					case '6': $aux_otd = 'Outro...'; break;
				}
				?>
				<div class="input-field col m4 s12">
					<input class="negrito" type="text" required disabled value="<?php echo $aux_otd; ?>">
					<label >Deficiência:</label>
				</div>

				<?php
				if ($necessidade_especial_especifica == '6') { ?>
					<div class="input-field col m4 s12">
						<input class="negrito" type="text" required disabled value="<?php echo $necessidade_especial_especifica; ?>">
						<label>Tipo:</label>
					</div>
					<?php	
				}
				?>
				<?php
			}
			?>
		</div>

		<br>

		<div class="input-field col m12 s12">
			<p class="center"><a class="waves-effect waves-light btn green darken-3" id="Salvar"><i class="fa fa-floppy-o"></i> Cadastrar</a></p>
		</div>

		<input type="hidden" id="data_registro" value="<?php echo date('d/m/Y H:i:s');?>"></input>

		<script src="../js/jquery.js"></script>
		<script src="../js/jquerymask.min.js"></script>
		<script src="../js/materialize.js"></script>
		<script src="../js/drop_materialize.js"></script>
		<script src="../js/mbox-0.0.1.js"></script>
	</body>
	</html>

	<script>
		$(document).ready(function(e){
			$('#tel_fixo').mask('(99) 9999-9999');
			$('#celular').mask('(99) 9-9999-9999');
			$('#cpf').mask('999.999.999.99');
		});

		$('#Retornar').click(function(e) {
			e.preventDefault();
			history.go(-1);
		});

		$('#Salvar').click(function(e) {
			e.preventDefault();

			$(this).attr('disabled', 'true');
			var nome = $('#nome').val();
			var nascimento = "<?php echo $dataFormatada; ?>";
			var sexo = "<?php echo $sexo;?>";
			var cidade = $('#cidade').val();
			var endereco_residencial = $('#endereco_residencial').val();
			var estado = $('#estado').val();
			var campus = "<?php echo $campus;?>";
			var cpf = $('#cpf').val();
			var email = $('#email').val();
			var tel_fixo = $('#tel_fixo').val();
			var celular = $('#celular').val();
			var possui_deficiencia = "<?php echo $select_deficiencia; ?>";
			var ingressou_vaga_deficiente = "<?php echo $ingressou_vaga_deficiente; ?>";
			var tipo_deficiencia;

			if (possui_deficiencia == 1) {
				tipo_deficiencia = "<?php echo $select_tipo_deficiencia; ?>";
			} else {
				tipo_deficiencia = 0;
			}
			var tipo_usuario = "<?php echo $tipo_usuario; ?>";
			var senha = $('#senha').val();
			var data_registro = $('#data_registro').val();
			var id_usuario;

			var modalidade = "<?php echo $modalidade; ?>";


//Guardando dados comuns do usuários
$.ajax({
	url: '../engine/controllers/usuario.php',
	data: {
		id_usuario : null,
		nome : nome,
		nascimento : nascimento,
		sexo : sexo,
		cidade : cidade,
		endereco_residencial: endereco_residencial,
		estado : estado,
		campus : campus,
		cpf : cpf,
		email : email,
		tel_fixo : tel_fixo,
		celular : celular,
		possui_deficiencia : possui_deficiencia,
		ingressou_vaga_deficiente : ingressou_vaga_deficiente,
		tipo_deficiencia : tipo_deficiencia,
		tipo_usuario : tipo_usuario,
		senha : senha,
		data_registro : data_registro,

		action: 'create'
	},
	success : function(data){
		obj = JSON.parse(data);
		if (obj.res == 'true') {
			id_usuario = obj.id_usuario;
		} else {
			return alert('Error de conexão com o servidor! Recarregue a página e tente novamente.');
		}
	},
	async : false,
	type: 'POST'
});

var marlon = 0;

if (possui_deficiencia == 1) {
	switch(marlon){
		case 0: //def auditiva - OK
		alert('def auditiva');
		$.ajax({
			url : '../engine/controllers/usuario_deficiencia_auditiva.php',
			data : {
				fk_usuario : id_usuario, 
				comunica_atraves : "<?php echo $comunica_atraves; ?>",
				grau_surdez_dir : "<?php echo $select_grau_surdez_dir; ?>",
				grau_surdez_esq : "<?php echo $select_grau_surdez_esq; ?>",
				usa_aparelho_dir : "<?php echo $usa_aparelho_dir; ?>",
				usa_aparelho_esq : "<?php echo $usa_aparelho_esq; ?>",
				implante_coclear_dir : "<?php echo $implante_coclear_dir; ?>",
				implante_coclear_esq : "<?php echo $implante_coclear_esq; ?>",
				action : 'create'
			},
			success : function(data){
				console.log(data);
			},
			async : false,
			type : 'POST'
		});
		break;
		
		case 1: //def física
		alert('def física');
		$.ajax({
			url : '../engine/controllers/usuario_deficiencia_fisica.php',
			data : {
				fk_usuario : id_usuario,
				tipo_defiencia_fisica : tipo_defiencia_fisica,
				outro_tipo_def_fisica : outro_tipo_def_fisica,
				action : 'create'
			},
			async : false,
			type : 'POST'
		});
		break;

		case 2: //def visual
		alert('def visual');
		$.ajax({
			url : '../engine/controllers/usuario_deficiencia_visual.php',
			data : {
				fk_usuario : id_usuario,
				tipo_defiencia_visual : tipo_defiencia_visual,
				action : 'create'
			},
			async : false,
			type : 'POST'
		});
		break;

		case 3: //def mental
		alert('def mental');
		$.ajax({
			url : '../engine/controllers/usuario_deficiencia_mental.php',
			data : {
				fk_usuario : id_usuario,
				deficiencia_mental : deficiencia_mental,
				action : 'create'
			},
			async : false,
			type : 'POST'
		});
		break;

		case 4: //def múltipla
		alert('def múltipla');
		$.ajax({
			url : '../engine/controllers/usuario_deficiencia_multipla.php',
			data : {
				fk_usuario : id_usuario,
				deficiencia_multipla : deficiencia_multipla,
				action : 'create'
			},
			async : false,
			type : 'POST'
		});
		break;

		case 5: //def tea
		alert('def tea');
		$.ajax({
			url : '../engine/controllers/usuario_deficiencia_tea.php',
			data : {
				fk_usuario : id_usuario,
				deficiencia_tea : deficiencia_tea,
				action : 'create'
			},
			async : false,
			type : 'POST'
		});
		break;

		case 6: //def outras
		alert('def outras');
		$.ajax({
			url : '../engine/controllers/usuario_deficiencia_outras.php',
			data : {
				fk_usuario : id_usuario,
				outro_tipo_necessidade : outro_tipo_necessidade,
				necessidade_especial_especifica : necessidade_especial_especifica,
				action : 'create'
			},
			async : false,
			type : 'POST'
		});
		break;
	}
}

if (tipo_usuario == 0) {
	if (modalidade == 0) {
//instaciando dados da tabela usuario_graduacao
var matricula_grad = $('#matricula_grad').val();
var curso_grad = $('#curso_grad').val();
var periodo_grad = $('#periodo_grad').val();
var turno_grad = "<?php echo $select_turno_grad; ?>";
var bolsista_grad = "<?php echo $select_bolsista_grad; ?>";

//armazenamento dos dados do usuario_graduacao
$.ajax({
	url: '../engine/controllers/usuario_graduacao.php',
	data: {
		id_graduacao : null,
		matricula : matricula_grad,
		curso : curso_grad,
		periodo : periodo_grad,
		turno : turno_grad,
		bolsista : bolsista_grad,
		fk_usuario: id_usuario,
		cpf : cpf,
		action: 'create'
	},
	success: function(data) {
		if(data === 'true'){
			mbox.alert("Anote seus dados de acesso para não se esquecer!", function(e){
				$.ajax({
					url: '../src/confirmacao-cadastro.php',
					data: {
						nome : nome,
						email : email,
						cpf : cpf
					},
					success : function(data){
						if (data == 1) {window.location.href = "../login/index.php"; }
						else {mbox.alert("Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!"); }
					},
					type: 'POST'
				});
			});
		}else{
			var $toastContent = $('<span>Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.</span>');
			Materialize.toast($toastContent, 5000, 'rounded');
		}
	},
	async : false,
	type: 'POST'
});

} else if (modalidade == 1){
//instanciando dados da tabela usuario_pos
var matricula_pos = $('#matricula_pos').val();
var curso_pos = $('#curso_pos').val();

//armazenamento dos dados do usuario_pos
$.ajax({
	url: '../engine/controllers/usuario_pos.php',
	data: {
		id_pos : null,
		matricula : matricula_pos,
		curso : curso_pos,
		fk_usuario: id_usuario,
		cpf : cpf,
		action: 'create'
	},
	success: function(data) {
		if(data === 'true'){
			mbox.alert("Anote seus dados de acesso para não se esquecer!", function(e){
				$.ajax({
					url: '../src/confirmacao-cadastro.php',
					data: {
						nome : nome,
						email : email,
						cpf : cpf
					},
					success : function(data){
						if (data == 1) {window.location.href = "../login/index.php"; }
						else {mbox.alert("Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!"); }
					},
					type: 'POST'
				});
			});
		}else{
			var $toastContent = $('<span>Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.</span>');
			Materialize.toast($toastContent, 5000, 'rounded');
		}
	},

	type: 'POST'
});

} else {
//instanciando dados da tabela usuario_Ead
var matricula_ead = $('#matricula_ead').val();
var curso_ead = $('#curso_ead').val();
var periodo_ead = $('#periodo_ead').val();
var select_polo_ead = $('#select_polo_ead').val();

//armazenamento dos dados do usuario_ead
$.ajax({
	url: '../engine/controllers/usuario_ead.php',
	data: {
		id_ead : null,
		matricula : matricula_ead,
		curso : curso_ead,
		periodo : periodo_ead,
		polo : select_polo_ead,
		fk_usuario: id_usuario,
		cpf : cpf,

		action: 'create'
	},
	success: function(data) {
		if(data === 'true'){
			mbox.alert("Anote seus dados de acesso para não se esquecer!", function(e){
				$.ajax({
					url: '../src/confirmacao-cadastro.php',
					data: {
						nome : nome,
						email : email,
						cpf : cpf
					},
					success : function(data){
						if (data == 1) {window.location.href = "../login/index.php"; }
						else {mbox.alert("Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!"); }
					},
					type: 'POST'
				});
			});
		}else{
			var $toastContent = $('<span>Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.</span>');
			Materialize.toast($toastContent, 5000, 'rounded');
		}
	},

	type: 'POST'
});
}
} else if (tipo_usuario == 1){
//instanciando dados da tabela usuario_terceirizado
var empresa_terc = $('#empresa_terc').val();
var funcao_terc = $('#funcao_terc').val();

//armazenamento dos dados do usuario_pos
$.ajax({
	url: '../engine/controllers/usuario_terceirizado.php',
	data: {
		id_terceirizado : null,
		empresa : empresa_terc,
		funcao : funcao_terc,
		fk_usuario : id_usuario,
		cpf : cpf,

		action: 'create'
	},
	success: function(data) {
		if(data === 'true'){
			mbox.alert("Anote seus dados de acesso para não se esquecer!", function(e){
				$.ajax({
					url: '../src/confirmacao-cadastro.php',
					data: {
						nome : nome,
						email : email,
						cpf : cpf
					},
					success : function(data){
						if (data == 1) {window.location.href = "../login/index.php"; }
						else {mbox.alert("Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!"); }
					},
					type: 'POST'
				});
			});
		}else{
			var $toastContent = $('<span>Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.</span>');
			Materialize.toast($toastContent, 5000, 'rounded');
		}
	},

	type: 'POST'
});

} else {
//instanciando dados da tabela usuario_servidor
var departamento_serv = $('#departamento_serv').val();
var cargo_serv = $('#cargo_serv').val();
var siape_serv = $('#siape_serv').val();

//armazenamento dos dados do usuario_pos
$.ajax({
	url: '../engine/controllers/usuario_servidor.php',
	data: {
		id_servidor : null,
		departamento : departamento_serv,
		cargo : cargo_serv,
		siape : siape_serv,
		fk_usuario : id_usuario,
		cpf : cpf,

		action: 'create'
	},
	success: function(data) {
		if(data === 'true'){
			mbox.alert("Anote seus dados de acesso para não se esquecer!", function(e){
				$.ajax({
					url: '../src/confirmacao-cadastro.php',
					data: {
						nome : nome,
						email : email,
						cpf : cpf
					},
					success : function(data){
						if (data == 1) {window.location.href = "../login/index.php"; }
						else {mbox.alert("Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!"); }
					},
					type: 'POST'
				});
			});
		}else{
			var $toastContent = $('<span>Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.</span>');
			Materialize.toast($toastContent, 5000, 'rounded');
		}
	},
	type: 'POST'
});
}

});
</script>