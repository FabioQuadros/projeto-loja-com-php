<?php session_start(); ob_start();
if(isset($_SESSION['privateUser'])){
    include_once '../modelo/usuario.class.php';
    $u = unserialize($_SESSION['privateUser']);
  }else{
    header("location:../index.php");
  }

  if(isset($_POST['cadastrar'])){
    include '../modelo/produto.class.php';
    include '../dao/produtodao.class.php';

    //padronizando os dados da imagem
    $imagens = $_FILES['txtimagens'];
    //informando os formatos de arquivos permitidos
    $formatosPermitidos = array("png","jpg","jpeg");
    $extencao = pathinfo($_FILES['txtimagens']['name'], PATHINFO_EXTENSION);
    
    //testa o nome da extensão e se esta com os formatos permitidos 
    if (in_array($extencao, $formatosPermitidos)) {
      $pasta = "../img/"; //caminho onde ficaram os arquivos
      $temporario = $_FILES['txtimagens']['tmp_name'];//pega o nome da variavel e seta um novo nome temporario
      $novoNome = uniqid().".$extencao";//gera um novo nome e une com a extensão
     
      //testa se carregou com sucesso e  
     if(move_uploaded_file($temporario, $pasta.$novoNome)){
       header("location:../consultar/consultar-produto.php");//se sim reinderiza para a pagina de consulta
     } else {//senão inderiza erro
      echo "Not uploaded because of error #".$_FILES["file"]["error"];
        '<script>
          alert(console.log(Not uploaded because of error #".$_FILES["file"]["error"]));
        </script>';
      }

    }else{
      echo "Arquivo invalido";
    }
    //padronizando os dasdos
    $nome_produto = $_POST['txtnomeProd'];
    $valor = $_POST['valor'];
    $nome_personalizado = $_POST['txtnomePerso'];
    $tamanho = $_POST['txttamanho'];
    $descricao = $_POST['txtdesc'];
    $tipo = $_POST['txttipo'];

    //validando
    $p = new produto();
    $p->nome_produto = $nome_produto;
    $p->valor = $valor;
    $p->nome_personalizado = $nome_personalizado;
    $p->imagens = $novoNome;
    $p->tamanho = $tamanho;
    $p->descricao = $descricao;
    $p->tipo = $tipo;

    $pDAO = new ProdutoDAO();
    $pDAO->cadastrarProduto($p);
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Camisa 10 Esporte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../lib/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <div class="container-fluid" id="corpo">      
    <!-- menu -->
    <nav class="navbar navbar-expand-md fixed-top container-fluid">
       <a href="../index.php" class="navbar-brand">
          <img src="../img/img-logo2.jpg" alt="logo" style="width:60px;">
        </a>
        <button class="navbar-toggler menutg" type="button" data-toggle="collapse" data-target="#menubtn">
          <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="menubtn">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="../consultar/consultar-produto.php">Produtos</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Ofertas</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Lojas</a></li>
            <li class="nav-item"><a class="nav-link" href="../lib/contato.php">Contato</a></li>
          </ul>
        </div>  
      </nav>
    
    <div class="container">
        <form action=""  method="post" name="cadprod" enctype="multipart/form-data">
            <div class="form-group">
             <input type="text" class="form-control" name="txtnomeProd" placeholder="Nome do Poduto"  >
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="valor" placeholder="Valor">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txtnomePerso" placeholder="nome personalizado">
            </div>

            <div class="form-group">
                <select name="txttamanho" class="custom-select custom-select-sm" >
                    <option selected>Selecione um tamanho</option>
                    <option value="P">P</option>
                    <option value="M">M</option>
                    <option value="G">G</option>
                </select>
            </div>

            <div class="form-group custom-file mb-3">
            
                <input type="file" id="customFile" multiple class="custom-file-input" name="txtimagens" placeholder="imagens">
                <label class="custom-file-label" for="customFile">Escolher Arquivo</label>
            </div>

            <div class="form-group">
              <textarea  class="form-control"  name="txtdesc" placeholder="Escreva uma descrição" required cols="30" rows="10"></textarea>
              
            </div>

            <div class="form-group">
              <input type="text" class="form-control" name="txttipo" placeholder="tipo">
            </div> 
            <div class="form-group">
              <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success">
              <input type="reset" name="limpar" value="Limpar" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script src="../lib/js/alertas.js"></script>
    <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"
    integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g="
    crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  </body>
</html>
