<?php
//session_start();

// se não houver sessão volta para a página de login
if(!$_SESSION['admin'])  {

	header('Location: admin.php');
	exit();
}