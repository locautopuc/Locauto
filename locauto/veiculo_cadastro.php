<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de controle
// neste caso é o veiculo_cadastrar.inc.php
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
		// chamando o arquivo cabeçalho logado
		require 'cabecalho_funcionario_logado.php'; 
		?>
		
		
		

	
						
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-20 is-offset-0">
                    <h3 class="title has-text-grey">Cadastro do Veículo</h3>
					
					
					
						
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
		
					
	<!-- SESSION ano_fabricacao_escolher -->
	<?php
		if(isset($_SESSION['ano_fabricacao_escolher'])):
	?>
	<div class="notification is-danger">
		<p>Escolha o Ano de Fabricação.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['ano_fabricacao_escolher']);
	?>
	<!-- fim SESSION ano_fabricacao_escolher -->
	<!-- **************************************************** -->
					
					
		<!-- SESSION ano_modelo_escolher -->
	<?php
		if(isset($_SESSION['ano_modelo_escolher'])):
	?>
	<div class="notification is-danger">
		<p>Escolha o Ano do Modelo.</p>
	</div>
	<?php
		endif;
		unset($_SESSION['ano_modelo_escolher']);
	?>
	<!-- fim SESSION ano_fabricacao_escolher -->
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
	<form action="veiculo_cadastrar.inc.php" method="POST" autocomplete="off" enctype="multipart/form-data">

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
      <td width="627"><!-- Campo de digito Placa -->
	<div class="field">
		<div class="control">
			<strong>* Placa:</strong>
			<input name="placa" type="text" class="input " placeholder="Placa" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9- ]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="14">
		</div>
	</div>&nbsp;</td>
      <td width="18">&nbsp;</td>
      <td width="615"><!-- Campo de digito Número de Passageiros -->
	<div class="field">
		<div class="control">
			<strong>* Número de Passageiros: </strong>
			<input name="numero_passageiro" type="text" class="input " placeholder="N de Passageiros" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- ************************************************* -->
<!-- ************************************************* -->
<!-- JAVA SCRIPT -->
<!-- LISTA DE MODELOS DE CARROS -->
<?php require 'veiculo_lista_modelo.js'; ?>

