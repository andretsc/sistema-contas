<?php 

  require_once 'config.php'; 
  require_once 'pages/header.php';

  if (isset($_SESSION['login'])) {


?>
<div class="container">
	<h2>Atualizar Dados do Usuário</h2>

    
  <?php 

      if (isset($_POST['submit'])) {

        if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])) {


          $nome = addslashes($_POST['nome']);
          $nomeUsuario = addslashes($_POST['usuario']);
          $senha = addslashes($_POST['senha']);

          require_once 'classes/Usuario.php';

          $usuario = new Usuario();


          $atualizou = $usuario->atualizarUsuario($nome, $nomeUsuario, $senha);

          if ($atualizou) {

  ?>

            <div class="alert alert-success">
              Dados do usuário atualizados com sucesso!
            </div>
            <!-- alert -->

  <?php

          } else {

?>

            <div class="alert alert-danger">
              Falha ao atualizar os dados do usuário!
            </div>
            <!-- alert -->

<?php
          }

        } else {
?>
  
    <div class="alert alert-danger">
      Todos os dados devem ser preenchidos!
    </div>
    <!-- alert -->

<?php

        }

      }

  ?>


	<form method="POST">

    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

    <div class="form-group">
      <label for="usuario">Usuário:</label>
      <input type="text" class="form-control" id="usuario" name="usuario" required>
    </div>

    <div class="form-group">
      <label for="senha">Senha:</label>
      <input type="password" class="form-control" id="senha" name="senha" required>
    </div>


    <button type="submit" name="submit" class="btn btn-primary">Atualizar</button>

    <a href="./" class="btn btn-secondary">Voltar</a>
  </form>


</div>

<?php require_once 'pages/footer.php'; ?>

<?php } else { 

    header('Location: ./login.php');
    exit;
 }
?>