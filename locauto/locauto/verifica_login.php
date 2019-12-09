<?php
//session_start();

// se não houver sessão / o login não será aceito e volta para a página de login
if(!$_SESSION['cpf_cnpj'])  {

	header('Location: index.php');
	exit();
}