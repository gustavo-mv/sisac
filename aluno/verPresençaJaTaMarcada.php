<?php
include('conexao.php');
$idAluno = $_POST['idAluno'];
$idAula = $_POST['idAula'];

if ($idAluno != null){
    $result = $mysqli->query("SELECT alunospresentes.idalunos
    FROM aulas 
    INNER JOIN alunospresentes
    ON aulas.idAulas = alunospresentes.aulas_idAulas
    WHERE aulas.idAulas = $idAula AND alunospresentes.idalunos = $idAluno");
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