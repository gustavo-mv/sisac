<?php
include('conexao.php');
$idMateria = $_POST['idMateria'];

if ($idMateria != null){
    $result = $mysqli->query("SELECT * 
    FROM `aulas` 
    WHERE materia_idmateria = $idMateria && !finalizada");
    $lista = [];
    for ($i=0; $aux_query = $result->fetch_assoc(); $i++) { 
        $lista[$i] = $aux_query;
    }
    if(!empty($lista)){
    echo json_encode($lista);
    }else{
        echo 'sem resultados';
    }
}else{
    echo 'erro de nulo';
}
?>