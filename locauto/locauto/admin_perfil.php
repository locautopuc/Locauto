
<?php
// ao iniciar uma sessão daremos inicio a comunicação com as SESSIONS feitas no arquivo no arquivo de segurança
// neste caso é o cadastrar.php
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

			<div class="field"><h1><strong>Master Admin</strong></h1><p><br>

				<h3>Olá, <strong>
				<?php echo $_SESSION['admin']; ?> <br> 
				<!-- </strong><br>Seja bem vindo ao seu perfil.</h3> -->

			</div>


	<div class="field">
		<div class="control"><br>
			<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" bgcolor="#9FD3FF"><tbody ><tr class="is-selected"><td >Funcionários</td></tr></tbody></table>
			
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="funcionario_cadastro.php">Cadastro de Funcionários</a></h2>
		</div>
	</div>
					
	
		<div class="field">
		<div class="control"><br>
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="admin_verifica_funcionario.php">Lista de Funcionários</a></h2>
		</div>
	</div>
	<br>
	<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" bgcolor="#9FD3FF"><tbody ><tr class="is-selected"><td >Clientes</td></tr></tbody></table>
	<div class="field">
		<div class="control">
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="admin_verifica_usuario.php">Lista de Clientes</a></h2>
		</div>
	</div>
					
	<div class="field"><br>
		<div class="control">
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="#">Lista de Motoristas</a></h2>
		</div>
	</div>
					
	<div class="field">
		<div class="control"><br>
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="#">Pendência de Clientes</a></h2>
		</div>
	</div>
					
		<div class="field">
		<div class="control"><br>
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="#">Pendência de Motoristas</a></h2>
		</div>
	</div>
					
	
	<br>
	<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" bgcolor="#9FD3FF"><tbody ><tr class="is-selected"><td >Veículos</td></tr></tbody></table>
					
					
	<div class="field">
		<div class="control">
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="#">Cadastro de Veículos</a></h2>
		</div>
	</div><br>					
					
					
	<div class="field">
		<div class="control">
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="#">Lista de Veículos Disponíveis</a></h2>
		</div>
	</div>
					
	<div class="field"><br>
		<div class="control">
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="#">Lista de Veículos Locados</a></h2>
		</div>
	</div>
			
	<div class="field"><br>
		<div class="control">
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="#">Lista de Veículos Vendidos</a></h2>
		</div>
	</div>					
	


	<div class="field">
		<div class="control"><br><br><br><br>
			<h2><a class="button is-block is-danger is-large is-fullwidth is-outlined" href="logout.php">Sair</a></h2>
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
