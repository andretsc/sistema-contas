<?php 

class Conta 
{

	public function listarTipoContas($tipoConta)
	{

		$contas = array();

		global $pdo;

		$sql = null;

		if ($tipoConta != 0) {
			$sql = $pdo->prepare('SELECT * FROM tipo_contas WHERE id = :id');
			$sql->bindValue(':id', $tipoConta);
			
		} else {
			$sql = $pdo->prepare('SELECT * FROM tipo_contas');
		}

		$sql->execute();

		if ($sql->rowCount() > 0) {
			$contas = $sql->fetchAll();
		}

		return $contas;

	}

	public function cadastrarConta($descricao, $valor, $data, $categoria, $tipoConta) 
	{
		
		global $pdo;


		$sql = $pdo->prepare('INSERT INTO tbl_contas (descricao, data, categoria, tipo, valor, status) VALUES (:descricao, :data, :categoria, :tipo, :valor, :status)');
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':data', $data);
		$sql->bindValue(':categoria', $categoria);
		$sql->bindValue(':tipo', $tipoConta);
		$sql->bindValue(':valor', $valor);

		if ($tipoConta == 1) {
			$sql->bindValue(':status', 2);
		} else if ($tipoConta == 2) {
			$sql->bindValue(':status', 4);
		}

		return $sql->execute();
	}

	public function listarTodas($tipoConta)
	{

		$contas = array();

		global $pdo;

		$sql = null;

		if ($tipoConta != 0) {
			$sql = $pdo->prepare('SELECT * FROM tbl_contas WHERE tipo = :tipo');
			$sql->bindValue(':tipo', $tipoConta);
			
		} else {
			$sql = $pdo->prepare('SELECT * FROM tbl_contas');
		}

		$sql->execute();

		if ($sql->rowCount() > 0) {
			$contas = $sql->fetchAll();
		}

		return $contas;

	}

	public function getConta($id)
	{
		$conta = [];

		global $pdo;

		$sql = $pdo->prepare('SELECT * FROM tbl_contas WHERE id = :id');
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$conta = $sql->fetchAll();
			return $conta[0];
		}

		return $conta;
	}

	public function atualizarConta($descricao, $valor, $data, $categoria, $id)
	{
		global $pdo;

		$sql = $pdo->prepare('UPDATE tbl_contas SET descricao = :descricao, data = :data, categoria = :categoria, valor = :valor WHERE id = :id');
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':data', $data);
		$sql->bindValue(':categoria', $categoria);
		$sql->bindValue(':valor', $valor);
		$sql->bindValue(':id', $id);

		return $sql->execute();
	}

	public function excluirConta($id, $tipo)
	{

		global $pdo;

		$sql = $pdo->prepare('DELETE FROM tbl_contas WHERE id = :id AND tipo = :tipo');
		$sql->bindValue(':id', $id);
		$sql->bindValue(':tipo', $tipo);

		return $sql->execute();

	}

	public function atualizarStatusConta($id, $novoStatus)
	{
		global $pdo;

		$sql = $pdo->prepare('UPDATE tbl_contas SET status = :novo_status WHERE id = :id');
		$sql->bindValue(':novo_status', $novoStatus);
		$sql->bindValue(':id', $id);

		return $sql->execute();
	}

	public function getStatusConta($id)
	{
		global $pdo;

		$sql = $pdo->prepare('SELECT status FROM tbl_contas WHERE id = :id');
		$sql->bindValue(':id', $id);

		return $sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		}

		return 0;
	}

}
