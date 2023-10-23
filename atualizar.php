<?php
include 'conexao.php'; // conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") { // verifica se o método usado é o POST
    $id = $_POST["id"]; // valores inseridos no formulário "alterar.php" sendo atribuído para variáveis
    $nome = $_POST["nome"];// valores inseridos no formulário "alterar.php" sendo atribuído para variáveis
    $email = $_POST["email"];// valores inseridos no formulário "alterar.php" sendo atribuído para variáveis
    $numero = $_POST["telefone"]; // valores inseridos no formulário "alterar.php" sendo atribuído para variáveis
    $sexo = $_POST["sexo"]; // valores inseridos no formulário "alterar.php" sendo atribuído para variáveis

 
    $sql = "UPDATE users SET nome='$nome', email='$email', telefone='$numero', sexo='$sexo' WHERE id=$id"; // consulta do tipo UPDATE - valores são atualizados

    if ($conn->query($sql) === true) { // se a conexão foi bem sucedida...
        
        header('Location: index.php'); // retorna o usuário para "index.php"
        exit();
    } else {
        echo "Erro ao atualizar o usuário: " . $conn->error; // se não, uma mensagem de erro será exibida
    }
}

$conn->close(); // fechamento da conexão
?>