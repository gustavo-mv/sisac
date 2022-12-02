<?php
include('conexao.php');
    $result = $mysqli->query("SELECT aulas.idAulas, aulas.materia_idmateria, aulas.carga, aulas.data, materia.nome as Disciplina, Aulas.alunosFaltantes FROM aulas INNER JOIN materia ON materia.idMateria = 1");
    $lista[0] = 'sem resultados';
    for ($i=0; $aux_query = $result->fetch_assoc(); $i++) { 
        $lista[$i] = $aux_query;
    }
    echo json_encode($lista);
?>
