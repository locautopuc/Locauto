
<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de segurança

session_start();
require 'conexao.php';
include('verifica_login.php');

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
		
	<script type="text/javascript">	
		function random_pic($dir = 'uploads/imagens/veiculo/'.$marca.'/'.$modelo.'/')
{
    $files = glob($dir . '/*.*');
    $file = array_rand($files);
    return $files[$file];
}</script>
		
	</head>
	
	<body>
		

	
		
	<?php
		// chamando o arquivo cabeçalho logado
		require 'cabecalho_logado.php'; 
		?>



	<section class="hero is-success is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-20 is-offset-0">
					<h3 class="title has-text-grey">Lista de Veículos</h3>


	<!-- Interface -->
	<div class="box">
		<!-- Esta interface terá comunicação com o arquivo cadastrar.php -->
		<form action="usuario_perfil.php" method="POST" autocomplete="off" enctype="multipart/form-data">

			<div class="field">
			  <h1><strong>Veículos Disponíveis</strong></h1>
			  <p><br>

				<h3>Olá, <strong>
				<?php echo $_SESSION['nome']; ?> <br> <?php echo $_SESSION['escolher']; ?> : <?php echo $_SESSION['cpf_cnpj']; ?>
				<!-- </strong><br>Seja bem vindo ao seu perfil.</h3> -->

			</div>
				
				
				


	<div class="field">
		<div class="control"><br><br>
			<?php 
			$tabela_cadastro_usuario = "SELECT * FROM tabela_cadastro_veiculo WHERE situacao = 'Disponivel' ORDER BY placa ASC";
			//$tabela_cadastro_usuario = "SELECT * FROM tabela_cadastro_motorista WHERE id = $id ORDER BY nome ASC";
			$resultado_usuario = mysqli_query($conexao, $tabela_cadastro_usuario);
			while($row_resultado = mysqli_fetch_assoc($resultado_usuario))
			{ 
			?>
			 
	
			
			

<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" bgcolor="#9FD3FF"><tbody><tr  class="is-selected"><td>Dados do Veiculo: <option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['marca'];?></option>&nbsp;</td></tr></tbody></table>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" border="1">
	
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" bgcolor="#9FD3FF"><tbody><tr  class="is-selected"><td><h2><a class="button is-block is-dark is-large is-fullwidth " href="motorista_cadastro.php">Locar este Veículo</a></h2></td></tr></tbody></table>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" border="0">
	
  <tbody>
    <tr>
      <td>Placa: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['placa'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Marca: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['marca'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Modelo: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['modelo'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Chassi: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['chassi'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Renavam: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['renavam'];?></option>&nbsp;</td>
    </tr>
	<tr>
      <td>Categoria: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['categoria'];?></option>&nbsp;</td>
    </tr>
	 <tr>
      <td>Peço de Compra: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>">R$ <?php echo $row_resultado['preco_compra'];?></option>&nbsp;</td>
    </tr>
	<tr>
      <td>Preço de venda: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>">R$ <?php echo $row_resultado['preco_venda'];?></option>&nbsp;</td>
    </tr>
    
	<tr>
      <td>Número de Passageiros: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['numero_passageiro'];?></option>&nbsp;</td>
    </tr>
    <tr>
    <tr>
      <td>Ano de Fabricação: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['ano_fabricacao'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Ano do Modelo: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['ano_modelo'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Tipo de Combustível: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['tipo_combustivel'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Quilometragem: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['kilometragem'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Potencia: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['potencia'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Capacidade do Porta Malas: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>">Litros <?php echo $row_resultado['capacidade_pmalas'];?></option></td>
    </tr>
	 <tr>
      <td>Situação: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>"><?php echo $row_resultado['situacao'];?></option>&nbsp;</td>
    </tr>
	<tr>
      <td>Foto do Veiculo: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_veiculo']; ?>">
	
	
		  <!-- ARRUMAR O MOSTRAR FOTO DE VEICULO -->
	<?php 
	//echo '<img src="uploads/imagens/'.$row_resultado['marca'].'/'.$row_resultado['modelo'].'/'.$row_resultado['foto_veiculo'].'" width="100" height="100">'; 
	//echo '<img src="uploads/imagens/veiculo/'.$row_resultado['marca'].'/'.$row_resultado['foto_veiculo'].'" width="100" height="100">';
	echo '<img src="'.$row_resultado['foto_veiculo'].'" width="500" height="500">';
	//echo $row_resultado['foto_veiculo'];
    ?></option>&nbsp;</td>
    </tr>
	 </tbody>
</table><br><br>

		<?php
			}
		?>
		</div>
	</div>
					


	<div class="field">
		<div class="control"><br><br>
			<h2><a class="button is-block is-dark is-large is-fullwidth " href="usuario_perfil.php">Cancelar Locação</a></h2>
		</div>
	</div>

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
