<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de segurança
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
	require 'cabecalho_admin_logado.php'; 
	?>
	
		
	
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Cadastro de Funcionário</h3>
					
	<!-- **************************************************** -->
	<!-- SESSION status_cadastro -->
	<?php
		if(isset($_SESSION['status_cadastro'])):
	?>
	<div class="notification is-success">
		<p>Seu cadastro foi feito com sucesso!</p>
		<p>Faça login informando o seu usuário e senha <a href="login.inc.php">aqui</a></p>
	</div>
	<?php
		endif;
		unset($_SESSION['status_cadastro']);
	?>
	<!-- fim SESSION status_cadastro -->
	<!-- **************************************************** -->


	<!-- SESSION usuario_existe -->
	<?php
		if(isset($_SESSION['usuario_existe'])):
	?>
	<div class="notification is-danger">
		<p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['usuario_existe']);
	?>
	<!-- fim SESSION usuario_existe -->
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


	<!-- SESSION obrigatorio_digitar -->
	<?php
		if(isset($_SESSION['apenas_letras'])):
	?>
	<div class="notification is-danger">
		<p>Digite apenas letras.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['apenas_letras']);
	?>
	<!-- fim SESSION obrigatorio_digitar -->
	<!-- **************************************************** -->
					
				
	<!-- SESSION obrigatorio_digitar -->
	<?php
		if(isset($_SESSION['digite_senha_corretamente'])):
	?>
	<div class="notification is-danger">
		<p>Digite a senha corretamente.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['digite_senha_corretamente']);
	?>
	<!-- fim SESSION obrigatorio_digitar -->
	<!-- **************************************************** -->


	<!-- SESSION senha_diferente -->
	<?php
		if(isset($_SESSION['senha_diferente'])):
	?>
	<div class="notification is-danger">
		<p>As senhas não são iguais.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['senha_diferente']);
	?>
	<!-- fim SESSION senha_diferente -->
	<!-- **************************************************** -->
					
		
<!-- SESSION email invalido -->
	<?php
		if(isset($_SESSION['email_invalido'])):
	?>
	<div class="notification is-danger">
		<p>Você não digitou um email válido.</p>
	</div>
	<?php
	endif;
	unset($_SESSION['email_invalido']);
	?>
	<!-- fim SESSION email invalido -->
	<!-- **************************************************** -->



	<!-- SESSION email_existe -->
	<?php
		if(isset($_SESSION['email_existe'])):
	?>
	<div class="notification is-danger">
		<p>O E-mail escolhido já existe. Informe outro e tente novamente.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['email_existe']);
	?>
	<!-- fim SESSION email_existe -->
	<!-- **************************************************** -->


	<!-- Interface -->
	<div class="box">
	<!-- Esta interface terá comunicação com o arquivo cadastrar.php -->
	<form action="funcionario_cadastrar.inc.php" method="POST" autocomplete="off">

	<div class="field">
	  <h1><strong>Funcionário</strong></h1><p><br>
		<div class="control">
			<em>Os campos com <strong>*</strong> são Obrigatórios</em><br><br>
			
		</div>
	</div>
		
		
	<div class="field">
		<div class="control">
			<strong>* Matricula:</strong>  &nbsp; ( Apenas números )
			<input name="matricula" type="text" class="input is-large" placeholder="Matricula" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>

	
	<div class="field">
		<div class="control">
			<strong>* Nome Completo:</strong>
				<input name="nome" type="text" class="input is-large" placeholder="Nome Completo" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	

	<div class="field">
		<div class="control">
			<strong> * RG / Identidade:</strong>  &nbsp; ( Apenas números )
			<input name="identidade" type="text" class="input is-large" placeholder="Identidade" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Telefone: </strong>  &nbsp; ( Apenas números )
			<input name="telefone" type="text" class="input is-large" placeholder="Telefone" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Email:</strong> &nbsp; ( exemplo@mail.com )
			<input name="email" type="text" class="input is-large" placeholder="E-mail" autofocus>
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Senha: </strong>
			<input name="senha" type="password" class="input is-large" placeholder="Senha" autofocus >
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Repita a Senha: </strong>
			<input name="senha_repetir" type="password" class="input is-large" placeholder="Repita a Senha" autofocus >
		</div>
	</div><p><br>

	<h1><strong>Endereço</strong></h1><p><br>

	<div class="field">
		<div class="control">
			<strong>* Logradouro: </strong>
			<input name="logradouro" type="text" class="input is-large" placeholder="Logradouro" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Número: </strong>  &nbsp; ( Apenas números )
			<input name="numero" type="text" class="input is-large" placeholder="Numero" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Complemento: </strong>
			<input name="complemento" type="text" class="input is-large" placeholder="Complemento" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Bairro: </strong>
			<input name="bairro" type="text" class="input is-large" placeholder="Bairro" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Cidade: </strong>
			<input name="cidade" type="text" class="input is-large" placeholder="Cidade" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Estado: </strong>
			<input name="estado" type="text" class="input is-large" placeholder="Estado" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Cep: </strong> &nbsp; ( Apenas números )
			<input name="cep" class="input is-large" type="text" placeholder="Cep" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>

	<!-- Botão cadastrar com design CSS -->
	<button type="submit" name="cadastrar_botao" class="button is-block is-dark is-large is-fullwidth">Cadastrar</button>
		<a href="admin_perfil.php"><strong>Cancelar</strong></a>
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
