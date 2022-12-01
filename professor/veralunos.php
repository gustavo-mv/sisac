<?php
include('conexao.php');
?>

<table width="400px" border="0" cellspacing="0">
    <tr>
    <td><strong>#</strong></td>
    <td><strong>Nome</strong></td>
    <td><strong>GRA</strong></td>
    </tr>
<?php
$result = $mysqli->query("SELECT * FROM `alunos` ORDER BY `nome` ");
while ($aux_query = $result->fetch_assoc()) 
{
    echo '<tr>';
    echo '  <td>'.$aux_query["idalunos"].'</td>';
    echo '  <td>'.$aux_query["nome"].'</td>';
    echo '  <td>'.$aux_query["gra"].'</td>';
    echo '</tr>';
}
?>
</table>