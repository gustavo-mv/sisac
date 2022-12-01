<?php
include('conexao.php');

if(isset($_POST['gra'])) {

        $gra = $mysqli->real_escape_string($_POST['gra']);
        $sql_code = "SELECT * FROM alunos WHERE gra = '$gra' ";
        $sql_query = $mysqli->query($sql_code) or die("erroSQL: " . $mysqli->error);
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $gra = $sql_query->fetch_assoc();
		echo json_encode($gra);

        } else {
            echo "errologin";
        }
}
