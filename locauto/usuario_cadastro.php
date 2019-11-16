<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de segurança
// neste caso é o cadastrar.php
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
	
	<!-- **************************************************** -->
	<!-- Script JAVA -->
	<!-- Controle da seleção de CPF e CNPJ -->
	<!-- Se selecionar CPF o campo de Razão Social será desabilitado -->
	<script type="text/javascript">
	function findselected() 
		{ 
			var result = document.querySelector('input[name="escolher"]:checked').value;
			if(result=="CPF")
			{
				//se o usuario selecionar que é pessoa fisica CPF
				//o campo Razão social será desabilitado e terá os valores inserids apagados
				document.getElementById("desabilita_campo_caso_selecionar_CPF").setAttribute('disabled', true);
				document.getElementById('desabilita_campo_caso_selecionar_CPF').value = '';
			}
			else
			{
				document.getElementById("desabilita_campo_caso_selecionar_CPF").removeAttribute('disabled');
			}
		}
	</script>
	<!-- fim Script JAVA -->
	<!-- **************************************************** -->
	
	
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Faça o seu Cadastro</h3>
					
	<!-- **************************************************** -->
	 <!-- SESSION status_cadastro -->
	<?php
		if(isset($_SESSION['status_cadastro'])):
	?>
	<div class="notification is-success">
		<p>Seu cadastro foi feito com sucesso!</p>
		<p>Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p>
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
	<form action="usuario_cadastrar.php" method="POST" autocomplete="off">

	<div class="field"><h1><strong>Cliente</strong></h1><p><br>
		<div class="control">
			<em>Os campos com <strong>*</strong> são Obrigatórios</em><br><br>
			<strong>Selecione : Você é Pessoa Fisica ou Pessoa Juridica?</strong><br><br>
			<div class="field">
				<div class="control">
					<label class="radio">
						<input type="radio" name="escolher" value="CPF" checked="checked" onChange="findselected()">
						Pessoa Fisica - CPF
					</label><br>
					<label class="radio">
						<input type="radio" name="escolher" value="CNPJ" onChange="findselected()">
						Pessoa Juridica - CNPJ<br><br>
					</label>
				</div>
			</div>
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* CPF ou CNPJ:</strong>  &nbsp; ( Apenas números )
			<input name="cpf_cnpj" type="text" class="input is-large" placeholder="CPF ou CNPJ" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14">
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
			<strong>Razão Social:</strong> ( Apenas para Pessoas Juridicas - CNPJ )
			<input name="razao_social" disabled type="text" id="desabilita_campo_caso_selecionar_CPF" class="input is-large" placeholder="Razao Social" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* RG / Identidade:</strong>  &nbsp; ( Apenas números )
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
		<a href="index.php"><strong>Cancelar</strong></a>
		</form>
			</div>
		</div>
	</div>
</div>
</section>
	<?php 
	// chamando o arquivo de cabeçalho
	require 'rodape.php'; 
	?>
	</body>
</html>
