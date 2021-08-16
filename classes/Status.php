<?php 

class Status 
{

	public function getStatusById($id)
	{
		$status = [];

		global $pdo;

		$sql = $pdo->prepare('SELECT * FROM tbl_status WHERE id = :id');
		$sql->bindValue(':id', $id);

		$sql->execute();

		if ($sql->rowCount() > 0) {
			$status = $sql->fetch();
		}	

		return $status;
	}

	public function getStatusByTipoConta($tipoConta)
	{
		$status = [];

		global $pdo;

		$sql = $pdo->prepare('SELECT * FROM tbl_status WHERE tipo_conta = :tipo_conta');
		$sql->bindValue(':tipo_conta', $tipoConta);

		$sql->execute();

		if ($sql->rowCount() > 0) {
			$status = $sql->fetchAll();
		}	

		return $status;
	}

}
