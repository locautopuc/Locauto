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
$matricula = mysqli_real_escape_string($conexao, $_POST['matricula']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

// selecionando os dados de cpf ou cnpj e a senha criptografada no banco
//$query = "select * from tabela_admin where admin = '{$admin}' and senha = md5('{$senha}')";
$query = "select * from tabela_cadastro_funcionario where matricula = '{$matricula}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

/****************************************************/
// o usuário deve digitar a senha
if(!empty($_POST['matricula']) && empty($_POST['senha']))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: funcionario.php');
	exit();
}

/****************************************************/
// o usuário deve digitar o login
else if(empty($_POST['matricula']) && !empty($_POST['senha']))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: funcionario.php');
	exit();
}

/****************************************************/
// o usuário deve digitar nos dois campos
else if(empty($_POST['matricula']) && empty($_POST['senha']))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: funcionario.php');
	exit();
}

/****************************************************/
// se o usuário existir no cadastro deixa ele logar
if($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['nome'] = $usuario_bd['nome'];
	$_SESSION['matricula'] = $usuario_bd['matricula'];
	header('Location: funcionario_perfil.php');
	exit();
} 



/****************************************************/
// se não / tente logar novamente
else 
{
	$_SESSION['nao_autenticado'] = true;
	header('Location: funcionario.php');
	exit();
}