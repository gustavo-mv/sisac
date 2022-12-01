<?php
include('conexao.php');
$result = $mysqli->query("SELECT materia.idmateria, materia.nome as Disciplina, materia.periodo, professores.nome as professores FROM materia INNER JOIN professores ON professores_idprofessor = professores.idprofessor;");
while ($aux_query = $result->fetch_assoc()) 
{
    echo '<tr>';
    echo '  <td>'.$aux_query["idmateria"].'</td>';
    echo '  <td>'.$aux_query["Disciplina"].'</td>';
    echo '  <td>'.$aux_query["periodo"].'</td>';
    echo '  <td>'.$aux_query["professores"].'</td>';

    echo '</tr>';
}
?>
</table>
