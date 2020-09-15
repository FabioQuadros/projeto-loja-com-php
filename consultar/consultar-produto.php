<?php session_start(); ob_start();
    include '../modelo/produto.class.php';
    include '../dao/produtodao.class.php';

    $prodDAO = new ProdutoDAO();
    $array = $prodDAO->buscarProduto();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Camisa 10 Esporte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="../lib/css/style.css" type="text/css">
    <link rel="stylesheet" href="../lib/css/whats.css" type="text/css">
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
      <div class="container-fluid">
        <div class="row">
          <?php if(count($array) !=0):?>
          <?php foreach ($array as $p): ?>
            <div class="col-md-2" id="produtos">
              <div class="div-imagem">
                <img class="imagem" src="../img/<?=$p->imagens?>" alt="<?=$p->nome_produto?>">
              </div>
              <div class="texto-produto">
                <h6><?=$p->nome_produto?></h6>   
                  <p><?=$p->descricao?></p>                 
                  <p><?=$p->valor?></p>                  
                 <a href="https://camisa10sports.000webhostapp.com/consultar/detail.php?amount=<?=$p->valor?>">
                    <button class="btn btn-primary">Comprar</button>
                 </a> 
              </div>
            </div>
          <?php unset($array);?>
          <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="alert alert-info">
          <strong>Não há arquivos(s) para ser(em) exibidos!</strong>
        </div>
         <?php endif; ?>
      </div>
      
    </div>
    <!--botão de contato pelo WhatsApp-->
    <script src="../lib/js/whats.js"></script>
    <div class="wc_whatsapp_app right">
      <a href="https://wa.me/5551995644389" target="_blank" class="wc_whatsapp" >
      </a>
      <a href="https://wa.me/5551995644389" target="_blank" class="wc_whatsapp_secondary" >
        <p>Gostaria de receber informações sobre um produto de vocês, poderia me ajudar?</p>
      </a>
    </div>
    <footer class="container-fluid text-center">
      <p>Loja Online todos os direitos reservados a Camisa 10 Sports Copyright &copy; Fábio Guedes</p>  
    </footer>

    <script src="../lib/js/alertas.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"
      integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g="
      crossorigin="anonymous"></script> 
    <!--api mercado pago-->
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
  </body>
</html>