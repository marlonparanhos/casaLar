 <?php
	//Para exibir erros
 setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
 date_default_timezone_set('America/Sao_Paulo');
 $showerros = true;
 if($showerros) {
   ini_set("display_errors", $showerros);
   error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
 }
 ?>

 <!DOCTYPE html>
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
  <link rel = "shortcut icon" type = "image/x-icon" href = "../img/favicon.ico "/>
  <title>Login :: PROACE/DASA</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="../css/login.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <meta name="theme-color" content="#4db6ac">
</head>

<style type="text/css" media="screen">
body{
  /*background-image: url('https://i.imgur.com/mBdct1D.jpg');*/
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  transition: background 0.5s ease-in-out;
  -webkit-transition: background 0.5s ease-in-out;
}
</style>

<body>
  <div id="login">
    <p style="color: #ddd; font-size: 0.8em; text-align: center; padding: 1em; margin-top: 2em;">Sistema de Serviços Online da Diretoria de Atenção à Saúde e Acessibilidade </p>
    <img src="http://proace.ufvjm.edu.br/dasa/img/proace.jpg" id="logo"/>
    <input type="text" id="email_login" placeholder="Login"/>
    <input type="password" id="senha_login"  placeholder="Senha"/>
    <button id="Logar" type="submit">Entrar</button>

    <p style="font-size: 0.85em; text-align: center;"> <a href="#" id="cadastrar" >Cadastrar-se </a> <br> <a href="esqueci_senha.php" style="color: #999;">Esqueci minha senha </a> <br> <a href="tutorial_user.pdf" target="_blank" style="color: #e74c3c;">Tutorial  </a> <br> <a href="duvida.php" target="_blank">  Fale conosco</a> </p>

    <div id="footer-login">
     <p><small>Campus JK. Rodovia MGT 367 - km 583, nº 5000 – Alto da Jacuba. Diamantina-MG. CEP: 39100-000. <br>
     PABX: (38) 3532-6871</small></p></div>
   </div>
 </div>

 <div hidden id="ip"></div>
 <div hidden id="city"></div>
 <div hidden id="region"></div>
 <div hidden id="country"></div>
 <div hidden id="org"></div>

 <div id="info">
  <div style="padding: 0.5em;">

  </div>
</div>

</body>
</html>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script src="../js/login.js"></script>
<script>
  // PONTO DE CONTROLE -LOGINs EFETUADOS
  $.get('https://ipinfo.io', function(response){
    $("#ip").html(response.ip);
    $("#city").html(response.city);
    $("#region").html(response.region);
    $("#country").html(response.country);
    $("#org").html(response.org);
  }, 'jsonp');

  $(document).ready(function(e) {
    $('#cadastrar').click(function(e) {
      e.preventDefault();
      window.location.href = '../cadastro/selecionar.php';
    });
  });

  var backgrounds = [
    "https://i.imgur.com/mBdct1D.jpg",
    "https://wallpapercave.com/wp/UQrVgBv.jpg",
    "http://sfwallpaper.com/images/full-hd-landscape-wallpaper-13.jpg",
    "https://stmed.net/sites/default/files/landscape-wallpapers-27931-9332967.jpg",
    "https://i.pinimg.com/originals/69/8e/0a/698e0a7a3fc8a49bc13a7f408e6fb8a0.jpg",
    "https://images.wallpaperscraft.com/image/park_hungary_autumn_landscape_86238_1920x1080.jpg"
  ];

  //inicia a pagina com uma imagem aleatoria
  var num =  Math.floor(Math.random() * (6 - 0)) + 0;
  document.body.style.backgroundImage = 'url(' + backgrounds[num] + ')';
  
  //altera as imagens de forma aleatoria
  window.setInterval(change_wallpaper, 10000);
  function change_wallpaper() {
    var num =  Math.floor(Math.random() * (5 - 0)) + 0;
    //window.alert(backgrounds[num]);

    document.body.style.backgroundImage = 'url(' + backgrounds[num] + ')';
  }
  //clearInterval(intervalo);

</script>