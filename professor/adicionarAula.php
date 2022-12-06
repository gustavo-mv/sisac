<?php
	include('conexao.php');
		$data   = $_POST["data"];
		$materia  = $_POST["materia"];
		$carga = $_POST["carga"];

		$stmt = $mysqli->prepare("INSERT INTO `aulas`( `data`, `carga`, `materia_idmateria`) 
		VALUES (?,?,?)");
		$stmt->bind_param('sss', $data, $carga, $materia);
		
if(!$stmt->execute())
		{
			$erro = $stmt->error;
		}
		else
		{
      echo "ok";
	}
?>