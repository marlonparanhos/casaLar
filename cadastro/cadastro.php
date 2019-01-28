<?php #require_once "../engine/config.php"; ?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "shortcut icon" type = "image/x-icon" href = "/img/favicon.ico "/>
  <title>Casa Lar | Cadastro</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/materialize.css">
  <link href="../css/somesystem.css" rel="stylesheet">
  <link href="../css/mbox-0.0.1.css" rel="stylesheet">
</head>
<body>
  <div class="container row">
   <h2 class="center title_responsivo">Cadastro de Usuário</h2>

   <div class="input-field col m12 s12">
    <select id="tipo_usuario">
      <option value="" disabled selected>Selecione...</option>
      <option value="0">Criança</option>
      <option value="1">Colaborador</option>
      <option value="2">Funcionário</option>
    </select>
    <label>Tipo de usuário *</label>
  </div>

  <div id="crianca" class="hide">
    <p class="center" style="font-size: 14px;"><strong>Campos marcados com asterisco (*) são de preenchimento obrigatório.</strong></p>

    <br>
    <div class="input-field col m7 s12">
     <input type="text" minlength="5" id="nome" placeholder=" " required onkeydown="upperCaseF(this)">
     <label>Nome Completo *</label>
   </div>

   <div class="input-field col m5 s12">
     <input type="text" class="datepicker" id="nascimento" required placeholder="dd/mm/aaaa">
     <label>Data de Nascimento *</label>
   </div>

   <div class="input-field col m4 s12">
     <select id="sexo">
       <option value="" disabled selected>Selecione...</option>
       <option value="0">Masculino</option>
       <option value="1">Feminino</option>
     </select>
     <label>Gênero *</label>
   </div>

   <div class="input-field col m4 s12">
    <input type="text" id="cpf" required placeholder="000.000.000.00">
    <label>CPF *</label>
  </div>

  <div class="input-field col m4 s12">
    <input type="text" id="rg" required placeholder=" ">
    <label>RG</label>
  </div>

  <div class="input-field col m6 s12">
   <input type="text" id="pai" placeholder=" " required onkeydown="upperCaseF(this)">
   <label>Pai *</label>
 </div>

 <div class="input-field col m6 s12">
   <input type="text" id="mae" placeholder=" " required onkeydown="upperCaseF(this)">
   <label>Mãe *</label>
 </div>

 <div class="input-field col m6 s12">
   <input type="text" id="responsavel" placeholder=" " required onkeydown="upperCaseF(this)">
   <label>Responsável *</label>
 </div>

 <div class="input-field col m6 s12">
  <input type="text" id="endereco" placeholder=" " required>
  <label>Endereço *</label>
</div>

<div class="input-field col m3 s12">
  <input type="text" id="bairro" placeholder=" " required>
  <label>Bairro *</label>
</div>

<div class="input-field col m3 s12">
 <input type="text" id="cidade" placeholder=" " required onkeydown="upperCaseF(this)">
 <label>Cidade *</label>
</div>
<br>

<div class="input-field col m3 s12">
 <select id="estado">
   <option value="" disabled selected>Selecione...</option>
   <option value="AC">Acre</option>
   <option value="AL">Alagoas</option>
   <option value="AP">Amapá</option>
   <option value="AM">Amazonas</option>
   <option value="BA">Bahia</option>
   <option value="CE">Ceará</option>
   <option value="DF">Distrito Federal</option>
   <option value="ES">Espirito Santo</option>
   <option value="GO">Goiás</option>
   <option value="MA">Maranhão</option>
   <option value="MS">Mato Grosso do Sul</option>
   <option value="MT">Mato Grosso</option>
   <option value="MG" selected>Minas Gerais</option>
   <option value="PA">Pará</option>
   <option value="PB">Paraíba</option>
   <option value="PR">Paraná</option>
   <option value="PE">Pernambuco</option>
   <option value="PI">Piauí</option>
   <option value="RJ">Rio de Janeiro</option>
   <option value="RN">Rio Grande do Norte</option>
   <option value="RS">Rio Grande do Sul</option>
   <option value="RO">Rondônia</option>
   <option value="RR">Roraima</option>
   <option value="SC">Santa Catarina</option>
   <option value="SP">São Paulo</option>
   <option value="SE">Sergipe</option>
   <option value="TO">Tocantins</option>
 </select>
 <label>Estado *</label>
