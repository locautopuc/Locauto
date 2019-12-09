<?php
session_start();
include("conexao.php");


// STATEMENTS
// Aqui será feito diversas validações de segurança
// Os dados apenas serão salvos no banco caso todas as validações forem aceitas

/****************************************************/
/****************************************************/
// validando
$placa = mysqli_real_escape_string($conexao, trim($_POST['placa'])); // valor único
$marca = mysqli_real_escape_string($conexao, trim($_POST['marca']));
$modelo = mysqli_real_escape_string($conexao, trim($_POST['modelo']));
$chassi = mysqli_real_escape_string($conexao, trim($_POST['chassi'])); // valor único
$renavam = mysqli_real_escape_string($conexao, trim($_POST['renavam'])); // valor único
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$preco_compra = mysqli_real_escape_string($conexao, trim($_POST['preco_compra']));
$preco_venda = mysqli_real_escape_string($conexao, trim($_POST['preco_venda']));
$numero_passageiro = mysqli_real_escape_string($conexao, trim($_POST['numero_passageiro']));
$ano_fabricacao = mysqli_real_escape_string($conexao, trim($_POST['ano_fabricacao']));
$ano_modelo = mysqli_real_escape_string($conexao, trim($_POST['ano_modelo']));
$tipo_combustivel = mysqli_real_escape_string($conexao, trim($_POST['tipo_combustivel']));
$kilometragem = mysqli_real_escape_string($conexao, trim($_POST['kilometragem']));
$potencia = mysqli_real_escape_string($conexao, trim($_POST['potencia']));
$capacidade_pmalas = mysqli_real_escape_string($conexao, trim($_POST['capacidade_pmalas']));
// radio ( locado / disponivel / vendido )
$situacao = mysqli_real_escape_string($conexao, trim($_POST['situacao']));


// cria um caminho para salvar a foto do VEICULO
// é preciso separar as fotos por pastas diferentes entre pastas
// pois se duas fotos forem enviadas com o mesmo nome e tipo
// a última foto irá sobrescrever a foto do cadastro passado

$target_dir = "uploads/imagens/veiculo/".$marca."/".$modelo."/";

// cria uma pasta se não existir
if (!file_exists($target_dir)) 
{
   mkdir( $target_dir,0777,false );
}

// se já existir um arquivo na pasta - deleta ele
else if (file_exists($foto_veiculo)) 
{
   unlink($foto_veiculo);
} 

// adicionando nova foto
$foto_veiculo = $target_dir . basename($_FILES["foto_veiculo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($foto_veiculo,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["cadastrar_botao"])) 
{
    $check = getimagesize($_FILES["foto_veiculo"]["tmp_name"]);
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
if (file_exists($foto_veiculo)) 
{
    echo "Este arquivo já existe.";
    $uploadOk = 0;
}*/
// verifica o tamanho do arquivo - max 5mb
if ($_FILES["foto_veiculo"]["size"] > 500000) 
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

if ($uploadOk == 0) // se não tiver nenhum arquivo - ERRO
{
    echo "Erro ao fazer o upload";
} 
else 
{	// se tiver algum arquivo e for tudo ok - FAZ O UPLOAD
    if (move_uploaded_file($_FILES["foto_veiculo"]["tmp_name"], $foto_veiculo)) 
	{
        echo "O arquivo ". basename( $_FILES["foto_veiculo"]["name"]). " foi enviado.";
    } 
	else 
	{	// se tiver um arquivo e acontecer algum problema - ERRO
        echo "Erro ao fazer upload";
    }
}





/****************************************************/
/****************************************************/
/****************************************************/
//selecionando o total de placas cadastradas no banco de dados
$sql = "select count(*) as total from tabela_cadastro_veiculo where placa = '$placa'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

/****************************************************/
//selecionando o total de chassi cadastradas no banco de dados
$sql2 = "select count(*) as total from tabela_cadastro_veiculo where chassi = '$chassi'";
$result2 = mysqli_query($conexao, $sql2);
$row2 = mysqli_fetch_assoc($result2);

/****************************************************/
//selecionando o total de renavam cadastradas no banco de dados
$sql3 = "select count(*) as total from tabela_cadastro_veiculo where renavam = '$renavam'";
$result3 = mysqli_query($conexao, $sql3);
$row3 = mysqli_fetch_assoc($result3);

/****************************************************/
/****************************************************/
/****************************************************/
// verificando se o usuario digitou em todos os campos
// se não retorna um erro
if(empty($_POST['placa']) || 
	//empty($_POST['marca']) || 
	//empty($_POST['modelo']) || 
	empty($_POST['chassi']) || 
	empty($_POST['renavam']) ||
	//empty($_POST['categoria']) ||
	empty($_POST['preco_compra']) ||
	empty($_POST['preco_venda']) ||
	empty($_POST['numero_passageiro']) ||
	empty($_POST['ano_fabricacao']) ||
	empty($_POST['ano_modelo']) ||
	empty($_POST['tipo_combustivel']) ||
    empty($_POST['kilometragem']) ||
	empty($_POST['potencia']) ||
	empty($_POST['capacidade_pmalas'])) //||
	//empty($_POST['situacao'])) 
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}


/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
// verificando se está sendo digitado apenas numeros
else if (empty($_POST["renavam"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $renavam))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["numero_passageiro"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $numero_passageiro))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["ano_fabricacao"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $ano_fabricacao))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}/*
else if (empty($_POST["ano_fabricacao"]))
{
	$_SESSION['ano_fabricacao_escolher'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}*/
