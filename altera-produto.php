<?php require_once("cabecalho.php");
require_once("banco-produto.php");

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
if(array_key_exists('usado', $_POST)){
	$usado = "true";
}else{
	$usado = "false";
}
$id = $_POST['id'];


if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)){ ?>
	<p class="alert-success">O Produto <?=$nome?>, <?=$preco?> foi alterado com sucesso!</p>
<?php } else {
	$msg = mysqli_error($conexao);
?>
	<p class="alert-danger">O produto <?=$nome?> não foi alterado.<br><?=$msg?></p>
<?php
}
?>

<?php include ("rodape.php"); ?>