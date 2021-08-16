<?php 
	
require_once 'config.php';

if (isset($_SESSION['login']) && isset($_GET['id'])) {

	$id = addslashes($_GET['id']);

	if (intval($id) != 0) {

		require_once 'classes/Categoria.php';

		$categoria = new Categoria();

		$excluiu = $categoria->excluirCategoria($id);

		if ($excluiu) {

			$_SESSION['msg'] = '<div class="alert alert-success">Categoria excluída com sucesso!</div>';

		} else {
			if (isset($_SESSION['items_associated'])) {
				$_SESSION['msg'] = '<div class="alert alert-danger">Erro ao excluir categoria! Existe(m) conta(s) associada(s) a ela!</div>';
			} else {
				$_SESSION['msg'] = '<div class="alert alert-danger">Erro ao excluir categoria!</div>';
			}
			
		}

		
		header('Location: ./listar-categorias.php');
		
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

	echo 'Não tá setado!';

}

?>