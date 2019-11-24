
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
	
	
	<?php session_start();
	// so o usuário não estiver logado - NAO APARECE O PERFIL
	if(!$_SESSION['matricula'])  
	{																			
		// chamando o arquivo cabeçalho
		require 'cabecalho.php';
	}
	// so o usuário não estiver logado - NAO APARECE O PERFIL
	else if($_SESSION['matricula']) 
	{
		// chamando o arquivo cabeçalho logado
		require 'cabecalho_funcionario_logado.php';
	}
	?>

	<section class="hero is-success is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="column is-4 is-offset-4">
					<!--<h3 class="title has-text-grey">Locauto<strong>®</strong></h3>-->
					<img src="imagem/logo-locautoR-transp.png"width="50%" height="50%">
					<h3 class="title has-text-grey"><a href="" target="_blank"> </a></h3>


	<!-- Interface -->
		<div class="box"><strong>Sobre nós</strong><br><br>
			A Locauto foi fundada em 2019 em GO pelos senhores Giulianno, Romario, Vinicius e Guilherme e a sua principal missão é facilitar o uso de automóveis para as pessoas que desejam alugar, em vez de comprar um veículo. Atualmente contamos com XX funcionários e os nossos principais clientes são XX. Esperamos que você se sinta confortável aqui.<br><br>
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
