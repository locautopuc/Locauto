<?php
// quando o usuario deslogar a sessão será destruida
session_start();
session_destroy();
header('Location: index.php');
exit();