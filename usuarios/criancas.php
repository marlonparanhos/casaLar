<?php
$showerros = true;
if($showerros) {
  ini_set("display_errors", $showerros);
  error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}

session_start();

session_name(sha1($_SERVER['HTTP_USER_AGENT'].$_SESSION['email']));

if(empty($_SESSION)){
  ?>
  <script>
    document.location.href = '../login/';
  </script>
  <?php
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1200)) {
  session_unset();
  session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#235d3d">
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico"/>
	<title>Turma da Manhã </title>

	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/menu.css" rel="stylesheet">
	<link href="../css/somesystem.css" rel="stylesheet">
	<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<?php
	require_once "../engine/config.php";
	?>

</head>

<body>
	<!-- Navigation -->
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
				</button>
				<!--<a class="navbar-brand" href="#page-top">Diamantinense</a>-->
				<a class="navbar-brand img-logo img-responsive" href="../index.php">  <img class="logo-sis" src="../img/logo.png"/> </a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" id="menuzinho" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> alunos <span class="caret"></span></a>
						<ul class="dropdown-menu" id="link-drop">
							<li><a href="selecionar_lista.php" id="#">Controle de alunos</a></li>
							<li><a href="../aprovados/aprovados.php" id="">Aprovados</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" id="menuzinho" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Gerenciamento <span class="caret"></span></a>
						<ul class="dropdown-menu" id="link-drop">
						<li><a href="../funcionarios/selecionar_func.php" id="">Controle de Funcionários</a></li>
			            <li><a href="../controle_acoes/controle_acoes.php" id="">Controle de Ações</a></li>
			            <li><a href="../funcionarios/controle_substituicao/selecionar_acao.php" id="">Controle de Substituição</a></li>
			            <li><a href="../controle_cobranca/controle_cobranca.php" id="">Controle de Cobrança</a></li>
			            <li><a href="../controle_aulas/consultar_aulas.php" id="">Controle de Aulas</a></li>
			            <li><a href="../controle_aulasextras/aulas_extra.php" id="">Controle de Aulas Extras</a></li>
			            <li><a href="../controle_estoque/controle_estoque.php" id="">Controle de Estoque</a></li>
			            <li><a href="../boletos/boletos.php" id="">Boletos a Cancelar</a></li>
						</ul>
					</li>
					<li><a href="#" class="getout">SAIR<i class="fa fa-sign-out" aria-hidden="true"></i> </a></li>
				</ul>
			</div>
		</div>
	</nav>
	<section class="main container-fluid" id="loader">
		<br><br><br><br><br><br>

		<ol class="breadcrumb breadcrumb-diamantinense">
			<li><a href="../index.php" id="#">Home</a></li>
			<li><a href="selecionar_lista.php" id="#">Controle de Alunos</a></li>
			<li class="active">Turma da Manhã</li>
		</ol>


		<h1>Lista de Alunos Manhã </h1>

		<div class="row row-list">
			<div class="col-lg-9">
				<br>
				<div class="btn-group" role="group" aria-label="...">
					<button type="button" class="btn btn-warning btn-page" id="Voltar"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
					<button type="button" class="btn btn-primary btn-page" id="Atualizar">  <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</button>
				</div>
			</div>
			<div class="col-lg-3">
				<br>
				<div class="input-group">
					<input type="text" class="form-control" id="ValorPesquisa" placeholder="Pesquisar por Nome...">
					<span class="input-group-btn">
						<button class="btn btn-success" type="button" id="Pesqisar"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</div>
			</div>
		</div>

		<br>

		<?php
		$Beneficiario = new Beneficiario();
		$Beneficiario = $Beneficiario->ReadManha();

		if(empty($Beneficiario)) {
			?>

			<h4 class="well"> Nenhum dado encontrado. </h4>
			<?php
		} else {
			?>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="content table-responsive table-full-width">
									<table class="table table-hover table-striped">
										<thead>
											<th>ID</th>
											<th>Aluno</th>
											<th>Contratante</th>
											<th>Email Contratante</th>
											<th>Telefone Fixo Contratante</th>
											<th>Celular Contratante</th>
											<th class=" text-center">Info</th>
											<th class=" text-center">Status</th>
										</thead>
										<tbody>
											<?php
											foreach($Beneficiario as $aluno){
												if ($aluno['status'] == 'Carnê a enviar') {
													$cor_status = '#5352ed';
												} elseif ($aluno['status'] == 'Carnê enviado') {
													$cor_status = '#27ae60';
												}
												?>
												<tr>
													<td><?php echo $aluno['id_beneficiario'];?></td>
													<td><?php echo $aluno['nome_aluno'];?></td>
													<td><?php echo $aluno['nome_contratante'];?></td>
													<td><?php echo $aluno['email_contratante']; ?></td>
													<td><?php echo $aluno['tel_fixo_contratante']; ?></td>
													<td><?php echo $aluno['cel_contratante']; ?></td>

													<!-- Passagem de valores via GET -->
													<td class="text-center DetalhesItem">
														<a href="detalhes/detalhes.php?id=<?php echo $aluno['id_beneficiario'];?>" style="color: inherit;">
															<div style="height:100%; width:100%;">
																<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
															</div>
														</a>
													</td>

													<td style="color: <?php echo $cor_status; ?>;" class="text-center StatusItem" id="<?php echo $aluno['id_beneficiario']; ?>" aria-hidden="true" data-toggle="modal" data-target="#myModal">
														<span > <?php echo $aluno['status']; ?> </span>
													</td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>

									<!-- Modal do status -->
									<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Selecione um Status</h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<select class="form-control" id="status" required>
															<option value="Carnê a enviar">Carnê a enviar</option>
															<option value="Carnê enviado">Carnê enviado</option>
														</select>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm">Salvar</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
												</div>
											</div>
										</div>
									</div>
									<!-- Fim modal status -->

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			</nav>
			<?php
		}
		?>
	</section>
	<footer class="nxfooter">
		<p class="text-center"> Copyright © Next Step 2017. Todos os direitos reservados. </p>
	</footer>

	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/menu.js"></script>
	<script src="../js/sweetalert.js"></script>
	<script>
		$(document).ready(function(e) {
			$('#Atualizar').click(function(e) {
				e.preventDefault();
				location.reload();
			});
			$('#Voltar').click(function(e) {
				e.preventDefault();
				window.location = "selecionar_lista.php";
			});
			$('#Pesqisar').click(function(e) {
				e.preventDefault();
				var ValorPesquisa = $('#ValorPesquisa').val();
				if(ValorPesquisa === ""){
					swal("Alerta", "Digite o nome desejado.", "info");
				}else{
					$('#loader').load('pesquisa/pesquisa_manha.php', { ValorPesquisa: ValorPesquisa});
				}
			});

			$('.StatusItem').click(function(e) {
				e.preventDefault();
				var id = $(this).attr('id');
				$('#confirm').click(function(e) {
					var status = $('#status').val();
					$.ajax({
						url: '../engine/controllers/controle_aluno_beneficiario.php',
						data: {
							id_beneficiario: id,
							status : status,

							action: 'updateStatus'
						},
						success: function(data) {
							console.log(data);
							if(data === 'true'){
								swal("Sucesso", "Status atualizado!", "success", {button : false});
								setTimeout(function() {
									location.reload();
								}, 3000);
							}else{
								swal("Atenção", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.", "error");
							}
						},
						type: 'POST'
					});
				});
			});
		});
	</script>
</body>
</html>