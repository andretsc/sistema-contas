<?php 

  require_once 'config.php'; 
  require_once 'pages/header.php';

  if (isset($_SESSION['login']) && isset($_GET['id'])) {

    $id = addslashes($_GET['id']);

    if (is_int(intval($id))) {

        require_once 'classes/Conta.php';
        $contas = new Conta();
        $contaAtualizar = $contas->getConta($id);

    } else {
      header('Location: ./');
      exit;
    }

?>

<div class="container">
  <h2>Atualizar Conta</h2>

  <?php 

    if (isset($_POST['submit'])) {

      if (isset($_POST['descricao']) && isset($_POST['valor']) && isset($_POST['data'])  && isset($_POST['categoria']) && !empty($_POST['descricao']) && !empty($_POST['valor']) && !empty($_POST['data']) && !empty($_POST['categoria'])) {

        $descricao = addslashes($_POST['descricao']);
        $valor = addslashes($_POST['valor']);
        $data = addslashes($_POST['data']);
        $categoria = addslashes($_POST['categoria']);

        if ($contas->atualizarConta($descricao, $valor, $data, $categoria, $id)) {
  ?>

          <div class="alert alert-success">
            Conta a pagar atualizada com sucesso!
          </div>
          <!-- alert -->

  <?php
        } else {
  ?>
          <div class="alert alert-danger">
            Erro ao atualizar conta a pagar!
          </div>
          <!-- alert -->
  <?php
        }

      } else {
  ?>
        <div class="alert alert-danger">
            Todos os campos devem ser preenchidos!
          </div>
          <!-- alert -->
  <?php 
      }

    }

  ?>

  <form method="POST">
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $contaAtualizar['descricao'] ?>" required>
    </div>
    <div class="form-group">
      <label for="valor">Valor:</label>
      <input type="text" class="form-control" id="valor" name="valor" value="<?= $contaAtualizar['valor'] ?>" required>
    </div>

    <div class="form-group">
      <label for="data">Data a Pagar:</label>
      <input type="date" class="form-control" id="data" name="data" value="<?= $contaAtualizar['data'] ?>" required>
    </div>

    <div class="form-group">
      <?php 
        require_once 'classes/Categoria.php';

        $cat = new Categoria();

        $categorias = $cat->listarTodas($contaAtualizar['tipo']);
      ?>
      <label for="categoria">Categoria da Conta:</label>
      <select class="form-control" id="categoria" name="categoria" required> 
        <?php foreach ($categorias as $categoria): ?>
      	 <option value="<?= $categoria['id'] ?>" <?= ($contaAtualizar['categoria'] === $categoria['id']) ? 'selected' : ''; ?>><?= $categoria['nome'] ?></option>
        <?php endforeach; ?>
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