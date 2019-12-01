
<?php
session_start();
include("conexao.php");

// STATEMENTS
// Aqui será feito diversas validações de segurança
// Os dados apenas serão salvos no banco caso todas as validações forem aceitas

/****************************************************/
/****************************************************/
// validando
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$identidade = mysqli_real_escape_string($conexao, trim($_POST['identidade']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$numero_registro = mysqli_real_escape_string($conexao, trim($_POST['numero_registro']));
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$date = mysqli_real_escape_string($conexao, trim($_POST['date']));
//$foto_frente = $_POST['foto_frente'];
//$foto_verso = $_POST['foto_verso'];

/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
// cria um caminho para salvar a foto da CNH
// é preciso separar as fotos por pastas diferentes entre usuários (CPF)
// pois se dois usuários diferentes enviar uma foto com o mesmo nome e tipo
// a última foto irá sobrescrever a foto do cadastro anterior
$target_dir = "uploads/imagens/".$cpf."/";

// cria uma pasta se não existir
if (!file_exists($target_dir)) 
{
   mkdir( $target_dir,0777,false );
}
// se já existir um arquivo - deleta ele
else if (file_exists($foto_cnh)) 
{
   unlink($foto_cnh);
}  
//adicionando uma nova foto
$foto_cnh = $target_dir . basename($_FILES["foto_cnh"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($foto_cnh,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["cadastrar_botao"])) 
{
    $check = getimagesize($_FILES["foto_cnh"]["tmp_name"]);
    if($check !== false) 
	{
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "O arquivo não é uma imagem";
        $uploadOk = 0;
    }
}
/*
// verifica se o arquivo já existe
if (file_exists($foto_cnh)) {
    echo "Este arquivo já existe.";
    $uploadOk = 0;
}*/
// verifica o tamanho do arquivo - max 5mb
if ($_FILES["foto_cnh"]["size"] > 500000) 
{
    echo "O arquivo é grande demais";
    $uploadOk = 0;
}
// verifica se os formatos são png jpg jpeg
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
{
    echo "ERRO, apenas JPG, JPEG, PNG";
    $uploadOk = 0;
}
// checa se tudo foi ok
if ($uploadOk == 0) 
{ // se estiver vazio
    echo "Erro ao fazer o upload"; // ERRO
} 
else 
{ 	// se não estiver vazio - faz o upload da foto
	if (move_uploaded_file($_FILES["foto_cnh"]["tmp_name"], $foto_cnh)) 
	{
		echo "O arquivo ". basename( $_FILES["foto_cnh"]["name"]). " foi enviado.";
	} 
	else 
	{	// se não estiver vazio, mas der algum problema - ERRO
		echo "Erro ao fazer upload";
	}
}

/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
$logradouro = mysqli_real_escape_string($conexao, trim($_POST['logradouro']));
$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
$complemento = mysqli_real_escape_string($conexao, trim($_POST['complemento']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));

/****************************************************/
//selecionando o total de motoristas (CPF) cadastradas no banco de dados
$sql = "select count(*) as total from tabela_cadastro_motorista where cpf = '$cpf'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

/****************************************************/
//selecionando o total de motorista (CPF) cadastradas no banco de dados
//usado para fazer as SESSIONS
$sql0 = "select count(*) as total from tabela_cadastro_motorista where cpf = '$cpf'";
$result0 = mysqli_query($conexao, $sql0);
$row0 = mysqli_fetch_assoc($result);

/****************************************************/
//selecionando o total de emails cadastrados no banco de dados
$sql2 = "select count(*) as total from tabela_cadastro_motorista where email = '$email'";
$result2 = mysqli_query($conexao, $sql2);
$row2 = mysqli_fetch_assoc($result2);

/****************************************************/
/****************************************************/
// verificando se o usuario digitou em todos os campos
// se não retorna um erro
if(empty($_POST['cpf']) || 
	empty($_POST['nome']) || 
	empty($_POST['identidade']) || 
	empty($_POST['telefone']) || 
	empty($_POST['email']) ||
	empty($_POST['logradouro']) ||
	empty($_POST['numero']) ||
	empty($_POST['complemento']) ||
	empty($_POST['bairro']) ||
	empty($_POST['cidade']) ||
	empty($_POST['estado']) ||
	empty($_POST['cep'])) 
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}

/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
// verificando se está sendo digitado apenas numeros
else if (empty($_POST["cpf"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $cpf))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["identidade"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $identidade))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["telefone"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $telefone))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["numero_registro"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $numero_registro))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["numero"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');

	exit();
}
else if (!preg_match("/^[0-9]*$/", $numero))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["cep"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $cep))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}

/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
// verificando se está sendo digitado apenas letras e/ou numeros
else if (empty($_POST["nome"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $nome))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["categoria"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $categoria))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["logradouro"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $logradouro))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["complemento"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $complemento))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["bairro"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $bairro))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["cidade"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $cidade))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["estado"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $estado))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: motorista_cadastro.php');
	exit();
}

/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
// se o usuário existir no cadastro deixa ele logar
// essa parte é usada para puxar os valores durante as SESSIONS
if($row0 == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['cpf'] = $usuario_bd['cpf'];
	// SESSION NOME usado apenas para mostrar o nome do usuário no perfil atravez do cpf
	$_SESSION['nome'] = $usuario_bd['nome'];
	// SESSION foto_cnh usado apenas para mostrar o TIPO do usuário no perfil atravez do cpf
	$_SESSION['foto_cnh'] = $usuario_bd['foto_cnh']; 
	// SESSION ID_motorista usado apenas para mostrar o TIPO do usuário no perfil atravez do cpf
	$_SESSION['ID_motorista'] = $usuario_bd['ID_motorista']; 
	header('Location: usuario_perfil.php');
	exit();
} 


/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
//validação de email
//se o usuario não digitar um email válido - retorna um erro
//exemplo de email valido - exemplo@mail.com
else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	$_SESSION['email_invalido'] = true;
	header('Location: motorista_cadastro.php');
	exit;
}
/****************************************************/
// validação de email
else if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) === false)
{
	$_SESSION['email_invalido'] = true;
	header('Location: motorista_cadastro.php');
	exit;
}


/****************************************************/
/****************************************************/
/****************************************************/
//verifica se já existe um cpf cadastrado
//se sim - retorna uma mensagem de erro dizendo que o usuario já existe
if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: motorista_cadastro.php');
	exit;
}

/****************************************************/
/****************************************************/
/****************************************************/
//verifica se já existe um email cadastrado
//se sim - retorna uma mensagem de erro dizendo que o email já existe
if($row2['total'] == 1) {
	$_SESSION['email_existe'] = true;
	header('Location: motorista_cadastro.php');
	exit;
}


/****************************************************/
/****************************************************/
/****************************************************/
//preparando para inserir os dados na tabela
$sql = "INSERT INTO tabela_cadastro_motorista (cpf,nome,identidade,telefone,email,numero_registro,categoria,date,foto_cnh,logradouro,numero,complemento,bairro,cidade,estado,cep) VALUES ('$cpf','$nome','$identidade','$telefone','$email','$numero_registro','$categoria','$date','$foto_cnh','$logradouro','$numero','$complemento','$bairro','$cidade', '$estado','$cep')";


/****************************************************/
// se tudo ocorreu bem o cadastro é salvo no banco
if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}
	


$conexao->close();
// se o cadastro foi tudo bem a tela retorna para a tela de login para o usuário logar
header('Location: usuario_perfil.php');
exit;
?>