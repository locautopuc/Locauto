<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de segurança
// neste caso é o cadastrar.php
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
                    <h3 class="title has-text-grey">Cadastro do Veículo</h3>
					
	<!-- **************************************************** -->
	<!-- SESSION status_cadastro -->
	<?php
		if(isset($_SESSION['status_cadastro'])):
	?>
	<div class="notification is-success">
		<p>Seu cadastro foi feito com sucesso!</p>
		<p>Faça login informando o seu usuário e senha <a href="veiculo_cadastrar.inc.php">aqui</a></p>
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


	<!-- Interface -->
	<div class="box">
	<!-- Esta interface terá comunicação com o arquivo veiculo_cadastrar.php -->
	<!-- Para o UPLOAD de fotos funcionar é preciso adicionar enctype="multipart/form-data" ao FORM -->
	<form action="veiculo_cadastrar.inc.php" method="POST" autocomplete="off" enctype="multipart/form-data">

	<div class="field">
	  <h1><strong>Veículo</strong></h1>
	  <p><br>
		<div class="control">
			<em>Os campos com <strong>*</strong> são Obrigatórios</em><br><br>
			
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Placa:</strong>
			<input name="placa" type="text" class="input is-large" placeholder="Placa" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="14">
		</div>
	</div>
		

<!-- ************************************************* -->
<!-- LISTA DE MODELOS DE CARROS -->
<script type="text/javascript">
	function populate(marca,modelo){
	var marca = document.getElementById(marca);
	var modelo = document.getElementById(modelo);
	modelo.innerHTML = "";
	if(marca.value == "Audi")
	{
		var optionArray = ["|","a1sportback|A1 Sportback","a3sportback|A3 Sportback","a3sedan|A3 Sedan","rs3|RS3","a4sedan|A4 Sedan","a4limitededition|A4 Limited Edition","a5sportback|A5 Sportback","a6sedan|A6 Sedan"];
	}
	else if(marca.value == "BMW")
	{
		var optionArray = ["|","bmwserie1hatch|BMW Serie 1 Hatch","bmwserie3sedan|BMW Serie 3 Sedan","bmwserie4cabrio|BMW Serie 4 Cabrio","bmwserie5sedan|BMW Serie 5 Sedan","bmwz4|BMW Z4"];
	} 
	else if(marca.value == "Chevrolet")
	{
		var optionArray = ["|","joy|Joy","onix|Onix","joyplus|Joy Plus","cobalt|Cobalt","cruze|Cruze","spin|Spin","equinox|Equinox"];
	} 
	else if(marca.value == "Fiat")
	{
		var optionArray = ["|","fiatargo|Fiat Argo","fiatcronos|Fiat Cronos","fiatmobi|Fiat Mobi","fiatpalio|Fiat Palio","fiatuno|Fiat Uno"];
	}
	else if(marca.value == "Ford")
	{
		var optionArray = ["|","fordecosport|Ford Eco Sport","fordka|Ford Ka","fordranger|Ford Ranger","fordfocushatch|Ford Focus Hatch","fordfusion|Ford Fusion"];
	}
	else if(marca.value == "Honda")
	{
		var optionArray = ["|","hondaaccord|Honda Accord","hondacity|Honda City","hondacivic|Honda Civic","hondacrv|Honda CRV","hondafit|Honda Fit"];
	}
	else if(marca.value == "Hyundai")
	{
		var optionArray = ["|","hyundaiazera|Hyundai Azera","hyundaicreta|Hyundai Creta","hyundaielantra|Hyundai Elantra","hyundaihb20|Hyundai HB20","hyundaihb20s|Hyundai HB20S"];
	}
	else if(marca.value == "Jeep")
	{
		var optionArray = ["|","fjeepcompass|Jeep Compass","jeepgrandcherokee|Jeep Grand Cherokee","jeeprenegade|Jeep Renegade","jeepwrangler|Jeep WRangler"];
	}
	else if(marca.value == "MercedesBenz")
	{
		var optionArray = ["|","mercedesbenzclassec|Mercedes Benz Classe C","mercedesbenzclassea|Mercedes Benz Classe A","mercedesbenzclasseb|Mercedes Benz Classe B","mercedesbenzclassecls|Mercedes Benz Classe CLS"];
	}
	else if(marca.value == "Nissan")
	{
		var optionArray = ["|","nissanmarch|Nissan March","nissanversa|Nissan Versa","nissansentra|Nissan Sentra","nissanleaf|Nissan Leaf"];
	}
	else if(marca.value == "Peugeot")
	{
		var optionArray = ["|","peugeot208|Peugeot 208","peugeot2008|Peugeot 2008","peugeot3008|Peugeot 3008","peugeot5008|Peugeot 5008"];
	}
	else if(marca.value == "Renault")
	{
		var optionArray = ["|","renaultduster|Renault Duster","renaultsandero|Renault Sandero","renaultkwid|Renault Kwid","renaultlogan|Renault Logan","renaultcaptur|Renault Captur"];
	}
	else if(marca.value == "Volkswagen")
	{
		var optionArray = ["|","gol|Gol","fox|Fox","novopolo|Novo Polo","golf|Golf","voyage|Voyage"];
	}
			
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		modelo.options.add(newOption);
	}
}
</script>
<!-- fim LISTA DE MODELOS DE CARROS -->
<!-- ************************************************* -->
		

	<div class="field">
		<div class="control">
			<strong>* Selecione uma Marca:</strong><br>
				<div class="select">
					<select id="marca" name="marca" onChange="populate(this.id,'modelo')">
						<option disabled selected value="">Selecione uma Marca</option>
						<option value="Audi">Audi</option>
						<option value="BMW">BMW</option>
						<option value="Chevrolet">Chevrolet</option>
						<option value="Fiat">Fiat</option>
						<option value="Ford">Ford</option>
						<option value="Honda">Honda</option>
						<option value="Hyundai">Hyundai</option>
						<option value="Jeep">Jeep</option>
						<option value="MercedesBenz">Mercedes</option>
						<option value="Nissan">Nissan</option>
						<option value="Peugeot">Peugeot</option>
						<option value="Renault">Renault</option>
						<option value="Volkswagen">Volkswagen</option>
					</select>
				</div>
		</div>
	</div>



	<div class="field">
		<div class="control">
			<strong>* Selecione um Modelo:</strong><br>
			<div class="select">
				<select id="modelo" name="modelo">
					<option disabled selected value="">Selecione uma Marca primeiro</option>
				</select>
			</div>
		</div>
	</div>

	

	<div class="field">
		<div class="control">
			<strong>* Chassi:</strong>
			<input name="chassi" type="text" class="input is-large" placeholder="Chassi" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');" >
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Renavam: </strong>
			<input name="renavam" type="text" class="input is-large" placeholder="Renavam" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Selecione uma Categoria:</strong><br>
				<div class="select">
					<select id="categoria" name="categoria">
						<option disabled selected value="">Selecione uma Categoria</option>
						<option value="economico">Economico</option>
						<option value="intermediario">Intermediario</option>
						<option value="suv">SUV</option>
						<option value="executivo">Executivo</option>
						<option value="utilitario">Utilitario</option>
					</select>
				</div>
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Preço de Compra: </strong>
			<input name="preco_compra" type="text" class="input is-large" placeholder="Preço de Compra" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Preço de Venda: </strong>
			<input name="preco_venda" type="text" class="input is-large" placeholder="Preço de Venda" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div><p><br>

	
	<div class="field">
		<div class="control">
			<strong>* Número de Passageiros: </strong>
			<input name="numero_passageiro" type="text" class="input is-large" placeholder="N de Passageiros" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Ano de Fabricação: </strong> &nbsp; ( Apenas 1900 até o ano atual )
			<input name="ano_fabricacao" type="text" min="1900" max="<?php echo date('Y'); ?>" class="input is-large" placeholder="1900 a <?php echo date('Y'); ?>" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Ano Modelo: </strong>  &nbsp; ( Apenas 1900 até o ano atual )
			<input name="ano_modelo" type="text" min="1900" max="<?php echo date('Y'); ?>" class="input is-large" placeholder="1900 a <?php echo date('Y'); ?>" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
		</div>
	</div> 

	<div class="field">
		<div class="control">
			<strong>* Tipo de Combustivel: </strong>
			<input name="tipo_combustivel" type="text" class="input is-large" placeholder="Tipo de Combustivel" autofocus >
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Kilometragem: </strong>
			<input name="kilometragem" type="text" class="input is-large" placeholder="Kilometragem" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Potência: </strong>
			<input name="potencia" type="text" class="input is-large" placeholder="Potência" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>

	<div class="field">
		<div class="control">
			<strong>* Capacidade do Porta Malas: </strong>
			<input name="capacidade_pmalas" class="input is-large" type="text" placeholder="Capacidade do Porta Malas" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');" >
		</div>
	</div>
		
		
	
	
	<div class="field">
		<div class="control">
			<br><strong>* Situação do Veículo : Disponível ou Locado?</strong><br><br>
			<label class="radio">
				<input class="is-checkradio" type="radio" name="situacao" value="Disponivel" checked="checked" onChange="findselected()">
				Disponível
			</label><br>
			<label class="radio">
				<input class="is-checkradio" type="radio" name="situacao" value="Locado" onChange="findselected()">
				Locado<br>
			<label class="radio">
				<input class="is-checkradio" type="radio" name="situacao" value="Vendido" onChange="findselected()">
				Vendido<br><br>
			</label>
		</div>
	</div>
		
	

	<!-- FOTO VEICULO -->
	<!-- ***************************************************** -->
	<div class="field">
		<div class="control"><br>
			<strong>* Adcione a foto do Veículo:</strong><br>
			( Somente <strong>UMA</strong> foto do veículo por completo )<br>
			( A foto deve ter no máximo um tamanho de 5mb )<br>
			( Formatos aceitos: PNG, JPEG ou JPG )
		</div>
	</div> 
	
	<!-- FOTO VEICULO -->
	<!-- ***************************************************** -->
	<strong>Veículo:</strong>
	<div class="field">
		<div id="script_foto_veiculo" class="file is-centered is-boxed has-name">
			<label class="file-label">
				<input class="file-input" type="file" name="foto_veiculo" accept=".png,.jpeg,.jpg">
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
		const fileInputVEICULO = document.querySelector('#script_foto_veiculo input[type=file]');
		fileInputVEICULO.onchange = () => 
		{
			// se houver tentativa de upload e o arquivo for menor do que 5MB - OK
			if (fileInputVEICULO.files.length > 0 && fileInputVEICULO.files[0].size < 5000000) 
			{
				document.getElementById("script_foto_veiculo").className = "file is-centered is-boxed is-success has-name";
				const fileName = document.querySelector('#script_foto_veiculo .file-name');
				fileName.textContent = fileInputVEICULO.files[0].name;
			}
			// se houver tentativa de upload e o arquivo for maior do que 5MB - ERRO
			else if (fileInputVEICULO.files.length > 0 && fileInputVEICULO.files[0].size > 5000000)
				{
					alert("ERRO: O arquivo é maior do que 5mb, por favor, adicione uma foto que seja menor do que o tamanho de 5mb.");
					this.value = "";
				}
			// se houver tentativa de upload e o arquivo for menor do que 5MB e o tipo for diferente de PNG JPG JPEG - ERRO
			else if(fileInputVEICULO.files.length > 0 && fileInputVEICULO.files[0].size < 5000000 && fileInputVEICULO.files.type != "jpg" && fileInputVEICULO.files.type != "png" && fileInputVEICULO.files.type != "jpeg")
				{
					alert("ERRO: Arquivo com formato incorreto! Por favor, adicione um arquivo do tipo PNG, JPEG ou JPG.");
					this.value = "";
				}
		}
	</script> 
	<!-- ***************************************************** -->
		
		<br><br>

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
	// chamando o arquivo rodape
	require 'rodape.php'; 
	?>
	</body>
</html>
