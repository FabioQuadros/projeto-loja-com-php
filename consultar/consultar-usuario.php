<?php session_start(); ob_start();
if(isset($_SESSION['privateUser'])){
  include_once '../modelo/usuario.class.php';
  $u = unserialize($_SESSION['privateUser']);

  if($u->tipo != 'Adm'){
    header("location:../index.php");
  }
}else{
  header("location:../index.php");
}
include '../dao/usuariodao.class.php';
include_once '../modelo/usuario.class.php';

$uDAO = new UsuarioDAO();
$array = $uDAO->buscarUsuario();

if(isset($_GET['id'])){
  $uDAO = new UsuarioDAO();
  $uDAO->deletarUsuario($_GET['id']);
  header('location:consultar-usuario.php');
  unset($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Consuta de usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1 class="jumbotron bg-info">Consulta</h1>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Sistema</a>
          </div>
          <ul class="nav navbar-nav">
            <?php if (isset($_SESSION['privateUser'])): ?>
              <?php include_once '../modelo/usuario.class.php'; ?>
              <?php $u = unserialize($_SESSION['privateUser']); ?>
              <?php if ($u->tipo == 'Adm'): ?>
                <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="../cadastrar/cadastrar-usuario.php">Cadastrar</a></li>
                <li class="nav-item  active"><a class="nav-link" href="../consultar/consultar-usuario.php">Consultar</a></li>
                <li class="nav-item disabled"><a class="nav-link" href="../filtrar/filtrar-usuario.php">Filtrar</a></li>
            <?php else: ?>
              <li class="active"><a class="nav-link" href="index.php">Home</a></li>
            <?php endif; ?>
            <?php endif; ?>
          </ul>
        </div>
      </nav>
      <?php if (count($array)!=0): ?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Alterar</th>
              <th>Excluir</th>
              <th>Código</th>
              <th>Nome</th>
              <th>Senha</th>
              <th>Tipo</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($array as $u): ?>
              <tr>
                <td><A href="../alterar/alterar-usuario.php?id=<?=$u->idUsuario?>"><i class="fa fa-refresh"></a></td>
                <td><a href="consultar-usuario.php?id=<?=$u->idUsuario?>"><i class="fa fa-trash-o"></a></td>
                <td><?=$u->idUsuario?></td>
                <td><?=$u->login?></td>
                <td><?=$u->senha?></td>
                <td><?=$u->tipo?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <?php else: ?>
        <div class="alert alert-info">
          <strong>Não há arquivos(s) para ser(em) exibidos!</strong>
        </div>
      <?php endif; ?>
    </div>
  </body>
  </body>
</html>
