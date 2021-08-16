<?php 

  require_once 'config.php'; 
  require_once 'pages/header.php';

  if (isset($_SESSION['login'])) {

?>

<div class="container">
			
	<h2>Listagem de Categorias de Contas</h2><br>

  <?php 

    if (isset($_SESSION['msg'])) {

        echo $_SESSION['msg'];

        unset($_SESSION['msg']);

    }

  ?>
    
  <div class="nova" style="margin-bottom: 20px; display: flex; justify-content: flex-end;">
    <a href="adicionar-categorias.php" class="btn btn-primary">Adicionar Categoria</a>
  </div>
  <!-- nova -->

	<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Descrição da Categoria</th>
        <th>Tipo de Conta</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php 

        require_once 'classes/Categoria.php';
        require_once 'classes/Conta.php';
        $contas = new Conta();
        $cat = new Categoria();

        $categorias = $cat->listarTodas(0);

        foreach ($categorias as $categoria) :
      ?>
        <tr>
          <td><?= $categoria['id'] ?></td>
          <td><?= $categoria['nome'] ?></td>
          <td>

            <?php   

              $contasSelecionarTipo = $contas->listarTipoContas($categoria['tipo_conta']);
              $tipoConta = $contasSelecionarTipo[0]['descricao'];
            ?>

            <?= $tipoConta ?>
            

          </td>
          <td>
          	<a class="btn btn-success" href="editar-categorias.php?id=<?= $categoria['id'] ?>">Editar</a>&nbsp;
          	<a class="btn btn-danger" href="excluir-categorias.php?id=<?= $categoria['id'] ?>" onclick="return confirm('Deseja realmente exluir esta categoria?')">Excluir</a>
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