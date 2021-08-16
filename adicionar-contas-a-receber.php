<?php 

  require_once 'config.php'; 
  require_once 'pages/header.php';

  if (isset($_SESSION['login'])) {

?>

<div class="container">
  <h2>Cadastrar Conta a Receber</h2>

  <?php 

    if (isset($_POST['submit'])) {

      if (isset($_POST['descricao']) && isset($_POST['valor']) && isset($_POST['data'])  && isset($_POST['categoria']) && !empty($_POST['descricao']) && !empty($_POST['valor']) && !empty($_POST['data']) && !empty($_POST['categoria'])) {

        $descricao = addslashes($_POST['descricao']);
        $valor = addslashes($_POST['valor']);

        $valor = str_replace("R$ ", "", $valor);
        $valor = preg_replace('/\./', "", $valor, 1);
        $valor = preg_replace('/\./', ",", $valor, 1);
        $valor = preg_replace('/,/', ".", $valor, 1);

        $data = addslashes($_POST['data']);
        $categoria = addslashes($_POST['categoria']);

        require_once 'classes/Conta.php';

        $contas = new Conta();

        // 2 = Tipo de Conta = Conta a Receber
        if ($contas->cadastrarConta($descricao, $valor, $data, $categoria, 2)) {
  ?>

          <div class="alert alert-success">
            Conta a receber registrada com sucesso!
          </div>
          <!-- alert -->

  <?php
        } else {
  ?>
          <div class="alert alert-danger">
            Erro ao cadastrar conta a receber!
          </div>
          <!-- alert -->
  <?php
        }

      }

    }

  ?>

  <form method="POST">
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <input type="text" class="form-control" id="descricao" name="descricao">
    </div>
    <div class="form-group">
      <label for="valor">Valor:</label>
      <input type="text" class="form-control" id="valor" name="valor">
    </div>

    <div class="form-group">
      <label for="data">Data a Receber:</label>
      <input type="date" class="form-control" id="data" name="data">
    </div>

     <div class="form-group">
      <?php 
        require_once 'classes/Categoria.php';

        $cat = new Categoria();

        $categorias = $cat->listarTodas(2);
      ?>
      <label for="categoria">Categoria da Conta:</label>
      <select class="form-control" id="categoria" name="categoria">
        <?php foreach ($categorias as $categoria): ?>
         <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Cadastrar</button>
    <a href="listar-contas-a-receber.php" class="btn btn-secondary">Voltar</a>
  </form>

</div>

<?php require_once 'pages/footer.php'; ?>

<?php } else { 

    header('Location: ./login.php');
    exit;
 }
?>

<script>
    $('#valor').priceFormat({
      prefix: "R$ ",
      centsSeparator: ",",
      thousandsSeparator: "."
    });
</script>