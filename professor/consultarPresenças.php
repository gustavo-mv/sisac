<?php
include('conexao.php');
$idProfessor = $_POST['idProfessor'];

if ($idProfessor != null){
    $result = $mysqli->query("SELECT materia.nome as Disciplina, aulas.data as Dia, IF(aulas.finalizada, \"Finalizada\", \"Aberta\") AS Status\n"

    . "FROM aulas\n"

    . "INNER JOIN materia\n"

    . "ON aulas.materia_idmateria = materia.idmateria\n"

    . "WHERE materia.professores_idprofessor = $idProfessor");
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