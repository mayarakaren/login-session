<?php
session_start();
/* if ($_SESSION["fatec"]==1){

    echo "Bem-vindo, ".$_SESSION["professor"]."!<hr><a href='logoff.php'>Sair</a>";
} else{
    echo "Você não tem permissão para acessar esta página!<hr><a href='index.php'>Voltar</a>";
} */
// Conecta com o banco de dados
$conn = mysqli_connect('localhost', 'usuario', 'senha', 'usuario');

// Verifica se houve algum erro na conexão
if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}

// Query para buscar o usuário e a senha
$query = "SELECT usuario, senha FROM users WHERE usuario" = $_POST['usuario'];

// Executa a query e armazena o resultado em uma variável
$resultado = mysqli_query($conn, $query);

// Verifica se a query retornou algum resultado
if (mysqli_num_rows($resultado) > 0) {
    // Armazena as informações do usuário na sessão
    $usuario = mysqli_fetch_assoc($resultado);
    $_SESSION['usuario'] = $usuario['usuario'];
    // Armazena a senha hasheada em uma variável
    $senha_hasheada = mysqli_fetch_assoc($resultado)['senha'];
  }

// Fecha a conexão com o banco de dados
mysqli_close($conn);

// Hashea a senha inserida pelo usuário usando MD5
$senha_inserida_hasheada = md5($_POST['senha']);

// Verifica se as senhas coincidem
if ($senha_hasheada == $senha_inserida_hasheada) {
  // As senhas coincidem, loga o usuário
} else {
  // As senhas não coincidem, exibe uma mensagem de erro
  echo "A senha digitada está incorreta"
}




?>