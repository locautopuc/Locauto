<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo de segurança
// neste caso é o login.inc.php
session_start();
?>



<!-- **************************************************** -->
<!-- **************************************************** -->
<!-- **************************************************** -->
<!-- **************************************************** -->
<!-- **************************************************** -->
<!DOCTYPE html>
<html>
    
<head> <!-- Iniciando as css e cabeçalho -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Locauto</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/config.css">
</head>


<body> <!-- Iniciando o corpo da página -->
	  
	
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<?php 
	// so o usuário não estiver logado - NAO APARECE O PERFIL
	if(!$_SESSION['cpf_cnpj'])  
	{																				
		// chamando o arquivo cabeçalho
		require 'cabecalho.php';
	}
	// se o usuário estiver logado - NAO APARECE O LOGIN até ele DESLOGAR
	else if($_SESSION['cpf_cnpj']) 
	{
		// chamando o arquivo cabeçalho logado
		require 'cabecalho_logado.php';
	}
	?>
		
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<section class="hero is-success is-fullheight">
        <div class="hero-body">
		<div class="container has-text-centered">
			<div class="column is-4 is-offset-4">
				<!-- Imagem da Logo Locauto -->
				<img src="imagem/logo-locautoR-transp.png"width="50%" height="50%">
                    		<!-- <h3 class="title has-text-grey"><strong>Locauto®</strong></h3> -->
                    		<h3 class="title has-text-grey"><a href="" target="_blank"> </a></h3>
	
				
				
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Mensagens de erro com CSS na interface -->
	<!-- As validações e disparo dos erros são feitos na controladora login.inc.php -->	
	<!-- **************************************************** -->
	<!-- SESSION status_cadastro -->
	<?php
		if(isset($_SESSION['status_cadastro'])):
	?>
											  
	<div class="notification is-success">
		<p>Seu cadastro foi feito com sucesso!</p>
		<p>Faça login informando o seu usuário e senha</p>
	</div>
	<?php
		endif;
		unset($_SESSION['status_cadastro']);
	?>
	<!-- fim SESSION status_cadastro -->
	<!-- **************************************************** -->


	<!-- SESSION nao_autenticado -->
	<?php
		if(isset($_SESSION['nao_autenticado'])):
	?>
	<div class="notification is-danger">
		<p>ERRO: Usuário ou senha inválidos.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['nao_autenticado']);
	?>
	<!-- fim SESSION nao_autenticado -->
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

				

	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Interface -->
	<div class="box">
	<!-- Esta interface terá comunicação com o arquivo login.inc.php -->
		<form action="login.inc.php" method="POST" autocomplete="off">
			
		<!-- **************************************************** -->
		<!-- Campo de digito CPF ou CNPJ -->
		<div class="field">
			<div class="control">
				<strong>Digite o seu CPF ou CNPJ:</strong>   &nbsp; ( Apenas números )
				<input name="cpf_cnpj" type="text" class="input is-large" placeholder="CPF ou CNPJ" autofocus="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14">
			</div>
		</div>
		
		<!-- **************************************************** -->
		<!-- Campo de digito Senha -->
		<div class="field">
			<div class="control">
				<strong>Digite a sua senha:</strong>   &nbsp; ( Máximo de 8 dígitos )
				<input name="senha" class="input is-large" type="password" placeholder="Sua senha" maxlength="8">
			</div>
		</div>
			
		<!-- **************************************************** -->
		<!-- Botão cadastrar -->
		<div class="field">
			<a href="usuario_cadastro.php"><strong>Cadastrar</strong></a>
		</div>
					      
		<!-- Botão entrar com design CSS -->
			<button type="submit" class="button is-dark is-block  is-large is-fullwidth">Entrar</button>
		</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
		
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<?php 
		// chamando o arquivo rodape
		require 'rodape.php';
	?>
</body>
</html>
