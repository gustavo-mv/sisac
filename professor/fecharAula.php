<?php
	include('conexao.php');
		$idAulas   = $_POST["idAulas"];
		$stmt = $mysqli->prepare("UPDATE `aulas` SET `finalizada` = 1 WHERE idAulas = ?");
		$stmt->bind_param('s', $idAulas);
		
if(!$stmt->execute())
		{
			$erro = $stmt->error;
		}
		else
		{
      echo "ok";
	}
?>