<?php
	include('conexao.php');
	if(isset($_POST["nome"]) && isset($_POST["gra"]))
	if(empty($_POST["nome"])){
		$erro = "Campo nome obrigatório";
	}	else
	if(empty($_POST["gra"])){
	$erro = "GRA obrigatório!";
	}else
		$nome   = $_POST["nome"];
		$gra  = $_POST["gra"];
		$stmt = $mysqli->prepare("INSERT INTO `alunos` (`nome`,`gra`) VALUES (?,?)");
		$stmt->bind_param('ss', $nome, $gra);
		
if(!$stmt->execute())
		{
			$erro = $stmt->error;
		}
		else
		{
      header("Location: inserirAluno.php");
      echo "<script>alert('Usuário cadastrado com sucesso!'); </script>";
	}
?>