<?php
session_start();
include("conexao.php");

// STATEMENTS
// Aqui será feito diversas validações de segurança
// Os dados apenas serão salvos no banco caso todas as validações forem aceitas

/****************************************************/
// validando
$escolher = $_POST['escolher'];
$cpf_cnpj = mysqli_real_escape_string($conexao, trim($_POST['cpf_cnpj']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$razao_social = mysqli_real_escape_string($conexao, trim($_POST['razao_social']));
$identidade = mysqli_real_escape_string($conexao, trim($_POST['identidade']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));

// MD5 é uma criptografia - ele irá criptografar a senha para que não seja mostrada no banco
// É importante a senha e o repetir_senha estarem criptografados na mesma ideia
// Assim um poderá se igualar ao outro na hora de verificar se o usuario digitou as senhas iguais
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$senha_repetir = mysqli_real_escape_string($conexao, trim(md5($_POST['senha_repetir'])));

$logradouro = mysqli_real_escape_string($conexao, trim($_POST['logradouro']));
$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
$complemento = mysqli_real_escape_string($conexao, trim($_POST['complemento']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));

/****************************************************/
//selecionando o total de pessoas (CPF / CNPJ) cadastradas no banco de dados
$sql = "select count(*) as total from tabela_cadastro_usuario where cpf_cnpj = '$cpf_cnpj'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

/****************************************************/
//selecionando o total de emails cadastrados no banco de dados
$sql2 = "select count(*) as total from tabela_cadastro_usuario where email = '$email'";
$result2 = mysqli_query($conexao, $sql2);
$row2 = mysqli_fetch_assoc($result2);

/****************************************************/
// verificando se o usuario digitou em todos os campos
// se não retorna um erro
if(empty($_POST['cpf_cnpj']) || 
	empty($_POST['nome']) || 
	empty($_POST['identidade']) || 
	empty($_POST['telefone']) || 
	empty($_POST['email']) ||
	empty($_POST['senha']) ||
	empty($_POST['senha_repetir']) ||
	empty($_POST['logradouro']) ||
	empty($_POST['numero']) ||
	empty($_POST['complemento']) ||
	empty($_POST['bairro']) ||
	empty($_POST['cidade']) ||
	empty($_POST['estado']) ||
	empty($_POST['cep'])) 
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: cadastro.php');
	exit();
}

/****************************************************/
// verificar se o usuario digitou as senhas iguais para cadastrar
// se não retorna um erro
else if($senha !== $senha_repetir)
{
	$_SESSION['senha_diferente'] = true;
	header('Location: cadastro.php');
	exit;
}

/****************************************************/
//validação de email
//se o usuario não digitar um email válido - retorna um erro
//exemplo de email valido - exemplo@mail.com
else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	$_SESSION['email_invalido'] = true;
	header('Location: cadastro.php');
	exit;
}

/****************************************************/
// validação de email
else if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) === false)
{
	$_SESSION['email_invalido'] = true;
	header('Location: cadastro.php');
	exit;
}


/****************************************************/
//verifica se já existe um usuário cadastrado
//se sim - retorna uma mensagem de erro dizendo que o usuario já existe
if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}


/****************************************************/
//verifica se já existe um email cadastrado
//se sim - retorna uma mensagem de erro dizendo que o email já existe
if($row2['total'] == 1) {
	$_SESSION['email_existe'] = true;
	header('Location: cadastro.php');
	exit;
}


/****************************************************/
//preparando para inserir os dados na tabela
$sql = "INSERT INTO tabela_cadastro_usuario (escolher,cpf_cnpj,nome,razao_social,identidade,telefone,email,senha,logradouro,numero,complemento,bairro,cidade,estado,cep) VALUES ('$escolher','$cpf_cnpj','$nome','$razao_social','$identidade','$telefone','$email','$senha','$logradouro','$numero','$complemento','$bairro','$cidade', '$estado','$cep')";


/****************************************************/
// se tudo ocorreu bem o cadastro é salvo no banco
if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();
// se o cadastro foi tudo bem a tela retorna para a tela de login para o usuário logar
header('Location: index.php');
exit;
?>