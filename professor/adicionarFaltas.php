<?php
	include('conexao.php');
		$id   = $_POST["id"];
		$materia  = $_POST["materia"];
        $carga = $_POST["carga"];
		$stmt = $mysqli->prepare("UPDATE `presencas` 
        SET `faltas`= faltas + ?
        WHERE presencas.alunos_idalunos = ? AND presencas.materia_idmateria = ?
        ");
		$stmt->bind_param('sss', $carga, $id, $materia);
		
if(!$stmt->execute())
		{
			$erro = $stmt->error;
		}
		else
		{
      echo "ok";
	}
?>