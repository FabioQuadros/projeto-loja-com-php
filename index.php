<?php session_start(); ob_start();
if(isset($_POST['entrar'])){

  include_once 'modelo/usuario.class.php';
  include 'dao/usuariodao.class.php';

  //padronizacao
  $login = $_POST['txtlogin'];
  $senha = $_POST['txtsenha'];

  //validacao
  $u = new Usuario();
  $u->login = $login;
  $u->senha = $senha;

  $uDAO = new UsuarioDAO();
  $usuario = $uDAO->verificarUsuario($u);

  if($usuario && !is_null($usuario)){
    $_SESSION['privateUser'] = serialize($usuario);
    header("location:index.php");
  }else{

    echo "<div class='alert alert-danger'>
            <strong>Não existe usuário no banco!</strong>
          </div>";
  }
 unset($_POST['entrar']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="lib/css/whats.css" type="text/css">
    <link rel="stylesheet" href="lib/css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container-fluid" id="corpo">
      <?php if (isset($_SESSION['privateUser'])): ?>
        <?php include_once 'modelo/usuario.class.php'; ?>
        <?php $u = unserialize($_SESSION['privateUser']); ?>
          <!-- formulário do botão de deslogar--->
            <form name="deslogar" class="form-group" action="" method="post">
              <div class="form-group">
                <!-- div do botão de deslogar--->
              <input type="submit" name="deslogar" class="btn btn-primary" value="Deslogar">
              </div>
            </form>
          </h1>
      <?php endif; ?>
        
      <?php if (isset($_SESSION['privateUser'])): ?>
         <!-- se existe usuário-->
          <?php include_once 'modelo/usuario.class.php'; ?><!-- inclue a classe do usuário -->
          <?php $u = unserialize($_SESSION['privateUser']); ?> <!-- serializa a variavel -->
          <?php if ($u->login !== ''): ?>
          <link rel="stylesheet" href="lib/css/style.css" type="text/css">
       <!-- menu -->
       <nav class="navbar navbar-expand-md fixed-top container-fluid">
          <a href="index.php" class="navbar-brand">
            <img src="img-logo2.jpg" alt="logo" style="width:60px;">
          </a>
          <button class="navbar-toggler menutg" type="button" data-toggle="collapse" data-target="#menubtn">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="menubtn">
            <ul class="navbar-nav">
            
                <!-- mosta todo o menu pro usuário-->
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="consultar/consultar-produto.php">Produtos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ofertas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Lojas</a></li>
                <li class="nav-item"><a class="nav-link" href="lib/contato.php">Contato</a></li>
              <?php endif; ?>
            <?php endif; ?>
            </ul>
          </div>  
        </nav>
      <?php if (isset($_SESSION['privateUser'])): ?>
        <div class="container">
          <h2>Funções de trabalho</h2>
          <div class="list-group">
            <a href="consultar/consultar-produto.php" class="list-group-item">
              <h4 class="list-group-item-heading">Produtos</h4>
              <p class="list-group-item-text">Consultar Produtos</p>
            </a>
            <a href="cadastrar/cadastrar-produto.php" class="list-group-item">
              <h4 class="list-group-item-heading">cadastrar</h4>
              <p class="list-group-item-text">Clique aqui para seguir cadastros de produtos</p>
            </a>
            <a href="#" class="list-group-item disabled">
              <h4 class="list-group-item-heading">Clientes</h4>
              <p class="list-group-item-text">Clique aqui para seguir em funções dos clientes</p>
              <a href="#" class="list-group-item disabled" >
                <h4 class="list-group-item-heading">Usuários</h4>
                <p class="list-group-item-text">Clique aqui para seguir em funções dos usuários</p>
            </a>
          </div>
        </div>
      <?php endif; ?>

      <?php if (isset($_POST['deslogar'])): ?>
        <?php unset($_SESSION['privateUser']); ?>
        <?php header("location:index.php"); ?>
      <?php endif; ?>

      <?php if (!isset($_SESSION['privateUser'])): ?>
        <!-- INICIO LOGIN -->
        <div class="container-fluid">
          <div class="titulo">
            <h1>Camisa 10 Sports</h1>
            <h2>Sistema de Gestão de Produtos</h2>
          </div>
        
          <div class="container" id="login">              
            <form name="login" action="" method="post">
              <label for="txtlogin">nome de usuário</label>
              <div class="form-group form-inline"> 
                <input type="text" name="txtlogin" placeholder="Nome de usuário" class="form-control">
              </div>
              <label for="txtsenha">senha:</label>
              <div class="form-group form-inline">
                <input type="password" name="txtsenha" placeholder="Senha" class="form-control">
              </div>
              <div class="form-group form-inline">
                <input type="submit" name="entrar" value="Entrar" class="btn btn-success">
                <input type="reset" name="limpar" value="Limpar" class="btn btn-primary">
              </div>
            </form>
          </div>
          <div class="container" id="img-login">
            <img src="img-logo.jpg" alt="logo">
          </div>
         </div>
      <?php endif; ?>
    </div>
  </body>
  <script src="lib/js/alertas.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"
      integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g="
      crossorigin="anonymous"></script> 
</html>