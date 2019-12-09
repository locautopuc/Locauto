<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de controle
// neste caso é o locacao_cadastrar.inc.php
require 'conexao.php';
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
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-20 is-offset-0">
                    <h3 class="title has-text-grey">Locacao</h3>
					
					
					
						
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Mensagens de erro com CSS na interface -->
	<!-- As validações e disparo dos erros são feitos na controladora veiculo_cadastrar.inc.php -->	
	<!-- **************************************************** -->
	<!-- SESSION status_cadastro -->
	<?php
		if(isset($_SESSION['status_cadastro'])):
	?>
	<div class="notification is-success">
		<p>Seu cadastro foi feito com sucesso!</p>
		
	</div>
	<?php
		endif;
		unset($_SESSION['status_cadastro']);
	?>
	<!-- fim SESSION status_cadastro -->
	<!-- **************************************************** -->


	<!-- SESSION placa_existe -->
	<?php
		if(isset($_SESSION['placa_existe'])):
	?>
	<div class="notification is-danger">
		<p>A placa escolhida já existe. Informe outra e tente novamente.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['placa_existe']);
	?>
	<!-- fim SESSION placa_existe -->
	<!-- **************************************************** -->
					
					
	<!-- SESSION chassi_existe -->
	<?php
		if(isset($_SESSION['chassi_existe'])):
	?>
	<div class="notification is-danger">
		<p>O chassi escolhido já existe. Informe outro e tente novamente.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['chassi_existe']);
	?>
	<!-- fim SESSION chassi_existe -->
	<!-- **************************************************** -->

					
	<!-- SESSION renavam_existe -->
	<?php
		if(isset($_SESSION['renavam_existe'])):
	?>
	<div class="notification is-danger">
		<p>O renavam escolhido já existe. Informe outro e tente novamente.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['renavam_existe']);
	?>
	<!-- fim SESSION renavam_existe -->
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
		
					
					
	<!-- SESSION situacao_escolher -->
	<?php
		if(isset($_SESSION['situacao_escolher'])):
	?>
	<div class="notification is-danger">
		<p>Escolha uma situação.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['situacao_escolher']);
	?>
	<!-- fim SESSION situacao_escolher -->
	<!-- **************************************************** -->
					

	<!-- SESSION marca_escolher -->
	<?php
		if(isset($_SESSION['marca_escolher'])):
	?>
	<div class="notification is-danger">
		<p>Escolha uma marca.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['marca_escolher']);
	?>
	<!-- fim SESSION marca_escolher -->
	<!-- **************************************************** -->
					
					
	<!-- SESSION modelo_escolher -->
	<?php
		if(isset($_SESSION['modelo_escolher'])):
	?>
	<div class="notification is-danger">
		<p>Escolha um modelo.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['modelo_escolher']);
	?>
	<!-- fim SESSION modelo_escolher -->
	<!-- **************************************************** -->
					
					
	<!-- SESSION categoria_escolher -->
	<?php
		if(isset($_SESSION['categoria_escolher'])):
	?>
	<div class="notification is-danger">
		<p>Escolha uma categoria.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['categoria_escolher']);
	?>
	<!-- fim SESSION categoria_escolher -->
	<!-- **************************************************** -->


	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Interface -->
	<div class="box">
	<!-- Esta interface terá comunicação com o arquivo veiculo_cadastrar.php -->
	<!-- Para o UPLOAD de fotos funcionar é preciso adicionar enctype="multipart/form-data" ao FORM -->
	<form action="locacao_cadastrar.inc.php" method="POST" autocomplete="off" enctype="multipart/form-data">

	<div class="field">
	  <h1>&nbsp;</h1>
	  <p><br>
		<!-- **************************************************** -->
		<!-- Veiculo -->
		<div class="control">
			<em><strong>Os campos com * são Obrigatórios</strong></em><br><br>
		</div>
	</div>
		
		<table width="1270" border="0">
  <tbody>
    <tr>
      <td width="624"><!-- Campo de digito Placa -->
	<div class="field">
		<div class="control">
			<strong>* Placa do Veículo:</strong>
			<input name="placa" type="text" class="input " disabled placeholder="Placa" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9- ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
		</div>
	</div>&nbsp;</td>
      <td width="20">&nbsp;</td>
      <td width="612"><!-- Campo de digito Número de Passageiros -->
	<div class="field">
		<div class="control">
			<strong>* Quilometragem Inicial: </strong>
			<input name="kilometragem_inicial" type="text" class="input " disabled placeholder="Quilometragem Inicial" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Chassi -->
	<div class="field">
		<div class="control">
			<strong>* CPF ou CNPJ:</strong>
			<input name="cpf_cnpj" type="text" class="input " disabled placeholder="CPF ou CNPJ" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="14">
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Ano de Fabricação -->
	<div class="field">
		<div class="control">
			<strong>* Quilometragem Final:</strong>
			<input name="kilometragem_final" class="input " placeholder="Quilometragem Final" disabled autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- **************************************************** -->
	<!-- Campo de digito Renavam -->
	<div class="field">
		<div class="control">
			<strong>* CPF do Motorista: </strong>
			<input name="cpf" type="text" class="input " disabled placeholder="CPF do Motorista" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Ano do Modelo -->
	<div class="field">
		<div class="control">
			<strong>* Valor da Locação:</strong>
			<input name="valor_locacao" type="text" class="input " placeholder="Valor da Locacao" disabled autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Preço de Compra -->
	<div class="field">
		<div class="control">
			<strong>* Data da Retirada: </strong>
			<input name="data_retirada" type="text" class="input " disabled placeholder="Data de Retirada" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Tipo de Combustivel -->
	<div class="field">
		<div class="control">
			<strong>* Valor do Calção: </strong>
			<input name="valor_calcao" type="text" class="input " placeholder="Valor do Calção" disabled autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9.]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Preço de Venda -->
	<div class="field">
		<div class="control">
			<strong>* Data da Devolução: </strong>
			<input name="data_devolucao" type="text" class="input " disabled placeholder="Data de Retirada" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Kilometragem -->
	<div class="field">
		<div class="control">
			<strong>* Valor do Seguro: </strong>
			<input name="kilometragem" type="text" class="input " placeholder="Kilometragem" disabled autofocus oninput="this.value = this.value.replace(/[^0-9.]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Potencia -->
	<div class="field">
		<div class="control">
			<strong>* Pagamento Final: </strong>
			<input name="potencia" type="text" class="input " disabled placeholder="Potência" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9.]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>


	<!-- **************************************************** -->
	
	
		
