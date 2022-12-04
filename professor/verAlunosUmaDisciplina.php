<?php
include('conexao.php');
$idMateria = $_POST['idMateria'];

if ($idMateria != null){
    $result = $mysqli->query("SELECT alunos.nome as Aluno, presencas.faltas as Faltas, alunos.idalunos FROM `alunos` INNER JOIN presencas on presencas.alunos_idalunos = alunos.idalunos where presencas.materia_idmateria = $idMateria");
    $lista[0] = 'invalido';
    for ($i=0; $aux_query = $result->fetch_assoc(); $i++) { 
        $lista[$i] = $aux_query;
     
    }
    echo json_encode($lista);
}else{
    echo 'erro de nulo';
}
?>
