<?php
include('conexao.php');

if(isset($_POST['gra'])) {

    if(strlen($_POST['gra']) == 0) {
        echo "Preencha seu nome de gra";
    } else {

        $gra = $mysqli->real_escape_string($_POST['gra']);
        $sql_code = "SELECT * FROM alunos WHERE gra = '$gra' ";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $gra = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['idalunos'] = $gra['idalunos'];
            $_SESSION['nome'] = $gra['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aluno</title>
</head>
<body>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label>Insira o GRA:</label>
            <input type="text" name="gra">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>