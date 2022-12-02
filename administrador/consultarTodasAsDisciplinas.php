<?php
include('conexao.php');
$result = $mysqli->query("SELECT materia.idmateria, materia.nome as Disciplina, materia.periodo, professores.nome as professores FROM materia INNER JOIN professores ON professores_idprofessor = professores.idprofessor;");
while ($aux_query = $result->fetch_assoc()) 
{
    echo json_encode($aux_query);
}
?>