/****************************************************/
else if (empty($_POST["ano_modelo"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $ano_modelo))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}/*
else if (empty($_POST["ano_modelo"]))
{
	$_SESSION['ano_fabricacao_escolher'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}*/
/****************************************************/
else if (empty($_POST["kilometragem"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
else if (!preg_match("/^[0-9]*$/", $kilometragem))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["capacidade_pmalas"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');

	exit();
}
else if (!preg_match("/^[0-9]*$/", $capacidade_pmalas))
{
	$_SESSION['apenas_letras'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}

/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
// verificando se está sendo digitado apenas letras e/ou numeros
else if (empty($_POST["placa"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9- ]*$/", $placa))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["chassi"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $chassi))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
/****************************************************/
else if (empty($_POST["tipo_combustivel"]))
{
	$_SESSION['obrigatorio_digitar'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
else if (!preg_match("/^[a-zA-Z0-9- ]*$/", $tipo_combustivel))
{
	$_SESSION['apenas_letras_numeros'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}

/****************************************************/
/****************************************************/
else if (empty($_POST["situacao"]))
{
	$_SESSION['situacao_escolher'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
/****************************************************/
/****************************************************/
else if (empty($_POST["categoria"]))
{
	$_SESSION['categoria_escolher'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
/****************************************************/
/****************************************************/
else if (empty($_POST["marca"]))
{
	$_SESSION['marca_escolher'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}
/****************************************************/
/****************************************************/
else if (empty($_POST["modelo"]))
{
	$_SESSION['modelo_escolher'] = true;
	header('Location: veiculo_cadastro.php');
	exit();
}


/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
//verifica se já existe uma placa cadastrada
//se sim - retorna uma mensagem de erro dizendo que a placa já existe
if($row['total'] == 1) {
	$_SESSION['placa_existe'] = true;
	header('Location: veiculo_cadastro.php');
	exit;
}


/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
//verifica se já existe um chassi cadastrado
//se sim - retorna uma mensagem de erro dizendo que o chassi já existe
if($row2['total'] == 1) {
	$_SESSION['chassi_existe'] = true;
	header('Location: veiculo_cadastro.php');
	exit;
}

/****************************************************/
/****************************************************/
/****************************************************/
/****************************************************/
//verifica se já existe um renavam cadastrado
//se sim - retorna uma mensagem de erro dizendo que o renavam já existe
if($row3['total'] == 1) {
	$_SESSION['renavam_existe'] = true;
	header('Location: veiculo_cadastro.php');
	exit;
}


/****************************************************/
/****************************************************/
/****************************************************/
//preparando para inserir os dados na tabela
$sql = "INSERT INTO tabela_cadastro_veiculo (placa,marca,modelo,chassi,renavam,categoria,preco_compra,preco_venda,numero_passageiro,ano_fabricacao,ano_modelo,tipo_combustivel,kilometragem,potencia,capacidade_pmalas,situacao,foto_veiculo) VALUES ('$placa','$marca','$modelo','$chassi','$renavam','$categoria','$preco_compra','$preco_venda','$numero_passageiro','$ano_fabricacao','$ano_modelo','$tipo_combustivel','$kilometragem','$potencia','$capacidade_pmalas','$situacao','$foto_veiculo')"; 

//$sql = "INSERT INTO tabela_cadastro_veiculo (placa,marca,modelo,chassi,renavam,categoria,preco_compra,preco_venda,numero_passageiro,ano_frabricacao,ano_modelo) VALUES ('$placa','$marca','$modelo','$chassi','$renavam','$categoria','$preco_compra','$preco_venda','$numero_passageiro','$ano_frabricacao','$ano_modelo')"; 

//$sql = "INSERT INTO tabela_cadastro_veiculo (ID_modelo,placa,marca,modelo,chassi,renavam,categoria,preco_compra,preco_venda,numero_passageiro,ano_fabricacao,ano_modelo,tipo_combustivel,kilometragem,potencia,capacidade_pmalas,situacao,foto_veiculo) SELECT tabela_cadastro_veiculo_modelo.ID_modelo, SELECT tabela_cadastro_veiculo_categoria.ID_categoria, '$placa','$marca','$modelo','$chassi','$renavam','$categoria','$preco_compra','$preco_venda','$numero_passageiro','$ano_fabricacao','$ano_modelo','$tipo_combustivel','$kilometragem','$potencia','$capacidade_pmalas','$situacao','$foto_veiculo' FROM tabela_cadastro_veiculo_modelo WHERE tabela_cadastro_veiculo_modelo.ID_modelo = $modelo"; 

/****************************************************/
// se tudo ocorreu bem o cadastro é salvo no banco
if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}
	


$conexao->close();
// se o cadastro foi tudo bem a tela retorna para a tela de login para o usuário logar
header('Location: funcionario_perfil.php');
exit;
?>