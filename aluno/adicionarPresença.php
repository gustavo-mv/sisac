<?php
	include('conexao.php');
		$idaula   = $_POST["idAula"];
		$idaluno  = $_POST["idAluno"];

		$stmt = $mysqli->prepare("INSERT INTO `alunospresentes`
        (`aulas_idAulas`, `idalunos`) 
        VALUES (?,?)");
		$stmt->bind_param('ss', $idaula, $idaluno);
		
if(!$stmt->execute())
		{
			$erro = $stmt->error;
		}
		else
		{
      echo "ok";
	}
?>