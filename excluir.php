<?php
include 'conexao.php'; // conexão

if(isset($_GET['id'])){ // verifica se um parâmetro ID está presente na URL (GET)
    $id = $_GET['id']; // se sim, o valor da ID é atribuído a variavel $id

    
    $sql = "DELETE FROM users WHERE id = $id"; // apaga da tabela users o usuário que pertence ao ID fornecido

    if ($conn->query($sql) === true) { // se a conexão foi bem sucedida e houve a exclusão...
        
        header('Location: index.php'); // o usuário é levado de volta para index.php
        exit();
    } else {
        echo "Erro ao excluir o usuário: " . $conn->error; // se não, um erro é exibido
    }
}

$conn->close(); // fechamento da conexão
?>