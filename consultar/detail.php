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

      <div class="container" id="carrocel">
      <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="la.jpg" alt="Los Angeles" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="chicago.jpg" alt="Chicago" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="ny.jpg" alt="New York" width="1100" height="500">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
        </div>
      </div>

      <div class="container-fluid">
      <div class="texto-imagem"> 
        <h2>Descrição do produto</h2>
        <p>Buy 50 mobiles and get a gift cardBuy 50 mobiles and get a gift cardBuy 50 mobiles and get a gift card</p>
      </div> 
      <div class="texto-produto">
        <form>
          <label for="fname">Nome:</label>
          <input class="form-control" type="text" placeholder="Nome" id="nomeCamisa">
          <select name="tamanho" class="custom-select custom-select-sm" >
          <option selected>Selecione um tamanho</option>
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
            <option value="GG">GG</option>
          </select>
        </form>
        <div>
          <form action="https://camisa10sports.000webhostapp.com/controllers/paymentController.php" method="POST">
            <script
              src="https://www.mercadopago.com.br/integrations/v1/web-tokenize-checkout.js"
              data-public-key="TEST-859896cb-152f-4214-a011-4a4565e5da77"
              data-transaction-amount="<?=$_GET['amount']?>">
            </script>
          </form>
        </div>
      </div>  
        
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