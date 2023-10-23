<?php 
$servername = "localhost"; // localhost
$username = "root"; // root
$password = "1234"; // VAZIO
$dbname = "banco"; // NOME DO BANCO

$conn = new mysqli($servername, $username, $password, $dbname); // conexão com o MySQL

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error); // caso a conexão falhe
}


        /* 

        CREATE DATABASE banco;

        use banco;

        CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        telefone VARCHAR(20),
        sexo VARCHAR(10) NOT NULL
        ); 

        */

?>
conexao