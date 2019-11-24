
<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de segurança
// neste caso é o cadastrar.php
require 'conexao.php';
session_start();
include('funcionario_verifica_login.php');
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
		// chamando o arquivo cabeçalho logado
		require 'cabecalho_funcionario_logado.php'; 
		?>



	<section class="hero is-success is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<h3 class="title has-text-grey">Funcionário</h3>


	<!-- Interface -->
	<div class="box">
		<!-- Esta interface terá comunicação com o arquivo cadastrar.php -->
		<form action="funcionario_perfil.php" method="POST" autocomplete="off">

			<div class="field">
			  <h1><strong>Lista de Clientes</strong></h1>
			  <p><br>

				<h3>Olá, <strong></h3>
				<?php echo $_SESSION['matricula']; ?> <br> 
				<!-- </strong><br>Seja bem vindo ao seu perfil.</h3> -->

			</div>
				
				
				


	<div class="field">
		<div class="control"><br><br>
			<?php 
			$tabela_cadastro_usuario = "SELECT * FROM tabela_cadastro_usuario ORDER BY nome ASC";
			$resultado_usuario = mysqli_query($conexao, $tabela_cadastro_usuario);
			while($row_resultado = mysqli_fetch_assoc($resultado_usuario))
			{ 
			?>
			 
	
			
			

<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" bgcolor="#9FD3FF"><tbody><tr  class="is-selected"><td>Dados do Cliente: <option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['nome'];?></option>&nbsp;</td></tr></tbody></table>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" border="1">
	
  <tbody>
    <tr>
      <td>Tipo: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['escolher'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>CPF / CNPJ: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['cpf_cnpj'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Nome: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['nome'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Razão Social: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['razao_social'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Identidade: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['identidade'];?></option>&nbsp;</td>
    </tr>
	<tr>
      <td>Telefone: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['telefone'];?></option>&nbsp;</td>
    </tr>
	<tr>
      <td>Email: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['email'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Logradouro: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['logradouro'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Número: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['numero'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Complemento: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['complemento'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Bairro: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['bairro'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Cidade: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['cidade'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Estado: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['estado'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Cep: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_usuario']; ?>"><?php echo $row_resultado['cep'];?></option>&nbsp;</td>
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
			<h2><a class="button is-block is-dark is-large is-fullwidth " href="funcionario_perfil.php">Voltar</a></h2>
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
