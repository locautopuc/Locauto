<?php
//session_start();

// se não houver sessão volta para a página de login
if(!$_SESSION['cpf_cnpj'])  {

	header('Location: index.php');
	exit();
}