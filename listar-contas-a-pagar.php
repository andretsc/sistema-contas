<?php 

  require_once 'config.php'; 
  require_once 'pages/header.php';

  if (isset($_SESSION['login'])) {

?>
<div class="container">
			
	<h2>Listagem de Contas a Pagar</h2><br>

  <?php 

    if (isset($_SESSION['msg'])) {

        echo $_SESSION['msg'];

        unset($_SESSION['msg']);

    }

  ?>

  <div class="nova" style="margin-bottom: 20px; display: flex; justify-content: flex-end;">
    <a href="adicionar-contas-a-pagar.php" class="btn btn-primary">Adicionar Conta a Pagar</a>
  </div>
  <!-- nova -->

	<table class="table table-responsive table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome da Conta</th>
        <th>Categoria</th>
        <th>Valor</th>
        <th>Data a Pagar</th>
        <th>Status</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php 

        require_once 'classes/Conta.php';

        $contas = new Conta();

        $todasAsContas = $contas->listarTodas(1);

        foreach($todasAsContas as $conta) :
      ?>
        <tr <?=  ((strtotime(date('Y-m-d')) > strtotime($conta['data'])) && $conta['status'] == 2) ? 'class="table-danger"': '' ?> >
          <td><?= $conta['id'] ?></td>
          <td><?= $conta['descricao'] ?></td>
          <td>
            <?php 
              require_once 'classes/Categoria.php';

              $categoria = new Categoria();

              $cat = $categoria->getCategoria($conta['categoria']);
            ?>
            <?= $cat['nome'] ?>
          </td>
          <td>R$ <?= number_format($conta['valor'],2, ',', '.') ?></td>
        
          <td><?= date('d/m/Y', strtotime($conta['data'])) ?></td>
 
          <td>
            
            <?php 

              require_once 'classes/Status.php';

              $status = new Status();

              $status = $status->getStatusById($conta['status']);

              echo $status['status'];

            ?>

          </td>
          <td>
          	<a class="btn btn-success" href="editar-contas.php?id=<?= $conta['id'] ?>">Editar</a>&nbsp;
          	<a class="btn btn-danger" href="excluir-contas.php?id=<?= $conta['id'] ?>&tipo=<?= $conta['tipo'] ?>" onclick="return confirm('Deseja realmente exluir esta conta?')">Excluir</a>&nbsp;
          	<a class="btn btn-info" href="editar-status.php?id=<?= $conta['id'] ?>&status=<?= $conta['status'] ?>&tipo=<?= $conta['tipo'] ?>">Status</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>


</div>
<!--container -->

 <?php require_once 'pages/footer.php'; ?>

 <?php } else { 

    header('Location: ./login.php');
    exit;
 }
?>