<!-- LISTA DE MARCAS DE CARROS -->
<!-- ************************************************* -->
<!-- ************************************************* -->
	<div class="field">
		<div class="control">
			<strong>* Selecione uma Marca:</strong><br>
				<div class="select is-fullwidth">
					<select id="marca" name="marca" onChange="populate(this.id,'modelo')">
						<option disabled selected value="">Selecione uma Marca</option>
						<?php require 'veiculo_lista_marca.php'; ?>
					</select>
				</div>
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Ano de Fabricação -->
	<div class="select is-fullwidth">
		<div class="control">
			<strong>* Ano de Fabricação: </strong> &nbsp; ( Apenas 1900 até o ano atual )<br>
			<input name="ano_fabricacao" type="text" min="1900" max="<?php echo date('Y'); ?>" class="input " placeholder="1900 a <?php echo date('Y'); ?>" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
		<?php /*
  // Sets the top option to be the current year. (IE. the option that is chosen by default).
  $ano_fabricacao = date('Y'); 
  // Year to start available options at
  $earliest_year = 1900; 
  // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
  $latest_year = date('Y'); 

  print '<select>';
  // Loops over each int[year] from current year, back to the $earliest_year [1950]
  foreach ( range( $latest_year, $earliest_year ) as $i ) {
    // Prints the option with the next year in range.
    print '<option value="'.$i.'"'.($i === $ano_fabricacao ? ' selected="selected"' : '').'>'.$i.'</option>';
  }
  print '</select>';
  */?>
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- **************************************************** -->
	<!-- Campo de escolha de Modelos -->
	<div class="field">
		<div class="control">
			<strong>* Selecione um Modelo:</strong><br>
			<div class="select is-fullwidth">
				<select id="modelo" name="modelo">
					<option disabled selected value="">Selecione uma Marca primeiro</option>
				</select>
			</div>
		</div>
	</div> &nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Ano do Modelo -->
	<div class="select is-fullwidth">
		<div class="control">
			<strong>* Ano Modelo: </strong>  &nbsp; ( Apenas 1900 até o ano atual )<br>
			<input name="ano_modelo" type="text" min="1900" max="<?php echo date('Y'); ?>" class="input " placeholder="1900 a <?php echo date('Y'); ?>" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
			<?php /*
  // Sets the top option to be the current year. (IE. the option that is chosen by default).
  $ano_modelo = date('Y'); 
  // Year to start available options at
  $earliest_year = 1900; 
  // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
  $latest_year = date('Y'); 

  print '<select>';
  // Loops over each int[year] from current year, back to the $earliest_year [1950]
  foreach ( range( $latest_year, $earliest_year ) as $i ) {
    // Prints the option with the next year in range.
    print '<option value="'.$i.'"'.($i === $ano_modelo ? ' selected="selected"' : '').'>'.$i.'</option>';
  }
  print '</select>';
  */ ?>
		</div>
	</div> &nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Chassi -->
	<div class="field">
		<div class="control">
			<strong>* Chassi:</strong>
			<input name="chassi" type="text" class="input " placeholder="Chassi" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');" maxlength="17">
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Tipo de Combustivel -->
	<div class="field">
		<div class="control">
			<strong>* Tipo de Combustivel: </strong>
			<input name="tipo_combustivel" type="text" class="input " placeholder="Tipo de Combustivel" oninput="this.value = this.value.replace(/[^A-Za-z0-9-çÇãõÃÕÁ-Úá-úÂ-ûâ-û., ]+/g, ]+/g, '').replace(/(\..*)\./g, '$1');" autofocus maxlength="50">
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Renavam -->
	<div class="field">
		<div class="control">
			<strong>* Renavam: </strong>
			<input name="renavam" type="text" class="input " placeholder="Renavam" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11">
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Kilometragem -->
	<div class="field">
		<div class="control">
			<strong>* Kilometragem: </strong>
			<input name="kilometragem" type="text" class="input " placeholder="Kilometragem" autofocus oninput="this.value = this.value.replace(/[^A-Za-z0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de seleção de categoria -->
	<div class="field">
		<div class="control">
			<strong>* Selecione uma Categoria:</strong><br>
				<div class="select is-fullwidth">
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
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Potencia -->
	<div class="field">
		<div class="control">
			<strong>* Potência: </strong>
			<input name="potencia" type="text" class="input " placeholder="Potência" autofocus oninput="this.value = this.value.replace(/[^0-9.]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Preço de Compra -->
	<div class="field">
		<div class="control">
			<strong>* Preço de Compra: </strong>
			<input name="preco_compra" type="text" class="input " placeholder="Preço de Compra" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- Campo de digito Capacidade do porta malas -->
	<div class="field">
		<div class="control">
			<strong>* Capacidade do Porta Malas: </strong>
			<input name="capacidade_pmalas" class="input " type="text" placeholder="Capacidade do Porta Malas" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');" >
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td><!-- Campo de digito Preço de Venda -->
	<div class="field">
		<div class="control">
			<strong>* Preço de Venda: </strong>
			<input name="preco_venda" type="text" class="input " placeholder="Preço de Venda" autofocus oninput="this.value = this.value.replace(/[^0-9]+/g, '').replace(/(\..*)\./g, '$1');">
		</div>
	</div>&nbsp;</td>
      <td>&nbsp;</td>
      <td><!-- **************************************************** -->
	<!-- Campo de selecionar Situação do Veiculo -->
	<!-- Disponivel / Locado / Vendido -->
	<div class="field">
		<div class="control">
			<br><strong>* Situação do Veículo : </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label class="radio">
				<input class="is-checkradio" type="radio" name="situacao" value="Disponivel" checked="checked" onChange="findselected()">
				Disponível  &nbsp;&nbsp;&nbsp;
			</label>
			<label class="radio">
				<input class="is-checkradio" type="radio" name="situacao" value="Locado" onChange="findselected()">
				Locado  &nbsp;&nbsp;&nbsp;&nbsp;
			<label class="radio">
				<input class="is-checkradio" type="radio" name="situacao" value="Vendido" onChange="findselected()">
				Vendido
			</label>
		</div>
	</div>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center" colspan="3"><table align="center" width="1270" border="0">
        <tbody>
          <tr>
            <td width="328">&nbsp;</td>
            <td width="773" align="center"><div class="field">
		<div class="control"><br>
			<strong>* Adcione a foto do Veículo:</strong>
			( Somente <strong>UMA</strong> foto do veículo por completo )<br>
			( A foto deve ter no máximo o tamanho de <strong>5mb</strong> ) -
			( Formatos aceitos: <strong>PNG, JPEG ou JPG</strong> ) </div>
	</div> &nbsp;</td>
            <td width="155">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>


	<!-- **************************************************** -->
	
		
		

	<!-- **************************************************************************** -->
	<!-- **************************************************************************** -->
	<!-- **************************************************************************** -->
	<?php /*
	require_once ("DBController.php");
	$db_handle = new DBController();
	$query = "SELECT * FROM tabela_cadastro_veiculo_marca";
	$countryResult = $db_handle->runQuery($query); */
	?>	
		
		

		
	<!-- SCRIPT AJAX -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
