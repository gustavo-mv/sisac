<?php
include('conexao.php');
$idAluno = $_POST['idAluno'];

if ($idAluno != null){
    $result = $mysqli->query("SELECT materia.nome as Disciplina, presencas.faltas as Faltas
    FROM `materia` 
    INNER JOIN presencas
    ON presencas.materia_idmateria = materia.idmateria
    WHERE presencas.alunos_idalunos = $idAluno");
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
