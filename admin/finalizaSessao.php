<?php
session_start();

unset($_SESSION['usuario']); //elimina as informações armazenadas na sessão
unset($_SESSION['email']);

session_destroy();
echo '<script>alert("Saindo...");</script>';
echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
?>