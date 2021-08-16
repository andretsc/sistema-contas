<?php 

  require_once 'config.php'; 
  require_once 'pages/header.php';

  if (isset($_SESSION['login']) && isset($_GET['id']) && isset($_GET['status']) && isset($_GET['tipo'])) {

    $id = addslashes($_GET['id']);
    $statusParam = addslashes($_GET['status']);
    $tipo = addslashes($_GET['tipo']);

    if (!is_int(intval($id)) || !is_int(intval($statusParam)) || !is_int(intval($tipo))) {

      header('Location: ./');
      exit;

    } 

?>

<div class="container">
  <h2>Atualizar Conta</h2>

  <?php 

    if (isset($_POST['submit'])) {

      if (isset($_POST['status']) && !empty($_POST['status'])) {

        $novoStatus = addslashes($_POST['status']);

        require_once 'classes/Conta.php';

        $conta = new Conta();

        $atualizou = $conta->atualizarStatusConta($id, $novoStatus);

        if ($atualizou) {
  ?>

          <div class="alert alert-success">
            Status da conta atualizado com sucesso!
          </div>
          <!-- alert -->

  <?php
        } else {
  ?>
          <div class="alert alert-danger">
            Erro ao atualizar status da conta!
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
      <?php 
        require_once 'classes/Status.php';
        require_once 'classes/Conta.php';

        $st = new Status();

        $status = $st->getStatusByTipoConta($tipo);

        $conta = new Conta();
        $conta = $conta->getConta($id);
      ?>
      <h1>Conta: <span class="font-weight-light"><?= $conta['descricao'] ?></span></h1>
      <label for="status">Status da Conta:</label>
      <select class="form-control" id="status" name="status" required> 
        <?php foreach ($status as $statusItem): ?>
         <option value="<?= $statusItem['id'] ?>" <?= ($statusItem['id'] == $statusParam) ? 'selected' : ''; ?>><?= $statusItem['status'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>


    <button type="submit" name="submit" class="btn btn-primary">Atualizar</button>
    <a class="btn btn-secondary" role="button" href="listar-contas-a-<?= ($tipo == 1) ? 'pagar' : 'receber' ?>.php">Voltar</a>
  </form>

</div>

<?php require_once 'pages/footer.php'; ?>

<?php } else { 

    header('Location: ./login.php');
    exit;
 }
?>