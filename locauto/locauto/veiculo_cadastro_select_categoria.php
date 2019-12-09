<br>
	<?php
	require_once ("DBController.php");
	$db_handle = new DBController();
	$query = "SELECT * FROM tabela_cadastro_veiculo_marca";
	$countryResult = $db_handle->runQuery($query);
	?>	
		
	<!-- SCRIPT AJAX -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
	<script src="js/jquery-2.1.1.min.js"
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
	url: "veiculo_cadastrar.inc.php",
	data:'ID_marca='+str,
	success: function(data) { $("#modelo-list").html(data); } });
	}
	</script>
	<!-- ******************************************* -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
	
	
	<!-- Selecionar Marca -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
	<div class="field">
		<div class="control">
		<strong>* Selecione uma Marca:</strong><br>
			<div class="select is-fullwidth">
				<select id="marca-list" name="marca[]" multiple size=5 onChange="getLista();">
					<option value="" selected disabled>Selecione uma Marca</option>
					<?php
						foreach ($countryResult as $marca) {
					?>
					<option value="<?php echo $marca["ID_marca"]; ?>"><?php echo $marca["marca"]; ?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
	</div>
			
		
	<br><br><br><br><br><br><br>

	<!-- Selecionar Modelo -->
	<!-- ******************************************* -->
	<!-- ******************************************* -->
	<div class="field">
		<div class="control">
			<strong>* Selecione um Modelo:</strong><br>
			<div class="select is-loading is-fullwidth">
				<select id="modelo-list" name="modelo[]" multiple size=5>
					<option value="" selected disabled>Você deve selecionar um Modelo</option>
				</select>
			</div>
		</div>
	</div>
		
		
		
		
		
	<br><br><br><br><br><br><br>