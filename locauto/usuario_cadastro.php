<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de controle
// neste caso é o usuario_cadastrar.inc.php
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
	// chamando o arquivo de cabeçalho
	require 'cabecalho.php'; 
	?>
			
		
		
		
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->	
	<!-- **************************************************** -->
	<!-- Script JAVA -->
	<!-- Controle da seleção de CPF e CNPJ -->
	<!-- Se selecionar CPF o campo de Razão Social será desabilitado -->
	<!-- Se selecionar CNPJ o campo de Identidade será desabilitado -->
	<script type="text/javascript">
	function findselected() 
		{ 
			var result = document.querySelector('input[name="escolher"]:checked').value;
			if(result=="CPF")
			{
				//se o usuario selecionar que é pessoa fisica CPF
				//o campo Razão social será desabilitado e terá os valores inseridos apagados
				document.getElementById("desabilita_campo_RZ_caso_selecionar_CPF").setAttribute('disabled', true); // desabilita o campo razão social
				document.getElementById('desabilita_campo_RZ_caso_selecionar_CPF').value = ''; // apaga o valor digitado no campo razão social
				document.getElementById('cpf_cnpj').value = ''; // apaga o campo de CPF ou CNPJ
				document.getElementById("desabilita_campo_ID_caso_selecionar_cnpj").removeAttribute('disabled'); //hablita digitar no campo identidade
				document.getElementById('cpf_cnpj').maxLength = "11"; // máximo digito para CPF = 11
				document.getElementById('cpf_cnpj').size = "11"; // máximo digito para CPF = 11
			}
			else
			{
				document.getElementById("desabilita_campo_RZ_caso_selecionar_CPF").removeAttribute('disabled'); //habilita digitar no campo razão social
				//se o usuario selecionar que é pessoa juridica
				//o campo identidade será desabilitado e terá os valores inserids apagados
				document.getElementById("desabilita_campo_ID_caso_selecionar_cnpj").setAttribute('disabled', true); // desabilita campo idenidade
				document.getElementById('cpf_cnpj').value = ''; // apaga o campo de CPF ou CNPJ
				document.getElementById('desabilita_campo_ID_caso_selecionar_cnpj').value = ''; // apaga o valor digitado no campo de identidade
				document.getElementById('cpf_cnpj').maxLength = "14"; // máximo digito para CNPJ = 14
				document.getElementById('cpf_cnpj').size = "14"; // máximo digito para CNPJ = 14
			}
		}
	</script>
	<!-- fim Script JAVA -->
	<!-- **************************************************** -->
	
		
		
		
	
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-20 is-offset-0">
                    <h3 class="title has-text-grey">Faça o seu Cadastro</h3>
	
					
					
					
					
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Mensagens de erro com CSS na interface -->
	<!-- As validações e disparo dos erros são feitos na controladora usuario_cadastrar.inc.php -->	
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
		if(isset($_SESSION['apenas_numeros'])):
	?>
	<div class="notification is-danger">
		<p>Digite apenas númeross.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['apenas_numeros']);
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


	<!-- SESSION digite_razao_social -->
	<?php
		if(isset($_SESSION['digite_razao_social'])):
	?>
	<div class="notification is-danger">
		<p>Você escolheu CNPJ e não digitou uma Razão Social.</p>
	</div>
	<?php
	endif;
	unset($_SESSION['digite_razao_social']);
	?>
	<!-- fim SESSION digite_razao_social -->
	<!-- **************************************************** -->
					
					
