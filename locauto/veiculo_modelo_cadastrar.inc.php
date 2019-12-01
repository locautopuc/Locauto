
<?php
session_start();
include("conexao.php");

// STATEMENTS
// Aqui será feito diversas validações de segurança
// Os dados apenas serão salvos no banco caso todas as validações forem aceitas

/****************************************************/
// validando
$marca = mysqli_real_escape_string($conexao, trim($_POST['marca']));
$modelo = mysqli_real_escape_string($conexao, trim($_POST['modelo']));
$ID_marca = mysqli_real_escape_string($conexao, trim($_POST['ID_marca']));


/****************************************************/
//selecionando o total de marcas cadastradas no banco de dados
$sql = "select count(*) as total from tabela_cadastro_veiculo_modelo where modelo = '$modelo'";
//$sql = "select count(*) as total from tabela_cadastro_veiculo_modelo JOIN tabela_cadastro_veiculo_marca ON tabela_cadastro_veiculo_modelo.ID_modelo = tabela_cadastro_veiculo_marca.ID_marca";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);


/****************************************************/
// verificando se o usuario digitou em todos os campos
// se não retorna um erro
if(empty($_POST['modelo'])) 
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_modelo_cadastro.php');
	exit();
}

if(empty($_POST['marca'])) 
{
	$_SESSION['obrigatorio_selecionar'] = true;
	header('Location: veiculo_modelo_cadastro.php');
	exit();
}


/****************************************************/
// verificando se está sendo digitado apenas letras e/ou numeros
else if (empty($_POST["modelo"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_modelo_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $modelo))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: veiculo_modelo_cadastro.php');
	exit();
}


/****************************************************/
//verifica se já existe um modelo cadastrada
//se sim - retorna uma mensagem de erro dizendo que o modelo já existe
if($row['total'] == 1) {
	$_SESSION['modelo_existe'] = true;
	header('Location: veiculo_modelo_cadastro.php');
	exit;
}


/****************************************************/
//preparando para inserir os dados na tabela
$sql = "INSERT INTO tabela_cadastro_veiculo_modelo (ID_marca,modelo) SELECT tabela_cadastro_veiculo_marca.ID_marca, '$modelo' FROM tabela_cadastro_veiculo_marca WHERE tabela_cadastro_veiculo_marca.ID_marca = $marca";



/****************************************************/
// se tudo ocorreu bem o cadastro é salvo no banco
if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}
	


$conexao->close();
// se o cadastro foi tudo bem a tela retorna para a tela de perfil do funcionario
header('Location: veiculo_modelo_cadastro.php');
exit;
?>