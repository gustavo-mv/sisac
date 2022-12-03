<?php
include('conexao.php');
$result = $mysqli->query("SELECT aulas.idAulas, aulas.materia_idmateria, aulas.carga, aulas.data, materia.nome as Disciplina, Aulas.alunosFaltantes
FROM Aulas
INNER JOIN Materia
ON Materia.idMateria = 1");
while ($aux_query = $result->fetch_assoc()) 
{
    echo json_encode($aux_query);
}
?>