<!-- SESSION digite_identidade -->
	<?php
		if(isset($_SESSION['digite_identidade'])):
	?>
	<div class="notification is-danger">
		<p>Você escolheu CPF e não digitou uma Identidade.</p>
	</div>
	<?php
	endif;
	unset($_SESSION['digite_identidade']);
	?>
	<!-- fim SESSION digite_identidade -->
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
	<!-- Esta interface terá comunicação com o arquivo usuario_cadastrar.inc.php -->
	<form action="usuario_cadastrar.inc.php" method="POST" autocomplete="off">
	<!-- **************************************************** -->
	<!-- Cliente -->
	<div class="field"><h1>&nbsp;</h1>
		<div class="control">
			<p><em>Os campos com <strong>*</strong> são Obrigatórios</em><br><br>
			  <strong>* Selecione : Você é Pessoa Fisica ou Pessoa Juridica?</strong></p>
		<p>* É obrigatório digitar nos campos CPF/Identidade ou CNPJ/Razão Social logo apos a escolha desejada.</p>
			<table align="center" width="1200" border="0">
			  <tbody>
			    <tr align="center">
			      <td colspan="2" align="center"></td>
			      <td width="51">&nbsp;</td>
			      <td width="601"></td>
		        </tr>
			    <tr>
			      <td width="249" align="center"><!-- **************************************************** -->
			        <!-- Escolha de CPF ou CNPJ -->
			        <div class="field">
			          <div class="control">
			            <label class="radio">
			              <input class="is-checkradio" type="radio" name="escolher" value="CPF" checked="checked" onChange="findselected(this);">
			              Pessoa Fisica - CPF
			              </label>
			            <!-- **************************************************** -->
			        <!-- **************************************************** -->
			        <!-- **************************************************** -->
			        <!-- **************************************************** -->
			        <!-- **************************************************** -->
			        &nbsp;</td><br>
			      <td width="281" align="center"><label class="radio">
			              <input class="is-checkradio" type="radio" name="escolher" value="CNPJ" onChange="findselected(this);">
			              Pessoa Juridica - CNPJ<br><br>
			              </label>
			            </div>
			          </div>&nbsp;</td>
			        <td align="center">&nbsp;</td>
			      </tr>
			    <tr>
			      <td colspan="2"><!-- Campo de digito CPF ou CNPJ -->	
			        <div class="field">
			          <div class="control">
			            <strong>* CPF ou CNPJ:</strong>  &nbsp; ( Apenas números )
			            <input name="cpf_cnpj" type="text" class="input " id="cpf_cnpj"  placeholder="CPF ou CNPJ" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" >
			            </div>
			          
			          </div>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td><!-- Campo de digito Logradouro -->
	<div class="field">
		<div class="control">
			<strong>* Logradouro: </strong>
			<input name="logradouro" type="text" class="input " placeholder="Logradouro" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
			      </tr>
			    <tr>
			      <td colspan="2"><!-- Campo de digito RG Identidade -->
	<div class="field">
		<div class="control">
			<strong> RG / Identidade:</strong>  &nbsp; ( Apenas para Pessoas Físicas - CPF )
			<input name="identidade" type="text" id="desabilita_campo_ID_caso_selecionar_cnpj" class="input " placeholder="Identidade" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td><!-- Campo de digito Número -->
	<div class="field">
		<div class="control">
			<strong>* Número do Endereço: </strong>  &nbsp; ( Apenas números )
			<input name="numero" type="text" class="input " placeholder="Numero" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>&nbsp;</td>
			      </tr>
			    <tr>
			      <td colspan="2"><!-- Campo de digito Razão Social -->
	<div class="field">
		<div class="control">
			<strong>Razão Social:</strong> ( Apenas para Pessoas Juridicas - CNPJ )
			<input name="razao_social" disabled type="text" id="desabilita_campo_RZ_caso_selecionar_CPF" class="input " placeholder="Razao Social" autofocus  maxlength="50" oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td><!-- Campo de digito Complemento -->
	<div class="field">
		<div class="control">
			<strong>* Complemento: </strong>
			<input name="complemento" type="text" class="input " placeholder="Complemento" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="250">
		</div>
	</div>&nbsp;</td>
			      </tr>
			    <tr>
			      <td colspan="2"><!-- Campo de digito Nome Completo -->	
	<div class="field">
		<div class="control">
			<strong>* Nome Completo:</strong>
				<input name="nome" type="text" class="input " placeholder="Nome Completo" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="250">
		</div>
	</div>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td><!-- Campo de digito Bairro -->
	<div class="field">
		<div class="control">
			<strong>* Bairro: </strong>
			<input name="bairro" type="text" class="input " placeholder="Bairro" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
			      </tr>
			    <tr>
			      <td colspan="2"><!-- Campo de digito Telefone -->
	<div class="field">
		<div class="control">
			<strong>* Telefone: </strong>  &nbsp; ( Apenas números )
			<input name="telefone" type="text" class="input " placeholder="Telefone" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
		</div>
	</div>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td><!-- Campo de digito Cidade -->
	<div class="field">
		<div class="control">
			<strong>* Cidade: </strong>
			<input name="cidade" type="text" class="input " placeholder="Cidade" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
			      </tr>
			    <tr>
			      <td colspan="2"><div class="field">
		<div class="control">
			<strong>* Email:</strong> &nbsp; ( exemplo@mail.com )
			<input name="email" type="text" class="input " placeholder="E-mail" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-@.]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="100">
		</div>
	</div>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td><!-- Campo de digito Estado -->
	<div class="field">
		<div class="control">
			<strong>* Estado: </strong>
			<input name="estado" type="text" class="input " placeholder="Estado" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
			      </tr>
			    <tr>
			      <td colspan="2"><!-- Campo de digito Senha -->
	<div class="field">
		<div class="control">
			<strong>* Senha: </strong>    &nbsp;
			<input name="senha" type="password" class="input " placeholder="Senha" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td><!-- Campo de digito Cep -->
	<div class="field">
		<div class="control">
			<strong>* Cep: </strong> &nbsp; ( Apenas números )
			<input name="cep" class="input " type="text" placeholder="Cep" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>&nbsp;</td>
			      </tr>
			    <tr>
			      <td colspan="2"><!-- Campo de digito Repita a Senha -->
	<div class="field">
		<div class="control">
			<strong>* Repita a Senha: </strong>    &nbsp;
			<input name="senha_repetir" type="password" class="input " placeholder="Repita a Senha" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
					  </div>&nbsp;</td>
			      <td>&nbsp;</td>
			      <td>&nbsp;</td>
			      </tr>
			    </tbody>
			  </table>
			
			
	    </p>
			
			
		</div>
	</div>
		


	<!-- **************************************************** -->
	

	<!-- Botão cadastrar com design CSS -->
	<button type="submit" name="cadastrar_botao" class="button is-block is-dark is-large is-fullwidth">Cadastrar</button>
		<!-- **************************************************** -->
		<!-- Botão cancelar -->
		<a href="index.php"><strong>Cancelar</strong></a>
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
