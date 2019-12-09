<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de controle
// neste caso é o funcionario_cadastrar.inc.php
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
		
		
	<?php
	// chamando o arquivo de cabeçalho para o admin
	require 'cabecalho_admin_logado.php'; 
	?>				
		
		
		
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->	
	<!-- **************************************************** -->
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-20 is-offset-0">
                    <h3 class="title has-text-grey">Cadastro de Funcionário</h3>
					
		
					
					
					
					
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Mensagens de erro com CSS na interface -->
	<!-- As validações e disparo dos erros são feitos na controladora funcionario_cadastrar.inc.php -->	
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


					
					
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Interface -->
	<div class="box">
	<!-- Esta interface terá comunicação com o arquivo funcionario_cadastrar.inc.php -->
	<form action="funcionario_cadastrar.inc.php" method="POST" autocomplete="off">
	<!-- **************************************************** -->
	<!-- Funcionario -->
	<div class="field">
		<div class="control">
			<em><strong>Os campos com * são Obrigatórios</strong></em><br><br>
			
		</div>
	  <table width="1270" border="0">
	    <tbody>
	      <tr>
	        <td width="606"><!-- Campo de digito de Matricula -->	
	<div class="field">
		<div class="control">
			<strong>* Matricula:</strong>  &nbsp; ( Apenas números )
			<input name="matricula" type="text" class="input " placeholder="Matricula" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" >
		</div>
	</div>&nbsp;</td>
	        <td width="30">&nbsp;</td>
	        <td width="609"><!-- Campo de digito de Logradouro -->
	<div class="field">
		<div class="control">
			<strong>* Logradouro: </strong>
			<input name="logradouro" type="text" class="input " placeholder="Logradouro" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9- ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
	        </tr>
	      <tr>
	        <td><!-- Campo de digito de Nome Completo -->	
	<div class="field">
		<div class="control">
			<strong>* Nome Completo:</strong>
				<input name="nome" type="text" class="input " placeholder="Nome Completo" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9- ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="250">
		</div>
	</div>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td><!-- Campo de digito de Número -->
	<div class="field">
		<div class="control">
			<strong>* Número do Endereço: </strong>  &nbsp; ( Apenas números )
			<input name="numero" type="text" class="input " placeholder="Numero" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>&nbsp;</td>
	        </tr>
	      <tr>
	        <td><!-- Campo de digito de Identidade -->	
	<div class="field">
		<div class="control">
			<strong> * RG / Identidade:</strong>  &nbsp; ( Apenas números )
			<input name="identidade" type="text" class="input " placeholder="Identidade" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td><!-- Campo de digito de Complemento -->
	<div class="field">
		<div class="control">
			<strong>* Complemento: </strong>
			<input name="complemento" type="text" class="input " placeholder="Complemento" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9- ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="250">
		</div>
	</div>&nbsp;</td>
	        </tr>
	      <tr>
	        <td><!-- Campo de digito de Telefone -->	
	<div class="field">
		<div class="control">
			<strong>* Telefone: </strong>  &nbsp; ( Apenas números )
			<input name="telefone" type="text" class="input " placeholder="Telefone" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
		</div>
	</div>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td><!-- Campo de digito de Bairro -->
	<div class="field">
		<div class="control">
			<strong>* Bairro: </strong>
			<input name="bairro" type="text" class="input " placeholder="Bairro" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9- ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
	        </tr>
	      <tr>
	        <td><!-- Campo de digito de Email -->	
	<div class="field">
		<div class="control">
			<strong>* Email:</strong> &nbsp; ( exemplo@mail.com )
			<input name="email" type="text" class="input " placeholder="E-mail" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9- ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="100">
		</div>
	</div>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td><!-- Campo de digito de Cidade -->
	<div class="field">
		<div class="control">
			<strong>* Cidade: </strong>
			<input name="cidade" type="text" class="input " placeholder="Cidade" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9- ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
	        </tr>
	      <tr>
	        <td><!-- Campo de digito de Senha -->	
	<div class="field">
		<div class="control">
			<strong>* Senha: </strong>    &nbsp;
			<input name="senha" type="password" class="input " placeholder="Senha" oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');" autofocus >
	</div>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td><!-- Campo de digito de Estado -->
	<div class="field">
		<div class="control">
			<strong>* Estado: </strong>
			<input name="estado" type="text" class="input " placeholder="Estado" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9- ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
	        </tr>
	      <tr>
	        <td><!-- Campo de digito de Repita a Senha -->
	<div class="field">
		<div class="control">
			<strong>* Repita a Senha: </strong>    &nbsp;
			<input name="senha_repetir" type="password" class="input " placeholder="Repita a Senha" oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');" autofocus >
		</div>
	</div>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td><!-- Campo de digito de Cep -->
	<div class="field">
		<div class="control">
			<strong>* Cep: </strong> &nbsp; ( Apenas números )
			<input name="cep" class="input " type="text" placeholder="Cep" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>&nbsp;</td>
	        </tr>
	      </tbody>
	    </table>
	  <p>&nbsp;</p>
	  <p><br>
		
	</div>
		
	

	<!-- **************************************************** -->
	

	<!-- Botão cadastrar com design CSS -->
	<button type="submit" name="cadastrar_botao" class="button is-block is-dark is-large is-fullwidth">Cadastrar</button>
		<!-- **************************************************** -->
		<!-- Botão cancelar -->
		<a href="admin_perfil.php"><strong>Cancelar</strong></a>
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
