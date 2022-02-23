<?php
    class db{
        //host
        private $host = "localhost";
        //usuario
        private $usuario = "root";
        //senha
        private $senha = "";
        //banco de dados
        private $database = "twitterClone";

        public function conectaMySQL(){
            //estabelecer conexão
            $conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database) or die("Não foi Possível Estabelecer a Conexão com o Banco de Dados".mysqli_connect_error());
            //definir conjunto de caracteres do DB
            mysqli_set_charset($conexao,'UTF8');

            return $conexao;    
        }
    }
?>