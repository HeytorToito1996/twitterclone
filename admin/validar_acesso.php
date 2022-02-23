<?php require_once ('conexao.php'); ?>

<?php 
session_start();

$usuario = $_POST["usuario"];
$senha = sha1($_POST["senha"]);

$objDB = new db();//Objeto de Conexão com o Banco de Dados
$link = $objDB->conectaMySQL();//Invoca o Método que realiza a conexão com o DB

$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' OR email = '$usuario' AND senha = '$senha'";

$consulta = mysqli_query($link,$query);

if ($consulta){ //Usuário Existe ?
    $dadosUsuario = mysqli_fetch_array($consulta);//Salva os Dados do Usuário em um array
    if (isset($dadosUsuario['usuario']) && isset($dadosUsuario['senha'])){
        
        $_SESSION['usuario'] = $dadosUsuario['usuario'];
        $_SESSION['email'] = $dadosUsuario['email']; //Salva a Informação do Usuário em uma sessão
        echo '<script>alert("Login Bem-Sucedido , Redirecionando");</script>';
        echo "<meta http-equiv='refresh' content='0;url=../home.php'>";
    }

    else {
       echo '<script>alert("Usuário ou Senha Inválidos");</script>';
       echo "<meta http-equiv='refresh' content='0;url=../index.php?erro=1'>";
    }
}

else {
    echo '<script>alert("Erro Ao Realizar a consulta , Entre em contato com o ADM do Site.");</script>'; 
    echo "<meta http-equiv='refresh' content='0;url=../index.php?erro=2'>";
}
?>