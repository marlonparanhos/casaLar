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
	<title>Colaboradores</title>

	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/menu.css" rel="stylesheet">
	<link href="../css/somesystem.css" rel="stylesheet">
	<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<?php
	require_once "../engine/config.php";
	?>
</head>

<body>
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="getout">SAIR<i class="fa fa-sign-out" aria-hidden="true"></i> </a></li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="main container-fluid" id="loader">
		<br><br>
		<ol class="breadcrumb breadcrumb-diamantinense">
			<li><a href="../index.php" id="#">Home</a></li>
			<li class="active">Colaboradores</li>
		</ol>

		<h1>Lista de colaboradores</h1>

		<div class="row row-list">
			<div class="col-lg-9">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-warning btn-page" id="Voltar"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</button>
					<button type="button" class="btn btn-primary btn-page" id="Atualizar"><span class="glyphicon glyphicon-refresh"></span> Atualizar</button>
				</div>
			</div>
		</div>

		<br>

		<?php
		$Colaborador = new Colaborador();
		$Colaborador = $Colaborador->ReadAll();

		if(empty($Colaborador)) { ?>
			<h4 class="well"> Nenhum dado encontrado. </h4>
			<?php
		} else {
			?>
			<div class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="content table-responsive table-full-width">
								<table class="table table-hover table-striped">
									<thead>
										<th>ID</th>
										<th>Nome</th>
										<th>Celular</th>
										<th>e-mail</th>
									</thead>
									<tbody>
										<?php
										foreach($Colaborador as $c){ ?>
											<tr>
												<td><?php echo $c['id'];?></td>
												<td><?php echo $c['nome_colab'];?></td>
												<td><?php echo $c['celular_colab'];?></td>
												<td><?php echo $c['email_colab']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</section>

	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script>
		$(document).ready(function(e) {
			$('#Atualizar').click(function(e) {
				e.preventDefault();
				location.reload();
			});

			$('#Voltar').click(function(e) {
				e.preventDefault();
				window.location = "../index.php";
			});

			$('.getout').click(function(e) {
				e.preventDefault();
				$.ajax({
					url: '../engine/controllers/logout.php',
					data: {
					},
					success: function(data) {
						if(data === 'kickme'){
							document.location.href = '../login/';
						}else{
							swal("Atenção", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.", "error");
						}
					},

					type: 'POST'
				});
			});
		});
	</script>
</body>
</html>