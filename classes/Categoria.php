<?php 

class Categoria 
{
	public function listarTodas($tipoConta) {
		$categorias = array();

		global $pdo;

		$sql = null;

		if ($tipoConta != 0) {
			$sql = $pdo->prepare('SELECT * FROM tbl_categorias WHERE tipo_conta = :tipo_conta');
			$sql->bindValue(':tipo_conta', $tipoConta);
			
		} else {
			$sql = $pdo->prepare('SELECT * FROM tbl_categorias');
		}

		$sql->execute();

		if ($sql->rowCount() > 0) {
			$categorias = $sql->fetchAll();
		}

		return $categorias;
	}

	public function cadastrarCategoria($descricao, $tipoConta)
	{

		global $pdo;

		$sql = $pdo->prepare('INSERT INTO tbl_categorias (nome, tipo_conta) VALUES (:nome, :tipo_conta)');
		$sql->bindValue(':nome', $descricao);
		$sql->bindValue(':tipo_conta', $tipoConta);
		return $sql->execute();
	}

	public function getCategoria($id)
	{
		$categoria = [];

		global $pdo;

		$sql = $pdo->prepare('SELECT * FROM tbl_categorias WHERE id = :id');
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$categoria = $sql->fetchAll();
			return $categoria[0];
		}

		return $categoria;
	}

	public function atualizarCategoria($nome, $id)
	{
		global $pdo;

		$sql = $pdo->prepare('UPDATE tbl_categorias SET nome = :nome WHERE id = :id');
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':id', $id);

		return $sql->execute();
	}

	public function excluirCategoria($id)
	{

		global $pdo;

		$sql = $pdo->prepare('SELECT * FROM tbl_contas WHERE categoria = :id');
		$sql->bindValue(':id', $id);

		if($sql->execute()) {
			if ($sql->rowCount() == 0) {
				$sql = $pdo->prepare('DELETE FROM tbl_categorias WHERE id = :id');
				$sql->bindValue(':id', $id);
				return $sql->execute();
			}
			$_SESSION['items_associated'] = true;
			return false;
		}
	}
}
