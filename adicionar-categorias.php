<?php 

  require_once 'config.php'; 
  require_once 'pages/header.php';

  if (isset($_SESSION['login'])) {

?>
<div class="container">
	<h2>Cadastrar Categorias de Contas</h2>

  <?php 

    require_once 'classes/Categoria.php';

    $categoria = new Categoria();

    if (isset($_POST['submit'])) {
      if (isset($_POST['descricao']) && isset($_POST['tipo_categoria']) && !empty($_POST['descricao']) && !empty($_POST['tipo_categoria'])) {

          $descricao = addslashes($_POST['descricao']);
          $tipoConta = addslashes($_POST['tipo_categoria']);

          
          $cadastrou = $categoria->cadastrarCategoria($descricao, $tipoConta);

          if ($cadastrou) {

    ?>

        <div class="alert alert-success">
          Categoria adicionada com sucesso!
        </div>
        <!-- alert -->

    <?php

          } else {
    ?>  
            <div class="alert alert-danger">
              Falha ao adicionar categoria!
            </div>
            <!-- alert -->
    <?php 
          }

        } else {
      ?>

        <div class="alert alert-danger">
          Todos os campos são de preenchimento obrigatório!
        </div>
        <!-- alert -->

      <?php 

        }
    }

    ?>

	<form method="POST">
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <input type="text" class="form-control" id="descricao" name="descricao" required>
    </div>

    <div class="form-group">
      <label for="tipo_categoria">Tipo da Categoria:</label>
      <select class="form-control" id="tipo_categoria" name="tipo_categoria" required>
      	<option value="1">A Pagar</option>
      	<option value="2">A Receber</option>
      </select>
    </div>


    <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
    <a href="listar-categorias.php" class="btn btn-secondary">Voltar</a>
  </form>


</div>

<?php require_once 'pages/footer.php'; ?>

<?php } else { 

    header('Location: ./login.php');
    exit;
 }
?>