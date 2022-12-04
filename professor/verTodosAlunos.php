<?php
include('conexao.php');

    $result = $mysqli->query("SELECT * FROM `alunos` ORDER BY `nome`" );
    $lista[0] = 'invalido';
    for ($i=0; $aux_query = $result->fetch_assoc(); $i++) { 
        $lista[$i] = $aux_query;
     
    }
    echo json_encode($lista);


?>
