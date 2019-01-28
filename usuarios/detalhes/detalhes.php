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
    document.location.href = '../../login/';
  </script>
  <?php
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1201)) {
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
  <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico"/>
  <title>Detalhes Turmas</title>

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
        <a class="navbar-brand img-logo img-responsive" href="../../index.php">  <img class="logo-sis" src="../../img/logo.png"/> </a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="menuzinho" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> alunos <span class="caret"></span></a>
            <ul class="dropdown-menu" id="link-drop">
              <li><a href="../selecionar_lista.php" id="#">Controle de alunos</a></li>
              <li><a href="../../aprovados/aprovados.php" id="">Aprovados</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="menuzinho" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Gerenciamento <span class="caret"></span></a>
            <ul class="dropdown-menu" id="link-drop">
            <li><a href="../../funcionarios/selecionar_func.php" id="">Controle de Funcionários</a></li>
                  <li><a href="../controle_acoes/controle_acoes.php" id="">Controle de Ações</a></li>
                  <li><a href="../../funcionarios/controle_substituicao/selecionar_acao.php" id="">Controle de Substituição</a></li>
                  <li><a href="../../controle_cobranca/controle_cobranca.php" id="">Controle de Cobrança</a></li>
                  <li><a href="../../controle_aulas/consultar_aulas.php" id="">Controle de Aulas</a></li>
                  <li><a href="../../controle_aulasextras/aulas_extra.php" id="">Controle de Aulas Extras</a></li>
                  <li><a href="../../controle_estoque/controle_estoque.php" id="">Controle de Estoque</a></li>
                  <li><a href="../../boletos/boletos.php" id="">Boletos a Cancelar</a></li>
            </ul>
          </li>
          <li><a href="#" class="getout">SAIR<i class="fa fa-sign-out" aria-hidden="true"></i> </a></li>
        </ul>
      </div>
  </div>
</nav>
<section class="main container-fluid">
  <br><br><br><br><br><br>

  <ol class="breadcrumb breadcrumb-diamantinense">
    <li><a href="../../index.php" id="#">Home</a></li>
    <li><a href="../selecionar_lista.php" id="#">Controle de Alunos</a></li>
    <li class="active">Detalhes</li>
  </ol>

  <?php
  $Beneficiario = new Beneficiario();
  $Beneficiario = $Beneficiario->Read($_GET['id']);

  $aux_cursoTurno;
  if ($Beneficiario['curso_turno'] == '0') {
    $aux_cursoTurno = "Extensivo Manhã";
  } elseif ($Beneficiario['curso_turno'] == '1') {
    $aux_cursoTurno = "Extensivo Noite";
  } else {
    $aux_cursoTurno = "Intensivo Noite";
  }
  ?>
  <input type="hidden" id="id_ben" value="<?php echo $_GET['id']; ?>">
  <div class="content">
    <div class="container-fluid">

      <section class="btn-group" role="group" aria-label="...">
        <a href="" style="color: inherit;">
         <button type="button" class="btn btn-warning btn-page" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
       </a>

       <a href="../editar.php?id=<?php echo $_GET['id']; ?>" style="color: inherit;">
         <button type="button" class="btn btn-primary btn-page" id=""><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
       </a>

       <?php
        if ($Beneficiario['finalizado'] == 'Sim' || $Beneficiario['finalizado'] == 'sim') {
          ?>
          <a style="color: inherit;">
           <button type="button" class="btn btn-success btn-page reativar" id="<?php echo $_GET['id'] ?>"><i class="fa fa-retweet" aria-hidden="true"></i> Reativar</button>
         </a>
          <?php
        } else {
          ?>
          <a href="#" style="color: inherit;" >
           <button type="button" id="Finalizar" class="btn btn-danger btn-page" id=""><span class="glyphicon glyphicon-ok"  aria-hidden="true"></span> Finalizar</button>
         </a>
          <?php
        }
      ?>

       <a href="#" style="color: inherit;" >
         <button type="button" class="btn btn-primary btn-page" data-toggle="modal" data-target="#myModal"><span
           class="glyphicon glyphicon-download"></span>
         Gerar Contrato </button>
       </a>
     </section>

     <h1>Detalhes do Aluno</h1>
     <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="content table-responsive table-full-width">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Aluno</th>
                  <th>Curso / Turno</th>
                  <th>CPF</th>
                  <th>RG</th>
                  <th>e-mail</th>
                  <th>Celular</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><?php echo $Beneficiario['nome_aluno']; ?></td>
                  <td><?php echo $aux_cursoTurno; ?></td>
                  <td><?php echo $Beneficiario['cpf_aluno']; ?></td>
                  <td><?php echo $Beneficiario['rg_aluno']; ?></td>
                  <td><?php echo $Beneficiario['email']; ?></td>
                  <td><?php echo $Beneficiario['celular']; ?></td>
                </tr>
              </tbody>
            </table>

            <br>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>WhatsApp</th>
                  <th>Naturalidade</th>
                  <th>Nascimento</th>
                  <th>Pai</th>
                  <th>Mãe</th>
                  <th>Última Escola</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><?php echo $Beneficiario['whatsapp_beneficiario']; ?></td>
                  <td><?php echo $Beneficiario['naturalidade']; ?></td>
                  <td><?php echo $Beneficiario['data_nascimento']; ?></td>
                  <td><?php echo $Beneficiario['nome_pai']; ?></td>
                  <td><?php echo $Beneficiario['nome_mae']; ?></td>
                  <td><?php echo $Beneficiario['escola_conclusao_em']; ?></td>
                </tr>
              </tbody>
            </table>

            <br>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Universidade de Interesse</th>
                  <th>Curso de Interesse</th>
                  <th>Ativo/Inativo</th>
                  <th>Desistência</th>
                  <th>Status</th>
                  <th>Ex Aluno</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                 <td><?php echo $Beneficiario['universidade_interesse']; ?></td>
                 <td><?php echo $Beneficiario['curso_interesse']; ?></td>
                 <td><?php echo $Beneficiario['ativo_inativo']; ?></td>
                 <td><?php echo $Beneficiario['desistencia']; ?></td>
                 <td><?php echo $Beneficiario['status']; ?></td>
                 <td><?php echo $Beneficiario['ex_aluno']; ?></td>
               </tr>
             </tbody>
           </table>

           <br><br>

           <h1>Detalhes do Contratante</h1>

           <?php
           $Contratante = new Contratante();
           $Contratante = $Contratante->Read($Beneficiario['fk_contratante']);
           ?>

           <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Tel. Fixo</th>
                <th>Celular</th>
                <th>WhatsApp</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><?php echo $Contratante['nome_contratante']; ?></td>
                <td><?php echo $Contratante['cpf_contratante']; ?></td>
                <td><?php echo $Contratante['rg_contratante']; ?></td>
                <td><?php echo $Contratante['tel_fixo_contratante']; ?></td>
                <td><?php echo $Contratante['cel_contratante']; ?></td>
                <td><?php echo $Contratante['whatsapp_contratante']; ?></td>
              </tr>
            </tbody>
          </table>

          <br>

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>e-mail</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><?php echo $Contratante['email_contratante']; ?></td>
                <td><?php echo $Contratante['rua']; ?></td>
                <td><?php echo $Contratante['numero_casa']; ?></td>
                <td><?php echo $Contratante['bairro']; ?></td>
                <td><?php echo $Contratante['cidade']; ?></td>
                <td><?php echo $Contratante['estado']; ?></td>
              </tr>
            </tbody>
          </table>

          <br>

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>CEP</th>
                <th>Material Incluso</th>
                <th>Contrato Aceito</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><?php echo $Contratante['cep']; ?></td>
                <td><?php echo $Contratante['material_incluso']; ?></td>
                <td><?php echo $Contratante['li_aceito_contrato']; ?></td>
              </tr>
            </tbody>
          </table>

          <br><br>

          <h1>Financeiro</h1>

          <?php
          $Financeiro = new Financeiro();
          $Financeiro = $Financeiro->Read_fk($Beneficiario['id_beneficiario']);

          $data_contrato = str_replace("-", "/", $Financeiro['data_contrato']);
          $data_contrato = date('d/m/Y', strtotime($data_contrato));

          $valor_int = str_replace('R$', '', $Financeiro['valor_integral']);
          $valor_int = str_replace('.', '', $valor_int);
          $valor_int = str_replace(',', '.', $valor_int);

          $valor_cont = str_replace('R$', '', $Financeiro['valor_contratado']);
          $valor_cont = str_replace('.', '', $valor_cont);
          $valor_cont = str_replace(',', '.', $valor_cont);

          $valor_desconto = $valor_int - $valor_cont;
          $valor_desconto = str_replace('.', ',', number_format($valor_desconto, 2, '.', ','));
          ?>

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Dia do Vencimento</th>
                <th>Nº de Parcelas</th>
                <th>Data do Contrato</th>
                <th>Data do Encerramento</th>
                <th>Valor Avulso</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><?php echo $Financeiro['dia_vencimento']; ?></td>
                <td><?php echo $Financeiro['numero_parcelas']; ?></td>
                <td><?php echo $data_contrato; ?></td>
                <td><?php echo $Financeiro['data_encerramento']; ?></td>
                <td><?php echo $Financeiro['valor_avulso']; ?>
                </tr>
              </tbody>
            </table>

            <br>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Valor Integral</th>
                  <th>Valor Parcelas</th>
                  <th>Valor do Desconto</th>
                  <th>Valor Contratado</th>
                  <th>Percentual a ser liquidado</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><?php echo $Financeiro['valor_integral']; ?></td>
                  <td><?php echo $Financeiro['valor_parcelas']; ?></td>
                  <td><?php echo "R$ ".$valor_desconto; ?></td>
                  <td><?php echo $Financeiro['valor_contratado']; ?></td>
                  <td><?php echo $Financeiro['valor_recisao']; ?></td>
                </tr>
              </tbody>
            </table>

            <br>

            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Observações Gerais</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><?php echo $Financeiro['observacoes']; ?></td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Modal enviar contrato -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gerar Contrato</h4>
      </div>
      <div class="modal-body">
        <p>Reenviar contrato para o contratante?</p>
      </div>
      <div class="modal-footer">

        <a href="../../pdf/gerar-pdf.php?id=<?php echo $Beneficiario['id_beneficiario']; ?>" style="color: inherit;" id="sim">
          <button type="button" class="btn btn-default">Sim</button>
        </a>

        <a href="../../pdf/gerar-nao-enviar-pdf.php?id=<?php echo $Beneficiario['id_beneficiario']; ?>" style="color: inherit;" id="nao">
          <button type="button" class="btn btn-default">Não</button>
        </a>

        <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>

      </div>
    </div>
  </div>
</div>

<?php
  if ($Beneficiario['finalizado'] == 'Sim' || $Beneficiario['finalizado'] == 'sim') {
    ?>
    <p class="text-center">
      <button type="button" class="btn btn-danger btn-page btn-sm ExcluirItem" id="<?php echo $_GET['id']; ?>">
        <span class="glyphicon glyphicon-remove" arial-hidden="true"></span> Excluir Aluno
      </button>
    </p>
    <?php
  }
?>

</section>
<footer class="nxfooter">
  <p class="text-center"> Copyright © Next Step 2017. Todos os direitos reservados. </p>
</footer>

<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/menu.js"></script>
<script src="../../js/sweetalert.js"></script>
</body>
</html>

<script>
  $(document).ready(function(e) {
    $('.reativar').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var r = confirm("Deseja reativar esse aluno(a)?");
        if (r == true) {
          $.ajax({
            url: '../../engine/controllers/controle_aluno_beneficiario.php',
            data: {
              id_beneficiario: id,
              finalizado : "Não",

              action: 'updateFinalizar'
            },
            success: function(data) {
             if(data === 'true'){
              swal("Sucesso", "Aluno reativado!", "success", {button : false});
              setTimeout(function() {
                window.location = "../finalizados.php";
              }, 3000);
            }else{
              swal("Atenção", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.", "error");
            }
          },

          type: 'POST'
        });
        } else {
          swal("Alerta", "Aluno não reativado!", "info");
        }
      });

    $('.ExcluirItem').click(function(e){
        e.preventDefault();

        var id = $(this).attr('id');

        if(confirm("Deseja excluir este aluno da base de dados?")){
          $.ajax({
            url: '../../engine/controllers/controle_aluno_beneficiario.php',
            data: {
              id_beneficiario : id,

              action: 'delete'
            },
            success: function(data) {
              if(data === 'true'){
                swal("Sucesso", "Aluno apagado!", "success", {button : false});
                setTimeout(function(){
                  window.location = "../finalizados.php";
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
          console.log(data);
          if(data === 'kickme'){
            document.location.href = '../../login/';
          }else{
            alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
          }
        },
        type: 'POST'
      });

    });

    $('#sim').click(function() {
      $(this).attr('target', '_blank');
      $('#myModal').modal('hide');
    });

    $('#nao').click(function() {
      $(this).attr('target', '_blank');
      $('#myModal').modal('hide');
    });

    $('#Voltar').click(function(e){
      e.preventDefault();
      history.back();
    });

    $('#Finalizar').click(function(e) {
     e.preventDefault();
     var id = $('#id_ben').val();
     var r = confirm("Deseja finalizar esse aluno(a)?");
     if (r == true) {
       $.ajax({
        url: '../../engine/controllers/controle_aluno_beneficiario.php',
        data: {
         id_beneficiario: id,
         finalizado : "Sim",

         action: 'updateFinalizar'
       },
       success: function(data) {
         console.log(data);
         if(data === 'true'){
          swal("Sucesso", "Aluno finalizado!", "success", {button : false});
          setTimeout(function() {
            window.location = "../turma_manha.php";
          }, 3000);
        }

        else{
          swal("Atenção", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.", "error");
        }
      },

      type: 'POST'
    });
     }
     else {
       swal("Alerta", "Aluno não Finalizado!", "info");
     }
   });
  });
</script>
