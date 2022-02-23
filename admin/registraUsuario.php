<?php require_once ('conexao.php'); ?>

<?php 
$usuario = $_POST["usuario"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$objDB = new db();
$link = $objDB->conectaMySQL();


//verificar tamanho da senha
if (strlen($senha) < 10){
    echo '<script>alert("Sua Senha Deve Ter Mais de 10 Caracteres");</script>'; 
    echo "<meta http-equiv='refresh' content='0;url=../inscrevase.php'>";
    return false;
} 
//criptografar e prosseguir com a consulta
else{
$senha = sha1($senha);
}
//verificar se já existe usuário cadastrado com o mesmo nome
$selecao = "SELECT * FROM usuarios WHERE email = '$email' OR usuario = '$usuario' ";

$consulta = mysqli_query($link,$selecao);
if (mysqli_num_rows($consulta) > 0){
    echo '<script>alert("Usuário ou e-Mail Já Cadastrado");</script>'; 
    echo "<meta http-equiv='refresh' content='0;url=../inscrevase.php'>";
    return false;
}
//Caso Não Haja , Realizar Cadastro
else {
    $query = "INSERT INTO usuarios (usuario,email,senha) VALUES ('$usuario','$email','$senha')";
    $cadastro = mysqli_query($link,$query);

    if($cadastro){
        echo '<script>alert("Usuário Cadastrado com Sucesso");</script>'; 
        echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
    }

    else {
        echo '<script>alert("Ocorreu um Problema , Tente Novamente Mais Tarde");</script>'; 
        echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
    }
}

?>