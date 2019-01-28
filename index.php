<?php
$showerros = true;
if($showerros) {
  ini_set("display_errors", $showerros);
  error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}

#session_start(); atualizar aqui

// session_name(sha1($_SERVER['HTTP_USER_AGENT'].$_SESSION['email']));

// if(empty($_SESSION)){
//   ?>
//   <script>
//     document.location.href = 'login/index.php';
//   </script>
//   <?php
// }

// if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1201)) {
//   session_unset();
//   session_destroy();
// }
// $_SESSION['LAST_ACTIVITY'] = time();

// require_once "engine/config.php";
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
  <link rel="icon" type="image/jpg" href="img/favicon.ico"/>
  <title>Casa Lar</title>

  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/menu.css" rel="stylesheet">
  <link href="css/somesystem.css" rel="stylesheet">
  <link href="css/toastr.min.css" rel="stylesheet">
  <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
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

  <br><br><br><br><br><br>
  <img src="img/avatar.png" class="center-block" height="auto" width="300px" style="margin-top: -40px">
  <br><br>

  <hr>

  <section class="container-fluid text-center" style="min-height: 80vh;">
    <div class="row" style="padding-left: 5px; padding-right: 5px;">
      <a href="usuarios/criancas.php" id="crianca-home">
        <div class="col-md-4 col-xs-12 fundo-cor">
         <i class="fa fa-users fa-5x"></i>
         <h4 class="text-center">Crianças</h4>
       </div>
     </a>
     <a href="usuarios/funcionarios.php" id="funcionario-home">	
      <div class="col-md-4 col-xs-12 fundo-cor">
       <i class="fa fa-id-card fa-5x"></i>
       <h4 class="text-center">Funcionários</h4>
     </div>
   </a>
   <a href="usuarios/colaboradores.php" id="colaboradores-home">
    <div class="col-md-4 col-xs-12 fundo-cor">
      <i class="fa fa-check fa-5x"></i>
      <h4 class="text-center">Colaboradores</h4>
    </div>
  </a>
</div>

</section>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

<script>
  $(document).ready(function(e) {
    $('.getout').click(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'engine/controllers/logout.php',
        data: {
        },
        success: function(data) {
          if(data === 'kickme'){
            document.location.href = 'login/';
          }else{
            swal("Atenção", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.", "error");
          }
        },

        type: 'POST'
      });

    });
  });

</script>
