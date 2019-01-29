$(document).ready(function(e) {
  $('#Logar').click(function(e) {
    var email = $('#email_login').val();
    var senha = $('#senha_login').val();

    if(email === "" || senha === "") {
     swal("Atenção!", "Todos os campos devem ser preenchidos!", "info");
   } else {
     $.ajax({
      url: '../engine/controllers/login.php',
      data: {
       email : email,
       senha : senha
     },
     success: function(data) {
      console.log(data);
      if(data === 'true') {
        toastr.info('Redirecionando...<br>&nbsp', 'Login efetuado com sucesso!', {positionClass: 'toast-top-full-width',
    progressBar: true,
    timeOut: "2500",});
        setTimeout(function() {
          document.location.href = '../';
        }, 2600);
      } else if(data === 'no_user_found') {
        swal("Atenção!", "Usuário não encontrado!", "error");
      } else if(data === 'wrong_password') {
        swal("Atenção!", "Senha incorreta", "error");
      } else {
        swal("Atenção!", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!", "error");
      }
    },
    type: 'POST'
  });
   }
 });

  $('#senha_login').keypress(function (e) {
    var key = e.which;
    if(key == 13){
     $('#Logar').click();
     return false;
   }
 });
});