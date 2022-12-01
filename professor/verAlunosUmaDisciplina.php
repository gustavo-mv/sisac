<?php
include('conexao.php');
?>
<?php
$result = $mysqli->query("SELECT alunos.nome as alunos FROM `alunos` INNER JOIN presencas on presencas.alunos_idalunos = alunos.idalunos where presencas.materia_idmateria = colocarVariavelAqui");
while ($aux_query = $result->fetch_assoc()) 
{
    echo '<tr>';
    echo '  <td>'.$aux_query["alunos"].'</td>';
    echo '</tr>';
}
?>