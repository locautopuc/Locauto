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
		// so o usuário não estiver logado - NAO APARECE O PERFIL
	  if(!$_SESSION['cpf_cnpj'])  
	  {																				
		// chamando o arquivo cabeçalho
		require 'cabecalho.php';
	  }
		// se o usuário estiver logado - NAO APARECE O LOGIN
		else if($_SESSION['cpf_cnpj']) 
		{
			// chamando o arquivo cabeçalho logado
			require 'cabecalho_logado.php';
		}
	?>
	
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Cadastro do Motorista</h3>
	
	<!-- SESSIONS DE ERRO -->
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
	<!-- Esta interface terá comunicação com o arquivo motorista_cadastrar.php -->
	<!-- Para o UPLOAD de fotos funcionar é preciso adicionar enctype="multipart/form-data" ao FORM -->
	<form action="motorista_cadastrar.inc.php" method="POST" autocomplete="off" enctype="multipart/form-data">

	<div class="field"><h1><strong>Motorista</strong></h1><p><br>
		<div class="control">
			<em>Os campos com <strong>*</strong> são Obrigatórios</em><br><br>
			
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* CPF:</strong>  &nbsp; ( Apenas números )
			<input name="cpf" type="text" class="input is-large" placeholder="CPF" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14">
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
		
	<h1><strong>CNH - Carteira Nacional de Habilitação</strong></h1><p><br>
		
	<div class="field">
		<div class="control">
			<strong>* Número de Registro: </strong>  &nbsp; ( Apenas números )
			<input name="numero_registro" type="text" class="input is-large" placeholder="Nº Registro" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
		</div>
	</div>
		
	<div class="field">
		<div class="control">
			<strong>* Categoria:</strong> &nbsp; ( A B C D E )
				<input name="categoria" type="text" class="input is-large" placeholder="Categoria" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>
		
	
	<!-- VENCIMENTO CNH -->
	<!-- DATAS VENCIDAS NÃO SERÃO ACEITAS -->
	<!-- ***************************************************** -->
	<script src="css/jquery.min.js"></script>
	<div class="field">
		<div class="control">
			<strong>* Data de Validade:</strong> ( Datas já vencidas, não serão aceitas )
				<input name="date" type="date" class="input is-large" >
		</div>
	</div>
		
	<script>
		var hoje = new Date().toISOString().split('T')[0];
		document.getElementsByName("date")[0].setAttribute('min', hoje);
	</script>
	
	<!-- FOTO CNH -->
	<!-- ***************************************************** -->
	<div class="field">
		<div class="control"><br>
			<strong>* Adcione a foto da sua CNH:</strong><br>
			( Somente <strong>UMA</strong> foto com Frente e Verso )<br>
			( A foto deve ter no máximo um tamanho de 5mb )<br>
			( Formatos aceitos: PNG, JPEG ou JPG )
		</div>
	</div>
	
	<!-- FOTO CNH -->
	<!-- ***************************************************** -->
	<strong>Frente:</strong>
	<div class="field">
		<div id="script_foto_cnh" class="file is-centered is-boxed has-name">
			<label class="file-label">
				<input class="file-input" type="file" name="foto_cnh" accept=".png,.jpeg,.jpg">
				<span class="file-cta">
					<span class="file-icon">
 						<i class="fas fa-upload"></i>
					</span>
					<span class="file-label">
  						Arquivo ...
					</span>
				</span>
				<span class="file-name">
					Nenhum arquivo foi inserido ...
				</span>
			</label>
		</div>
	</div>
		
		
	<script>
		const fileInputCNH = document.querySelector('#script_foto_cnh input[type=file]');
		fileInputCNH.onchange = () => 
		{
			// se houver tentativa de upload e o arquivo for menor do que 5MB - OK
			if (fileInputCNH.files.length > 0 && fileInputCNH.files[0].size < 5000000) 
			{
				document.getElementById("script_foto_cnh").className = "file is-centered is-boxed is-success has-name";
				const fileName = document.querySelector('#script_foto_cnh .file-name');
				fileName.textContent = fileInputCNH.files[0].name;
			}
			// se houver tentativa de upload e o arquivo for maior do que 5MB - ERRO
			else if (fileInputCNH.files.length > 0 && fileInputCNH.files[0].size > 5000000)
				{
					alert("ERRO: O arquivo é maior do que 5mb, por favor, adicione uma foto que seja menor do que o tamanho de 5mb.");
					this.value = "";
				}
			// se houver tentativa de upload e o arquivo for menor do que 5MB e o tipo for diferente de PNG JPG JPEG - ERRO
			else if(fileInputCNH.files.length > 0 && fileInputCNH.files[0].size < 5000000 && fileInputCNH.files.type != "jpg" && fileInputCNH.files.type != "png" && fileInputCNH.files.type != "jpeg")
				{
					alert("ERRO: Arquivo com formato incorreto! Por favor, adicione um arquivo do tipo PNG, JPEG ou JPG.");
					this.value = "";
				}
		}
	</script>
	<!-- ***************************************************** -->
		
	
	<br><h1><strong>Endereço</strong></h1><p><br>

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
		<a href="usuario_perfil.php"><strong>Cancelar</strong></a>
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