</div>

<div class="input-field col m3 s12">
 <input type="text" id="celular" placeholder=" " required>
 <label>Celular *</label>
</div>
</div>

<div id="colaborador" class="hide">
  <p class="center" style="font-size: 14px;"><strong>Campos marcados com asterisco (*) são de preenchimento obrigatório.</strong></p>

  <br>
  <div class="input-field col m4 s12">
   <input type="text" minlength="5" id="nome_colab" placeholder=" " required onkeydown="upperCaseF(this)">
   <label>Nome Completo *</label>
 </div>

 <div class="input-field col m4 s12">
  <input type="text" id="celular_colab" placeholder=" " required>
  <label>Celular *</label>
</div>

<div class="input-field col m4 s12">
 <input type="text" id="email_colab" placeholder=" " required>
 <label>e-mail *</label>
</div>
</div>

<div id="funcionario" class="hide">
  <p class="center" style="font-size: 14px;"><strong>Campos marcados com asterisco (*) são de preenchimento obrigatório.</strong></p>

  <br>
  <div class="input-field col m6 s12">
   <input type="text" minlength="5" id="nome_func" placeholder=" " required onkeydown="upperCaseF(this)">
   <label>Nome Completo *</label>
 </div>

 <div class="input-field col m3 s12">
  <input type="text" id="cpf_func" required placeholder="000.000.000.00">
  <label>CPF *</label>
</div>

<div class="input-field col m3 s12">
 <input type="text" id="celular_func" placeholder=" " required>
 <label>Celular *</label>
</div>

<div class="input-field col m4 s12">
 <input type="text" id="email_func" placeholder=" " required>
 <label>e-mail *</label>
</div>

<div class="input-field col m4 s6">
  <input type="password" id="senha_func" required placeholder="Mínimo de 6 caracteres">
  <label>Senha *</label>
</div>

<div class="input-field col m4 s6">
  <input type="password" id="senha_confirmacao_func" required placeholder="Mínimo de 6 caracteres">
  <label>Confirmação de Senha *</label>
</div>
</div>

<div id="botoes" class="hide">
  <p class="center" >
    <a class="waves-effect waves-light btn" href="../index.php"><i class="fa fa-arrow-left"></i> Voltar</a>
    <button type="button" id="cadastrar" class="btn waves-effect waves-light btn green darken-3"><i class="fa fa-check"></i> Cadastrar</button>
  </p>  
</div>

</div>

<br>

<script src="../js/jquery.js"></script>
<script src="../js/vanilla-masker.js"></script>
<script src="../js/materialize.js"></script>
<script src="../js/drop_materialize.js"></script>
<script src="../js/mbox-0.0.1.js"></script>

