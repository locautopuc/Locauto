
<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de segurança
// neste caso é o cadastrar.php
require 'conexao.php';
session_start();
include('admin_verifica_login.php');
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
		require 'cabecalho_admin_logado.php'; 
		?>



	<section class="hero is-success is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<h3 class="title has-text-grey">Master Admin</h3>


	<!-- Interface -->
	<div class="box">
		<!-- Esta interface terá comunicação com o arquivo cadastrar.php -->
		<form action="admin_perfil.php" method="POST" autocomplete="off">

			<div class="field">
			  <h1><strong>Lista de Funcionários</strong></h1>
			  <p><br>

				<h3>Olá, <strong></h3>
				<?php echo $_SESSION['admin']; ?> <br> 
				<!-- </strong><br>Seja bem vindo ao seu perfil.</h3> -->

			</div>
				
				
				


	<div class="field">
		<div class="control"><br><br>
			<?php 
			$tabela_cadastro_funcionario = "SELECT * FROM tabela_cadastro_funcionario ORDER BY nome ASC";
			$resultado_funcionario = mysqli_query($conexao, $tabela_cadastro_funcionario);
			while($row_resultado = mysqli_fetch_assoc($resultado_funcionario))
			{ 
			?>
			 
	
			
			

<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" bgcolor="#9FD3FF"><tbody><tr  class="is-selected"><td>Dados do funcionário: <option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['nome'];?></option>&nbsp;</td></tr></tbody></table>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" border="1">
	
  <tbody>
    <tr>
      <td>Matricula: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['matricula'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Nome: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['nome'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Identidade: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['identidade'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Telefone: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['telefone'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>E-mail: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['email'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Logradouro: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['logradouro'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Número: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['numero'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Complemento: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['complemento'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Bairro: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['bairro'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Cidade: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['cidade'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Estado: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['estado'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Cep: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['cep'];?></option>&nbsp;</td>
    </tr>
    <tr>
      <td>Data de Cadastro: &nbsp;</td>
      <td><option value="<?php echo $row_resultado['ID_funcionario']; ?>"><?php echo $row_resultado['data_cadastro'];?></option>&nbsp;</td>
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
			<h2><a class="button is-block is-dark is-large is-fullwidth " href="admin_perfil.php">Voltar</a></h2>
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
