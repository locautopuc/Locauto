<?php
//session_start();
if(!$_SESSION['cpf_cnpj'])  {
	header('Location: index.php');
	exit();
}