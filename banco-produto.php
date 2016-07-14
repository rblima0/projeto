<?php require_once("conecta.php");

//função para listar os produtos
function listaProdutos($conexao){
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
	while ($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
		//echo $produto['nome'] . "<br>";
	}
	return $produtos;
}

//função para inserir novos produtos
function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
    return mysqli_query($conexao, $query);
}

//funcao para alterar o produto
function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado){
	$query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
	return mysqli_query($conexao, $query);
}

//função para buscar um produto para altera-lo
function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

//função para remover produtos
function removeProduto($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}