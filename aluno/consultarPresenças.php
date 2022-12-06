<?php
include('conexao.php');
$idAluno = $_POST['idAluno'];

if ($idAluno != null){
    $result = $mysqli->query("SELECT materia.nome as Disciplina, aulas.data as Dia
    FROM aulas
    INNER JOIN materia
    ON aulas.materia_idmateria = materia.idmateria
    INNER JOIN alunospresentes
    ON alunospresentes.aulas_idAulas = aulas.idAulas
    WHERE alunospresentes.idalunos = $idAluno");
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