</body>
</html>
<script>
  function upperCaseF(a){
    setTimeout(function(){
      a.value = a.value.toUpperCase();
    }, 1);
  }

  function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  $(document).ready(function(e){
    VMasker(document.querySelector("#celular")).maskPattern("(99) 9-9999-9999");
    VMasker(document.querySelector("#cpf")).maskPattern("999.999.999.99");
    VMasker(document.querySelector("#nascimento")).maskPattern("99/99/9999");

    $("#tipo_usuario").change(function(e){
      e.preventDefault();
      $("#crianca").addClass("hide");
      $("#colaborador").addClass("hide");
      $("#funcionario").addClass("hide");
      $("#botoes").removeClass("hide");

      if ($(this).val() == 0) {
        $("#crianca").removeClass("hide");
      } else if($(this).val() == 1) {
        $("#colaborador").removeClass("hide");
      } else {
        $("#funcionario").removeClass("hide");

      }
    });

    $("#email_func").change(function(){
      var email = $(this).val();

      if(!validateEmail(email)){
        document.getElementById('email_func').value = "";
        return mbox.alert('Endereço de email inválido! Digite novamente.');
      }
    });

    $("#email_colab").change(function(){
      var email = $(this).val();

      if(!validateEmail(email)){
        document.getElementById('email_colab').value = "";
        return mbox.alert('Endereço de email inválido! Digite novamente.');
      }
    });

    $('#senha_func').change(function(e){
      var senha = $(this).val();

      if (senha.length < 6) {
        document.getElementById("senha_func").value = "";
        return mbox.alert("A senha deve conter no mínimo 6 caracteres");
      }
    });

  $('#cadastrar').click(function(e) {
    e.preventDefault();

    var tipo_usuario = $("#tipo_usuario").val();

    if(tipo_usuario == 0){
      var nome = $("#nome").val(),
          nascimento = $("#nascimento").val(),
          sexo = $("#sexo").val(),
          cpf = $("#cpf").val(),
          rg = $("#rg").val(),
          pai = $("#pai").val(),
          mae = $("#mae").val(),
          responsavel = $("#responsavel").val(),
          endereco = $("#endereco").val(),
          bairro = $("#bairro").val(),
          cidade = $("#cidade").val(),
          estado = $("#estado").val(),
          celular = $("#celular").val();

    } else if (tipo_usuario == 1) {
      var nome_colab = $("#nome_colab").val(),
          celular_colab = $("#celular_colab").val(),
          email_colab = $("#email_colab").val();

    } else {
      var nome_func = $("#nome_func").val(),
          cpf_func = $("#cpf_func").val(),
          celular_func = $("#celular_func").val(),
          email_func = $("#email_func").val(),
          senha_func = $("#senha_func").val();


    }

    switch(tipo_usuario){
      case "0":
        $.ajax({
          url: '../engine/controllers/crianca.php',
          data: {
            nome : nome,
            nascimento : nascimento,
            sexo : sexo,
            cpf : cpf,
            rg : rg,
            pai : pai,
            mae : mae,
            responsavel : responsavel,
            endereco : endereco,
            bairro : bairro,
            cidade : cidade,
            estado : estado,
            celular : celular,

            action: 'create'
          },
          success: function(data) {
            if(data === 'true'){
              mbox.alert("Cadastro realizado com sucesso!", function(e){
                window.location = "../index.php";
              });
            }else{
              var $toastContent = $('<span>Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.</span>');
              Materialize.toast($toastContent, 5000, 'rounded');
            }
          },
          type: 'POST'
        });
      
      break;
      
      case "1":
        $.ajax({
          url: '../engine/controllers/colaborador.php',
          data: {
            nome_colab : nome_colab,
            celular_colab : celular_colab,
            email_colab : email_colab,

            action: 'create'
          },
          success: function(data) {
            if(data === 'true'){
              mbox.alert("Cadastro realizado com sucesso!", function(e){
                window.location = "../index.php";
              });
            }else{
              var $toastContent = $('<span>Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.</span>');
              Materialize.toast($toastContent, 5000, 'rounded');
            }
          },
          type: 'POST'
        });
      
      break;

      case "2":
        $.ajax({
          url: '../engine/controllers/funcionario.php',
          data: {
            nome_func : nome_func,
            cpf_func : cpf_func,
            celular_func : celular_func,
            email_func : email_func,
            senha_func : senha_func,

            action: 'create'
          },
          success: function(data) {
            if(data === 'true'){
              mbox.alert("Cadastro realizado com sucesso!", function(e){
                window.location = "../index.php";
              });
            }else{
              var $toastContent = $('<span>Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.</span>');
              Materialize.toast($toastContent, 5000, 'rounded');
            }
          },
          type: 'POST'
        });
      break;
    }

  });
});
</script>