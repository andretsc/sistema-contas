<?php require_once 'config.php'; ?>
<?php if (!isset($_SESSION['login'])) { ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Sistema de Contas - Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <br><br><br><br>
<div class="container" style="max-width: 400px">
    <?php 

      require_once 'classes/Usuario.php';

      $usuario = new Usuario();

      if (isset($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
        $userName = addslashes($_POST['usuario']);
        $senha = addslashes($_POST['senha']);

        if ($usuario->login($userName, $senha)) {
      ?>
        <script>window.location.href = "./";</script>
      <?php
        } else {
  ?>  
    <div class="alert alert-danger">
      Usuário e/ou senha incorretos!
    </div>
    <!-- alert -->
  <?php
        }

      }


    ?>
    <form class="form-signin" method="POST">
      <h1 class="text-center">Entre com seu usuário e senha</h1>
      <label for="usuario">Usuário</label>
      <input type="text" id="usuario" name="usuario" class="form-control" required><br>
      <label for="senha">Senha</label>
      <input type="password" id="senha" name="senha" class="form-control" required><br>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

      <div class="logo text-center">
        <br>
        Desenvolvido por: <br>
        <img src="assets/images/kosmus.png" style="max-width: 50%;" alt="logotipo da kosmus software" title="logotipo da kosmus software">
      </div>
    </form>
</div>
<!--container -->



<?php require_once 'pages/footer.php'; ?>

<?php } else {
    header('Location: ./');
  } 
?>