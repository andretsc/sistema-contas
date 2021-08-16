<?php 

class Usuario
{
	public function login($usuario, $senha) 
	{
		global $pdo;

		$sql = $pdo->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND senha = md5(:senha)');
		$sql->bindValue(':usuario', $usuario);
		$sql->bindValue(':senha', $senha);	
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetch();
			$_SESSION['login'] = $dados['id'];
			$_SESSION['userName'] = $dados['nome'];
			return true;
		} 

		return false;

	}

	public function atualizarUsuario($nome, $usuario, $senha)
	{
		global $pdo;
		$sql = $pdo->prepare('UPDATE usuarios SET nome = :nome, usuario = :usuario, senha = md5(:senha) WHERE id = 1');
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':usuario', $usuario);
		$sql->bindValue(':senha', $senha);	

		return $sql->execute();
	}
}
