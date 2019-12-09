<?php
require_once("DBController.php");
$db_handle = new DBController();
if(!empty($_GET['ID_marca'])) {
        $marca = $_GET["ID_marca"];           
	$query ="SELECT * FROM tabela_cadastro_veiculo_modelo WHERE ID_marca IN ($marca)";
	$results = $db_handle->runQuery($query);
?>
	<option value="" selected disabled>Selecione um Modelo</option>
<?php
	foreach($results as $modelo) {
?>
	<option value="<?php echo $modelo["ID_modelo"]; ?>"><?php echo $modelo["modelo"]; ?></option>
<?php
	}
}?>