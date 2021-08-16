<?php 
	
require_once 'config.php';

if (isset($_SESSION['login']) && isset($_GET['id']) && isset($_GET['tipo'])) {

	$id = addslashes($_GET['id']);
	$tipo = addslashes($_GET['tipo']);

	if (intval($id) != 0 && intval($tipo) != 0) {

		require_once 'classes/Conta.php';

		$conta = new Conta();

		$excluiu = $conta->excluirConta($id, $tipo);

		if ($excluiu) {

			$_SESSION['msg'] = '<div class="alert alert-success">Conta excluída com sucesso!</div>';

		} else {
			$_SESSION['msg'] = '<div class="alert alert-danger">Erro ao excluir conta!</div>';
		}

		if ($tipo == 1) {
			header('Location: ./listar-contas-a-pagar.php');
		} else if ($tipo == 2) {
			header('Location: ./listar-contas-a-receber.php');
		} else {
			header('Location: ./');
		}

		exit;
	} else {
?>

	<script>
		//alert('ID inválido!');
		window.location.href = './';
	</script>

<?php
	}

} else {

	header('Location: ./');
	exit;

}
