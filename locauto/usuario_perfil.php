
<?php
include("conexao.php");
session_start();
include('verifica_login.php');
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
		require 'cabecalho_logado.php'; 
		?>
			
		
		
		
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->	
	<!-- **************************************************** -->
	<section class="hero is-success is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<h3 class="title has-text-grey">Perfil do Cliente</h3>


	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- **************************************************** -->
	<!-- Interface -->
	<div class="box">
		<!-- Esta interface terá comunicação com o arquivo usuario_cadastrar.inc.php -->
		<form action="usuario_cadastrar.inc.php" method="POST" autocomplete="off">
			<!-- **************************************************** -->
			<!-- Cliente -->
			<div class="field"><h1><strong>Cliente</strong></h1><p><br>
				<!-- **************************************************** -->
				<!-- Pega os dados do usuário Logado no momento e informa cada dado na tela da interface -->
				<!-- Nome do usuário / O tipo CPF ou CNPJ / O número do CPF ou CNPJ -->
				<h3>Olá, <strong>
				<?php echo $_SESSION['nome']; ?> <br> <?php echo $_SESSION['escolher']; ?> : <?php echo $_SESSION['cpf_cnpj']; ?>
				<!-- </strong><br>Seja bem vindo ao seu perfil.</h3> -->
			</div>

	<!-- **************************************************** -->
	<!-- Botão -->
	<div class="field">
		<div class="control"><br><br>
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="#">Situação do Cliente</a></h2>
		</div>
	</div>
					
	<!-- **************************************************** -->
	<!-- Botão -->
	<div class="field">
		<div class="control"><br><?php
			 
			$tabela_cadastro_usuario = "SELECT * FROM tabela_cadastro_motorista ORDER BY nome ASC";
			//$tabela_cadastro_usuario = "SELECT * FROM tabela_cadastro_motorista WHERE id = $id ORDER BY nome ASC";
			$resultado_usuario = mysqli_query($conexao, $tabela_cadastro_usuario);
			if($row_resultado = mysqli_fetch_assoc($resultado_usuario)){
			 if ($row_resultado['cpf'] > 0) {
			
			?>
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="usuario_ver_motorista.php">Dados do Motorista</a></h2>
			<?php }} ?>
		</div>
	</div>

	<!-- **************************************************** -->
	<!-- Botão -->
	<div class="field">
		<div class="control"><br>
			<h2><a class="button is-rounded is-block is-dark is-large is-fullwidth " href="locacao_lista_veiculo.php">Fazer uma Locação</a></h2>
		</div>
	</div>

	<!-- **************************************************** -->
	<!-- Botão Sair -->
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
