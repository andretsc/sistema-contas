<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Sistema de Contas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-price-format/2.2.0/jquery.priceformat.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
    .modal-content{
        max-height: 100%; /*altura da modal*/
      }

      .modal-dialog{
         height: 100%; /*altura da view da modal*/
         margin-top: 0;
      }

      .modal-body{
         overflow: auto; /*habilita o overflow no corpo da modal*/
      }
  </style>
  <script type="text/javascript">
    
    $(window).on('resize', function(){
   $this = $('#exampleModal');
   if($this.hasClass('show')){
      var budy = $this.find('.modal-body');
      var temScrol = budy.get(0).scrollHeight > budy.get(0).clientHeight;

      var mdheader = $this.find('.modal-header').outerHeight();
      var mdfooter = $this.find('.modal-footer').outerHeight();
      var mdbody = window.innerHeight-(mdheader+mdfooter);

      $this.find('.modal-body').css({
         'height': temScrol ? mdbody+'px' : 'auto'
      });
   }
});
$('#exampleModal').on('shown.bs.modal', function(){
   $(window).trigger('resize');
});
  </script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="./">Sistema</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <!-- Links -->
    <ul class="navbar-nav">
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Cadastros
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="adicionar-contas-a-pagar.php">Contas a Pagar</a>
          <a class="dropdown-item" href="adicionar-contas-a-receber.php">Contas a Receber</a>
          <a class="dropdown-item" href="adicionar-categorias.php">Categorias de Contas</a>
        </div>
      </li>
    </ul>

     <ul class="navbar-nav">
      <!-- Dropdown -->
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Gestão
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="listar-contas-a-pagar.php">Listar Contas a Pagar</a>
          <a class="dropdown-item" href="listar-contas-a-receber.php">Listar Contas e Receber</a>
          <a class="dropdown-item" href="listar-categorias.php">Listar Categorias</a>
        </div>
      </li>
      <li><a class="nav-link active" href="editar-usuario.php">Editar Usuário</a></li>
      <li><a class="nav-link active" href="sair.php">Sair</a></li>
    </ul>
  </div>
  <!-- collapse -->

  

</nav>
<br>