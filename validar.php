<?php

// Conecta com o banco de dados
$conn = mysqli_connect('localhost', 'root', '', 'usuario');

// Verifica se houve algum erro na conexão
if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}

$user = $_POST["usuario"];
$password = $_POST["senha"];

mysqli_query($conn, "INSERT INTO users (usuario, senha) 
VALUES ('". $_POST["usuario"]."', '".$_POST["senha"]."')");


if($user == $_POST["usuario"] && $password == $_POST['senha']){
/*     session_start();
    $_SESSION["fatec"]=1;
    $_SESSION["professor"]="Maria";
    header("location:restrito.php");
}
else {
    echo "Erro";
} */

session_start();
/* if ($_SESSION["fatec"]==1){

    echo "Bem-vindo, ".$_SESSION["professor"]."!<hr><a href='logoff.php'>Sair</a>";
} else{
    echo "Você não tem permissão para acessar esta página!<hr><a href='index.php'>Voltar</a>";
} */


// Query para selecionar o usuário com o nome de usuário especificado
$query = "SELECT usuario, senha FROM users WHERE usuario = '$user'";

// Executa a consulta SQL
$resultado = mysqli_query($conn, $query);

// Define uma senha hasheada padrão
$senha_hasheada = '';

// Verifica se a consulta retornou algum resultado
if (mysqli_num_rows($resultado) > 0) {
    // Armazena os dados do usuário em um array
    $dados_usuario = mysqli_fetch_assoc($resultado);

    // Define a senha hasheada
    $senha_hasheada = $dados_usuario['senha'];

    // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
    if (md5($password) == $senha_hasheada) {
        // Cria uma variável de sessão para armazenar o nome de usuário do usuário
        $_SESSION['usuario'] = $usuario;

        // Redireciona para a página de perfil do usuário
        header('Location: perfil.php');
    } else {
        // A senha fornecida não corresponde à senha armazenada no banco de dados
        echo "A senha digitada está incorreta";
    }
}


// Fecha a conexão com o banco de dados
mysqli_close($conn);

}
?>