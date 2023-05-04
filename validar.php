<?php

$guardarNome = $_POST["campoNome"];
$guardarSenha = $_POST["campoSenha"];

if($guardarNome == "Fatec" && $guardarSenha == "123"){
    session_start();
    $_SESSION["fatec"]=1;
    $_SESSION["professor"]="Maria";
    header("location:restrito.php");
}
else {
    echo "Erro";
}
?>