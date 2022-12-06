<?php
include('conexao.php');
$idAula = $_POST['idAula'];

if ($idAula != null){
    $result = $mysqli->query("SELECT alunos.nome as Aluno, alunos.idalunos
    FROM alunospresentes
    INNER JOIN alunos
    ON alunospresentes.idalunos = alunos.idalunos
    WHERE alunospresentes.aulas_idAulas = $idAula");
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