<!--	<script src="js/jquery-2.1.1.min.js"
	type="text/javascript"></script>
	<script>
	function getLista() 
	{
		var str='';
		var val=document.getElementById('marca-list');
		for (i=0;i< val.length;i++) 
		{ 
			if(val[i].selected){
			str += val[i].value + ','; 
		}
	}         
	var str=str.slice(0,str.length -1);

	$.ajax({          
	type: "GET",
	//url: "veiculo_cadastrar.inc.php",
	url: "veiculo_cadastro_lista_marca_modelo_C.inc.php",
	data:'ID_marca='+str,
	success: function(data) { $("#modelo-list").html(data); } });
	} 
	</script> -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
	
	
	<!-- Selecionar Marca -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
<!--	<div class="field">
		<div class="control">
		<strong>* Selecione uma Marca:</strong><br>
			<div class="select is-fullwidth">
				<select id="marca-list" name="marca[]" multiple size=5 onChange="getLista();">
					<option value="" selected disabled>Selecione uma Marca</option>
					<?php
						//foreach ($countryResult as $marca) {
					?>
					<option value="<?php //echo $marca["ID_marca"]; ?>"><?php //echo $marca["marca"]; ?></option> 
					<?php
					//}
					?>
<!--				</select>
			</div>
		</div>
	</div>
			
		
	<br><br><br><br><br><br><br> -->

	<!-- Selecionar Modelo -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
<!--	<div class="field">
		<div class="control">
			<strong>* Selecione um Modelo:</strong><br>
			<div class="select is-loading is-fullwidth">
				<select id="modelo-list" name="modelo[]" multiple size=5>
					<option value="" selected disabled>Você deve selecionar um Modelo primeiro</option>
				</select>
			</div>
		</div>
	</div>  -->
	<!-- **************************************************************************** -->
	<!-- **************************************************************************** -->
	<!-- **************************************************************************** -->
	<!-- **************************************************************************** -->
		
<!--	<br><br><br><br><br><br><br>  -->
		
		
		
 		

		
		

	

	<!-- **************************************************** -->
	

	<!-- **************************************************** -->
	
		
	<!-- **************************************************** -->
	
			
		
		
		
	<!-- **************************************************** -->
	<!-- Campo de seleção de categoria -->
<!--	<div class="field">
		<div class="control">
			<strong>* Selecione uma Categoria:</strong><br>
				<div class="select is-fullwidth">
					<select id="categoria" name="categoria">
						<option value="" selected disabled>Selecione uma Categoria</option>
						<?php 
							/*$tabela_cadastro_veiculo_categoria = "SELECT * FROM tabela_cadastro_veiculo_categoria ORDER BY categoria ASC";
							$resultado_categoria = mysqli_query($conexao, $tabela_cadastro_veiculo_categoria);
							while($row_resultado = mysqli_fetch_assoc($resultado_categoria))
							{ 
							?>
							<option value="<?php echo $row_resultado['ID_categoria']; ?>"><?php echo $row_resultado['categoria'];?></option> 
							<?php
							}
							*/?>
					</select>
				</div>
		</div>
	</div>
-->
		

	
	
	<!-- FOTO VEICULO -->
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
	
	
	<!-- FOTO VEICULO -->
	<!-- ***************************************************** -->
	<strong></strong>
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
		
	<!-- JAVA SCRIPT -->	
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
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
	<!-- ***************************************************** -->
		
		<br><br>

	<!-- Botão cadastrar com design CSS -->
	<button type="submit" name="cadastrar_botao" class="button is-block is-dark is-large is-fullwidth">Cadastrar</button>
		<!-- Botão cancelar -->
		<a href="funcionario_perfil.php"><strong>Cancelar</strong></a>
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