<!-- Trigger -->
<!--

ZOOM IN and ZOOM OUT

<ul id="zoom_triggers">
<li><a id="zoom_in">zoom in</a></li>
<li><a id="zoom_out">zoom out</a></li>
<li><a id="zoom_reset">reset zoom</a></li>
</ul>

<script>
jQuery(document).ready(function($)
{
// Set initial zoom level
var zoom_level=100;

// Click events
$('#zoom_in').click(function() { zoom_page(10, $(this)) });
$('#zoom_out').click(function() { zoom_page(-10, $(this)) });
$('#zoom_reset').click(function() { zoom_page(0, $(this)) });

// Zoom function
function zoom_page(step, trigger)
{
// Zoom just to steps in or out
if(zoom_level>=120 && step>0 || zoom_level<=80 && step<0) return;

// Set / reset zoom
if(step==0) zoom_level=100;
else zoom_level=zoom_level+step;

// Set page zoom via CSS
$('body').css({
transform: 'scale('+(zoom_level/100)+')', // set zoom
transformOrigin: '50% 0' // set transform scale base
});

// Adjust page to zoom width
if(zoom_level>100) $('body').css({ width: (zoom_level*1.2)+'%' });
else $('body').css({ width: '100%' });

// Activate / deaktivate trigger (use CSS to make them look different)
if(zoom_level>=120 || zoom_level<=80) trigger.addClass('disabled');
else trigger.parents('ul').find('.disabled').removeClass('disabled');
if(zoom_level!=100) $('#zoom_reset').removeClass('disabled');
else $('#zoom_reset').addClass('disabled');
}
});
</script>
-->	
		


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
	

	

	<!-- Botão cadastrar com design CSS -->
	<button type="submit" name="cadastrar_botao" class="button is-block is-dark is-large is-fullwidth">Realizar Pagamento</button>
		<!-- Botão cancelar -->
		<a href="usuario_perfil.php"><strong>Cancelar</strong></a>
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
