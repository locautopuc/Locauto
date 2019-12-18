<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de segurança
// neste caso é o motorista_cadastrar.inc.php
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
                <div class="column is-20 is-offset-0">
                    <h3 class="title has-text-grey">Cadastro do Motorista</h3>
			
		
		
		
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Mensagens de erro com CSS na interface -->
	<!-- As validações e disparo dos erros são feitos na controladora motorista_cadastrar.inc.php -->	
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


					
					
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Interface -->
	<div class="box">
	<!-- Esta interface terá comunicação com o arquivo motorista_cadastrar.inc.php -->
	<!-- Para o UPLOAD de fotos funcionar é preciso adicionar enctype="multipart/form-data" ao FORM -->
	<form action="motorista_cadastrar.inc.php" method="POST" autocomplete="off" enctype="multipart/form-data">
	<!-- **************************************************** -->
	<!-- Motorista -->
	<div class="field"><h1>&nbsp;</h1><p><br>
		<div class="control">
			<em><strong>Os campos com * são Obrigatórios</strong></em><br>
			<strong>Informação de Sigla:</strong> CNH ( Carteira Nacional de habilitação )
		</div>
	</div>
		
	<table width="1270" border="0">
  <tbody>
    <tr>
      <td width="608"><!-- Campo de digito CPF -->	
	<div class="field">
		<div class="control">
			<strong>* CPF:</strong>  &nbsp; ( Apenas números )
			<input name="cpf" type="text" class="input " placeholder="CPF" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
		</div>
	</div>&nbsp;</td>
      <td width="31">&nbsp;</td>
      <td width="621"><!-- Campo de digito Logradouro -->	
	<div class="field">
		<div class="control">
			<strong>* Logradouro: </strong>
			<input name="logradouro" type="text" class="input " placeholder="Logradouro" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Nome Completo -->	
	<div class="field">
		<div class="control">
			<strong>* Nome Completo:</strong>
				<input name="nome" type="text" class="input " placeholder="Nome Completo" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="250">
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
      <td><!-- Campo de digito RG Identidade -->	
	<div class="field">
		<div class="control">
			<strong>* RG / Identidade:</strong>  &nbsp; ( Apenas números )
			<input name="identidade" type="text" class="input " placeholder="Identidade" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
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
      <td><!-- Campo de digito Telefone -->	
	<div class="field">
		<div class="control">
			<strong>* Telefone: </strong>  &nbsp; ( Apenas números )
			<input name="telefone" type="text" class="input " placeholder="Telefone" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
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
      <td><!-- Campo de digito Email -->	
	<div class="field">
		<div class="control">
			<strong>* Email:</strong> &nbsp; ( exemplo@mail.com )
			<input name="email" type="text" class="input " placeholder="E-mail" oninput="this.value = this.value.replace(/[^A-Za-z0-9-@.]+/g, '').replace(/(\..*)\./g, '$1');" autofocus maxlength="100">
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
    <tr >
      <td><!-- Campo de digito Número de Registro -->	
	<div class="field">
		<div class="control">
			<strong>* Número de Registro da CNH: </strong>  &nbsp; ( Apenas números )
			<input name="numero_registro" type="text" class="input " placeholder="Nº Registro" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
		</div>
	</div></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><!-- Campo de digito Estado -->	
	<div class="field">
		<div class="control">
			<strong>* Estado: </strong>
			<input name="estado" type="text" class="input " placeholder="Estado" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="50">
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Categoria -->	
	<div class="field">
		<div class="control">
			<strong>* Categoria da CNH:</strong> &nbsp; ( ABCDE )
				<input name="categoria" type="text" class="input " placeholder="Categoria" autofocus oninput="this.value = this.value.replace(/[^A-Za-z]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="5">
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
      <td><!-- VENCIMENTO CNH -->
	<!-- DATAS VENCIDAS NÃO SERÃO ACEITAS -->
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
	<script src="css/jquery.min.js"></script>
	<div class="field">
		<div class="control">
			<strong>* Data de Validade da CNH:</strong> ( Datas já vencidas não serão aceitas )
				<input name="date" type="date" class="input " >
		</div>
	</div>		
	<script> // javascript
		// Pega o valor da data mais atual
		var hoje = new Date().toISOString().split('T')[0];
		document.getElementsByName("date")[0].setAttribute('min', hoje);
	</script>
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="center">
      <td align="center" colspan="3"><div class="field">
        <div class="control ">
          <p>&nbsp;</p>
          <table width="1270" border="0">
            <tbody>
              <tr>
                <td width="361">&nbsp;</td>
                <td width="876"><strong>* Adcione a foto da sua CNH:</strong>
            ( Somente <strong>UMA</strong> foto com Frente e Verso ) <br>
            ( A foto deve ter no máximo o tamanho de <strong>5mb</strong> ) -
            ( Formatos aceitos: <strong>PNG, JPEG ou JPG</strong> )&nbsp;</td>
                <td width="19">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table>
          <p>
            
          </p>
        </div>
        </div>&nbsp;
        <!-- FOTO CNH -->
        <!-- ***************************************************** -->
        <!-- ***************************************************** -->
        <!-- ***************************************************** -->
        <!-- ***************************************************** -->
        <!-- ***************************************************** -->
        
        <!-- FOTO CNH -->
        <!-- ***************************************************** -->
        <strong></strong>
        <div class="field">
          <div id="script_foto_cnh" class="file is-centered is-boxed has-name">
            <label class="file-label">
              <!-- Input onde o usuário irá adiocionar a foto da sua CNH -->
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
        <!-- ***************************************************** -->		
        <!-- JAVA SCRIPT -->
        <script>
		const fileInputCNH = document.querySelector('#script_foto_cnh input[type=file]');
		fileInputCNH.onchange = () => 
		{
			// se houver tentativa de upload e o arquivo for menor do que 5MB
			// o upload será aceito e o campo do upload irá se tornar da cor verde através de CSS
			// o arquivo será adicionado ao campo
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
        <!-- ***************************************************** -->
        <!-- ***************************************************** -->
        <!-- ***************************************************** -->&nbsp;</td>
    </tr>
    </tbody>
</table>


	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	
		
	<p><br>
	
	<!-- **************************************************** -->
	
		
	<!-- **************************************************** -->
	
		
	
	
	
		
	
		
	
	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	

	<!-- Botão cadastrar com design CSS -->
	<button type="submit" name="cadastrar_botao" class="button is-block is-dark is-large is-fullwidth">Cadastrar</button>
		<!-- **************************************************** -->
		<!-- Botão cancelar -->
		<a href="locacao_cadastro.php"><strong>Cancelar Locação</strong></a>
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
