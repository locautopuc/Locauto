<?php


   require('conexao.php');


   $sql = "SELECT * FROM tabela_cadastro_veiculo_modelo

         WHERE ID_marca LIKE '%".$_GET['ID_modelo']."%'"; 


   $result = $mysqli->query($sql);


   $json = [];

   while($row = $result->fetch_assoc()){

        $json[$row['ID_marca']] = $row['modelo'];

   }


   echo json_encode($json);

?>