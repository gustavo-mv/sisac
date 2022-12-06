<?php
include('conexao.php');
$idAluno = $_POST['idAluno'];

if ($idAluno != null){
    $result = $mysqli->query("SELECT materia.nome as Disciplina, aulas.data AS Dia, aulas.idaulas, alunos.idalunos
    FROM aulas
    INNER JOIN materia
    ON aulas.materia_idmateria = materia.idmateria
    INNER JOIN presencas
    ON presencas.materia_idmateria = materia.idmateria
    INNER JOIN alunos
    ON presencas.alunos_idalunos = alunos.idalunos
    WHERE NOT aulas.finalizada AND alunos.idalunos = $idAluno ");
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