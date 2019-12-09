<?php

// configuração de conexão com o banco de dados

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'locauto');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');


