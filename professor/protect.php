<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['idprofessor'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"indexProfessor.php\">Entrar</a></p>");
}


?>