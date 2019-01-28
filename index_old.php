<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Casa Lar | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/toastr.min.css">
  <link rel="icon" type="image/jpg" href="img/pd2.png"/>
</head>
<body>
  <div class="login-box">
      <img src="img/avatar.png" class="avatar">
      <div style="margin-top: -40px;" class="form">
        <br>
        <p>e-mail</p>
        <input type="text" name="username" id="email_login" placeholder="Digite seu e-mail">
        <p>Senha</p>
        <input type="password" name="senha" id="senha_login" placeholder="Digite sua senha">
        <input type="submit" name="submit" value="Login" id="Logar">
        <br>
        <input type="submit" name="submit" value="Cadastre-se" id="cadastrar">
        <br><br>
      </div>
    </div>
  <script src="js/jquery.js"></script>
  <script src="js/login.js"></script>
  <script src="js/sweetalert.js"></script>
  <script src="js/toastr.min.js"></script>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(e) {
    $('#cadastrar').click(function(e){
      e.preventDefault();
      window.location = 'cadastro/cadastro.php';
    });
  });
</script>