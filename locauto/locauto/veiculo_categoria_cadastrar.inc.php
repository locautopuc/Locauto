
<?php
session_start();
include("conexao.php");

// STATEMENTS
// Aqui será feito diversas validações de segurança
// Os dados apenas serão salvos no banco caso todas as validações forem aceitas



/*$categoria=$_POST["categoria"];
  $result=mysql_query("select * FROM tabela_cadastro_veiculo where categoria='{$categoria['ID_categoria']}' ");
  while($categoria=mysql_fetch_array($result)){
   echo"<option value=$categoria[categoria]>$venue[categoria]</option>";

 }*/



/****************************************************/
// validando
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));


/****************************************************/
//selecionando o total de marcas cadastradas no banco de dados
$sql = "select count(*) as total from tabela_cadastro_veiculo_categoria where categoria = '$categoria'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);


/****************************************************/
// verificando se o usuario digitou em todos os campos
// se não retorna um erro
if(empty($_POST['categoria'])) 
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_categoria_cadastro.php');
	exit();
}


/****************************************************/
// verificando se está sendo digitado apenas letras e/ou numeros
else if (empty($_POST["categoria"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_categoria_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $categoria))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: veiculo_categoria_cadastro.php');
	exit();
}


/****************************************************/
//verifica se já existe uma categoria cadastrada
//se sim - retorna uma mensagem de erro dizendo que a categoria já existe
if($row['total'] == 1) {
	$_SESSION['categoria_existe'] = true;
	header('Location: veiculo_categoria_cadastro.php');
	exit;
}


/****************************************************/
//preparando para inserir os dados na tabela
$sql = "INSERT INTO tabela_cadastro_veiculo_categoria (categoria) VALUES ('$categoria')";


/****************************************************/
// se tudo ocorreu bem o cadastro é salvo no banco
if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}
	


$conexao->close();
// se o cadastro foi tudo bem a tela retorna para a tela de login para o usuário logar
header('Location: veiculo_categoria_cadastro.php');
exit;
?>