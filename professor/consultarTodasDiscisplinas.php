<?php
include('conexao.php');
$idProf = $_POST['idProfessor'];

if ($idProf != null){
    $result = $mysqli->query("SELECT materia.idmateria, materia.nome as Disciplina, materia.periodo, professores.nome as professores FROM materia INNER JOIN professores ON professores_idprofessor = professores.idprofessor WHERE $idProf = professores_idprofessor");
    $lista[0] = 'sem resultados';
    for ($i=0; $aux_query = $result->fetch_assoc(); $i++) { 
        $lista[$i] = $aux_query;
    }
    echo json_encode($lista);
}else{
    echo 'erro de nulo';
}
?>