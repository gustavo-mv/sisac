<?php
	include('conexao.php');
	if(isset($_POST["id"]) && isset($_POST["materia"]))
	if(empty($_POST["id"])){
		$erro = "Campo id obrigatório";
	}	else
	if(empty($_POST["materia"])){
	$erro = "Matéria obrigatória!";
	}else
		$id   = $_POST["id"];
		$materia  = $_POST["materia"];
		$stmt = $mysqli->prepare("INSERT INTO `presencas` (`alunos_idalunos`,`materia_idmateria`) VALUES (?,?)");
		$stmt->bind_param('ss', $id, $materia);
		
if(!$stmt->execute())
		{
			$erro = $stmt->error;
		}
		else
		{
      header("Location: adicionarNaMateria1.php");
      echo "<script>alert('Usuário cadastrado com sucesso!'); </script>";
	}
?>