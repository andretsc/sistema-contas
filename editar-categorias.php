<?php 

  require_once 'config.php'; 
  require_once 'pages/header.php';

  if (isset($_SESSION['login']) && isset($_GET['id'])) {

    $id = addslashes($_GET['id']);

    if (is_int(intval($id))) {

        require_once 'classes/Categoria.php';
        $categoria = new Categoria();
        $categoriaAtualizar = $categoria->getCategoria($id);

    } else {
      header('Location: ./');
      exit;
    }

?>
<div class="container">
	<h2>Atualizar Categoria de Conta</h2>

  <?php 

    require_once 'classes/Categoria.php';

    $categoria = new Categoria();

    if (isset($_POST['submit'])) {
      if (isset($_POST['nome']) && !empty($_POST['nome'])) {

          $nome = addslashes($_POST['nome']);
          
          $atualizou = $categoria->atualizarCategoria($nome, $id);

          if ($atualizou) {

    ?>

        <div class="alert alert-success">
          Categoria atualizada com sucesso!
        </div>
        <!-- alert -->

    <?php

          } else {
    ?>  
            <div class="alert alert-danger">
              Falha ao atualizar categoria!
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
      <label for="nome">Descrição:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?= $categoriaAtualizar['nome'] ?>" required>
    </div>

    <div class="form-group">
      <label for="tipo_categoria">Tipo da Categoria:</label>
      <select disabled class="form-control" id="tipo_categoria" name="tipo_categoria" required>
      	<option value="1">A Pagar</option>
      	<option value="2">A Receber</option>
      </select>
    </div>


    <button type="submit" name="submit" class="btn btn-primary">Atualizar</button>
  </form>


</div>

<?php require_once 'pages/footer.php'; ?>

<?php } else { 

    header('Location: ./login.php');
    exit;
 }
?>