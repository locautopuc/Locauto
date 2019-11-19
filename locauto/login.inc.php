<?php
session_start();
include('conexao.php');


// STATEMENTS
// Aqui será feito diversas validações de segurança
// Os dados apenas serão salvos no banco caso todas as validações forem aceitas


/*if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}*/



/****************************************************/
// validando
$cpf_cnpj = mysqli_real_escape_string($conexao, $_POST['cpf_cnpj']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);

// selecionando os dados de cpf ou cnpj e a senha criptografada no banco
$query = "select * from tabela_cadastro_usuario where cpf_cnpj = '{$cpf_cnpj}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

/****************************************************/
// o usuário deve digitar a senha
if(!empty($_POST['cpf_cnpj']) && empty($_POST['senha']))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: index.php');
	exit();
}

/****************************************************/
// o usuário deve digitar o cpf ou cnpj
else if(empty($_POST['cpf_cnpj']) && !empty($_POST['senha']))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: index.php');
	exit();
}

/****************************************************/
// o usuário deve digitar nos dois campos
else if(empty($_POST['cpf_cnpj']) && empty($_POST['senha']))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: index.php');
	exit();
}

/****************************************************/
// se o usuário existir no cadastro deixa ele logar
if($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['cpf_cnpj'] = $usuario_bd['cpf_cnpj'];
	// SESSION NOME usado apenas para mostrar o nome do usuário no perfil atravez do cpf ou cnpj
	$_SESSION['nome'] = $usuario_bd['nome'];
	// SESSION ESCOLHER usado apenas para mostrar o TIPO do usuário no perfil atravez do cpf ou cnpj
	$_SESSION['escolher'] = $usuario_bd['escolher']; 
	header('Location: usuario_perfil.php');
	exit();
} 



/****************************************************/
// se não / tente logar novamente
else 
{
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}