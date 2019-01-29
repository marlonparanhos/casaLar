<!-- <?php
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
    document.location.href = '../../login/';
  </script>
  <?php
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1201)) {
  session_unset();
  session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
?> -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#235d3d">
  <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico"/>
  <title>Detalhes</title>

  <link href="../../css/bootstrap.css" rel="stylesheet">
  <link href="../../css/menu.css" rel="stylesheet">
  <link href="../../css/somesystem.css" rel="stylesheet">
  <link href="../../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <?php
  require_once "../../engine/config.php";
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

  <section class="main container-fluid">
    <br><br><br><br>

    <ol class="breadcrumb breadcrumb-diamantinense">
      <li><a href="../../index.php" id="#">Home</a></li>
      <li class="active">Detalhes</li>
    </ol>

    <?php
    $Crianca = new Crianca();
    $Crianca = $Crianca->Read($_GET['id']);
    ?>
    <input type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
    <div class="content">
      <div class="container-fluid">

        <section class="btn-group" role="group" aria-label="...">
          <a href="" style="color: inherit;">
           <button type="button" class="btn btn-warning btn-page" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
         </a>

         <a href="#" class="ExcluirItem" style="color: inherit;">
           <button type="button" class="btn btn-danger btn-page" id=""><i class="fa fa-pencil"></i> Excluir</button>
         </a>       
       </section>

       <h1>Detalhes</h1>
       <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="content table-responsive table-full-width">
                <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Sexo</th>
                    <th>CPF</th>
                    <th>RG</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td><?php echo $Crianca['nome']; ?></td>
                    <td><?php echo $Crianca['nascimento']; ?></td>
                    <td><?php echo $Crianca['sexo']; ?></td>
                    <td><?php echo $Crianca['cpf']; ?></td>
                    <td><?php echo $Crianca['rg']; ?></td>
                  </tr>
                </tbody>
              </table>

              <br>

              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Pai</th>
                    <th>Mãe</th>
                    <th>Responsável</th>
                    <th>Celular</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td><?php echo $Crianca['pai']; ?></td>
                    <td><?php echo $Crianca['mae']; ?></td>
                    <td><?php echo $Crianca['responsavel']; ?></td>
                    <td><?php echo $Crianca['celular']; ?></td>
                  </tr>
                </tbody>
              </table>
              
              <br>

              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td><?php echo $Crianca['endereco']; ?></td>
                    <td><?php echo $Crianca['bairro']; ?></td>
                    <td><?php echo $Crianca['cidade']; ?></td>
                    <td><?php echo $Crianca['estado']; ?></td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="../../js/jquery.js"></script>
  <script src="../../js/bootstrap.js"></script>
  <script src="../../js/sweetalert.js"></script>
</body>
</html>

<script>
  $(document).ready(function(e) {
    $('.ExcluirItem').click(function(e){
      e.preventDefault();

      var id = ("<?php echo $_GET['id']; ?>");

      if(confirm("Deseja excluir este cadastro da base de dados?")){
        $.ajax({
          url: '../../engine/controllers/crianca.php',
          data: {
            id : id,

            action: 'delete'
          },
          success: function(data) {
            console.log(data);
            if(data === 'true'){
              swal("Sucesso", "Cadastro apagado!", "success", {button : false});
              setTimeout(function(){
                window.location = "../";
              }, 3000);
            } else {
              swal("Atenção", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.", "error");
            }
          },

          type: 'POST'
        });
      }
    });

    $('.getout').click(function(e) {
      e.preventDefault();
      $.ajax({
        url: '../../engine/controllers/logout.php',
        data: {},
        success: function(data) {
          if(data === 'kickme'){
            document.location.href = '../../login/';
          }else{
            alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
          }
        },
        type: 'POST'
      });

    });

    $('#Voltar').click(function(e){
      e.preventDefault();
      history.back();
    });
  });
</script>
