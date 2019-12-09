<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de segurança
// neste caso é o veiculo_modelo_cadastrar.inc.php
require 'conexao.php';
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Locauto</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<link rel="stylesheet" href="css/bulma.min.css" />
		<link rel="stylesheet" type="text/css" href="css/config.css">
	</head>
	<body>
		
	<?php
	// chamando o arquivo de cabeçalho
	require 'cabecalho.php'; 
	?>
	
	
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Cadastre um Modelo</h3>
					

	<!-- **************************************************** -->
	<!-- SESSION status_cadastro -->
	<?php
		if(isset($_SESSION['status_cadastro'])):
	?>
	<div class="notification is-success">
		<p>Seu cadastro foi feito com sucesso!</p>
		<p>Caso desejar, cadastre outro Modelo</p>
	</div>
	<?php
		endif;
		unset($_SESSION['status_cadastro']);
	?>
	<!-- fim SESSION status_cadastro -->
	<!-- **************************************************** -->


	<!-- SESSION marca_existe -->
	<?php
		if(isset($_SESSION['modelo_existe'])):
	?>
	<div class="notification is-danger">
		<p>O modelo escolhido já existe. Informe outro e tente novamente.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['modelo_existe']);
	?>
	<!-- fim SESSION marca_existe -->
	<!-- **************************************************** -->

					

	<!-- SESSION obrigatorio_selecionar -->
	<?php
		if(isset($_SESSION['obrigatorio_selecionar'])):
	?>
	<div class="notification is-danger">
		<p>Você não selecionou uma marca.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['obrigatorio_selecionar']);
	?>
	<!-- fim SESSION obrigatorio_selecionar -->
	<!-- **************************************************** -->
					

	<!-- SESSION obrigatorio_digitar -->
	<?php
		if(isset($_SESSION['obrigatorio_digitar'])):
	?>
	<div class="notification is-danger">
		<p>Você não digitou em todos os campos.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['obrigatorio_digitar']);
	?>
	<!-- fim SESSION obrigatorio_digitar -->
	<!-- **************************************************** -->


	<!-- SESSION obrigatorio_digitar -->
	<?php
		if(isset($_SESSION['apenas_letras_numeros'])):
	?>
	<div class="notification is-danger">
		<p>Digite apenas letras e/ou números.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['apenas_letras_numeros']);
	?>
	<!-- fim SESSION obrigatorio_digitar -->
	<!-- **************************************************** -->



	<!-- Interface -->
	<div class="box">
	<!-- Esta interface terá comunicação com o arquivo cadastrar.php -->
	<form action="veiculo_modelo_cadastrar.inc.php" method="POST" autocomplete="off">

	<div class="field">
	  <h1><strong>Modelo</strong></h1>
	  <p><br>
		<div class="control">
			<em>Os campos com <strong>*</strong> são Obrigatórios</em><br><br>
			
		</div>
	</div>
		
	<div class="select">
	<select class="is-focused" name="marca">
		<option disabled selected>Selecione uma Marca</option>
		<?php
			$tabela_cadastro_veiculo_marca = "SELECT * FROM tabela_cadastro_veiculo_marca";
			$resultado_marca = mysqli_query($conexao, $tabela_cadastro_veiculo_marca);
			while($row_resultado = mysqli_fetch_assoc($resultado_marca))
			{ 
			?>
			<option value="<?php echo $row_resultado['ID_marca']; ?>"><?php echo $row_resultado['marca'];?></option> 
		<?php
			}
		?>
	</select>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Modelo:</strong>
				<input name="modelo" type="text" class="input is-large" placeholder="Modelo" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	

	<!-- Botão cadastrar com design CSS -->
	<button type="submit" name="cadastrar_botao" class="button is-block is-dark is-large is-fullwidth">Cadastrar</button>
		<a href="funcionario_perfil.php"><strong>Cancelar</strong></a>
		</form>
			</div>
		</div>
	</div>
</div>
</section>
	<?php 
	// chamando o arquivo rodape
	require 'rodape.php'; 
	?>
	</body>
</html>
