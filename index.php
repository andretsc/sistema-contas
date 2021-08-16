<?php 

require_once 'config.php';

if (isset($_SESSION['login'])) {

?>

<?php require_once 'pages/header.php'; ?>


<div class="container">
	
	<div class="jumbotron">
	  <h1>Bem-vindo(a), <?= $_SESSION['userName'] ?></h1>
	  <p>Pronto(a) para colocar suas finanças em dia?</p>
	</div>

</div>
<!-- conteiner -->

<?php require_once 'pages/footer.php'; ?>

<?php } else {

	header('Location: ./login.php');
	exit;

}
?>
