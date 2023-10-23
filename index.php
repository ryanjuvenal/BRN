<?php

    echo '<div class="fundoPretoTransparente"> </div>';
    echo '<div class="rodapé">'; 
    echo '<img id="nomeLogo" src="logo.png">';
    echo '<button class="botão" onclick="window.location.href = \'index.html\';">Criar novo formulário</button>';  // botão para voltar para index.html
    echo '</div>';
    echo '<div id="SUMALUCIFER">';
   include 'conexao.php'; // para a conexão
   echo '</div>';
   
if ($_SERVER["REQUEST_METHOD"] == "POST") { // verifica se o método usado é o POST
    $nome = $_POST["nome"];   // valores inseridos no formulário HTML sendo atribuído para variáveis
    $email = $_POST["email"];   // valores inseridos no formulário HTML sendo atribuído para variáveis
    $numero = $_POST["telefone"];   // valores inseridos no formulário HTML sendo atribuído para variáveis
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';    // valores inseridos no formulário HTML sendo atribuído para variáveis

  
    $sql = "INSERT INTO users (nome, email, telefone, sexo) VALUES ('$nome', '$email', '$numero', '$sexo')"; // dados sendo inseridos no banco de dados
    if ($conn->query($sql) === false) { // query: executa uma consulta SQL
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}


$sql = "SELECT id, nome, email, telefone, sexo FROM users"; // seleciona os elementos ID/NOME/EMAIL/TELEFONE/SEXO da tabela USERS presente no MySQL
$result = $conn->query($sql); // consulta SQL executada para recuperar dados da tabela "user" no SQL

if ($result->num_rows > 0) { // se houveram mais de 0 linhas, será exibido o seguinte formato:
  
    echo '<div class="cabeçario">';
    echo '<div id="cabeçarioEscrita"> Formulário </div> ';

    // EXIBINDO CADA LINHA DA TABELA
    while ($row = $result->fetch_assoc()) { // armazena cada coluna da linha da tabela escolhida
        echo '<div class="corpo">';

        
        //echo "Nome: " . $row["nome"] . " || Email: " . $row["email"] . " || Telefone: " . $row["telefone"] . " || Sexo: " . $row["sexo"];
        echo '<div class="promptsDescrição"> Nome </div> <div class="prompts">' . $row["nome"] . '</div> <br>';
        echo '<div class="promptsDescrição"> E-mail </div> <div class="prompts">' . $row["email"] . '</div> <br>';
        echo '<div class="promptsDescrição"> Telefone </div> <div class="prompts">' . $row["telefone"] . '</div> <br>';
        echo '<div class="promptsDescrição"> Sexo </div> <div class="prompts">' . $row["sexo"] . '</div> <br>';
   
        echo '<a href="excluir.php?id='.$row["id"].'"><img id="deletar" src="deletar.png"></a>'; // botão de excluir
       
        echo '<a href="alterar.php?id='.$row["id"].'"><img id="editar" src="editar.png"></a>'; // botão para alterar

        echo '</div>';
    }

    echo '<div class="div2">';                                                                         

    echo '</div>'; 

    echo '</div> <br>';
} else {
    echo "0 resultados"; // se não houverem mais de 0 linhas (ou seja, se não houverem linhas), será exibido "0 resultados"
}

$conn->close(); // fechamento da conexão
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRN Usuários</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="iconi.jpg" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body{
            color: red;
            margin 0;
            padding 0;
            position flex;
            overflow-y: auto;
        }
        .cabeçario{
            top: 10vh;
            left: 7vh;
            width: 40%;
            height: 10vh;
            position: relative;
        }
        #cabeçarioEscrita{
            position: flex;
            z-index: 10;
        }
        .corpo{
            top: 2vh;
            margin-top: 0vh;
            width: 100%;
            height: 20vh;
            border-radius: 0;
            border-bottom: 0.4vh solid #525050f8;
            position: flex;
        }
        .promptsDescrição{
            width: 11%;
            height: 3.5vh;
            margin-top: 0.5vh;
            text-align: center;
        }
        .prompts{
            width: 83.4%;
            height: 3.5vh;
            margin-left: 12.5vh;
            margin-top: 0.5vh;
        }
        #cabeçarioEscrita{
            position: relative;
        }
        #editar{
            top: 0.8vh;
            z-index: 4;
            width: 3.5%;
            height: auto;
            position: relative;
            left: 90%;
            cursor: pointer;
            transition: filter 0.3s ease, transform 0.3s ease;
        }
        #deletar{
            top: 0.6vh;
            z-index: 4;
            width: 3%;
            height: auto;
            position: relative;
            left: 82%;
            cursor: pointer;
            transition: filter 0.3s ease, transform 0.3s ease;
        }
        .botão{
            width: 50%;
            height: 5vh;
            left: 20%;
            top: 1.1vh;
            position: relative;
            cursor: pointer;
            background-color: rgb(170, 169, 169);
            border-radius: 1vh;
            border: none;
            color: #161616;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
    #editar:hover{
    transform: scale(1.1);
    }
    #deletar:hover{
    transform: scale(1.1);
    }
    .botão:hover{
    background-color: rgb(216, 216, 216);
    transform: scale(1.1);
    }
    @media only screen and (max-width: 1200px) {
    /* Estilos para dispositivos com largura máxima de 768px */
    body{
        max-width:100%;
    }
    .rodapé{
        background-color: rgba(82, 80, 80, 0.98);
    }
    #nomeLogo{
        margin-top: 0vh;
        width: 5%;
        height: auto;
    }
    .cabeçario{
        left: 67vh;
        width: 34%;
        position: relative;
        top: 15vh;
    }
    #submit{
        margin-top: 9vh;
        margin-left:81%;
        width: 10vh;
        height: 4vh;
        font-size: small;

    }
    .sexualidade{
        margin-top: 10vh;
        width: 2vh;
        height: 2vh;
    }
    .sexualidade2{
        margin-top: 10vh;
        width: 2vh;
        height: 2vh;
    }
}

@media only screen and (max-width: 974px) {
    /* Estilos para dispositivos com largura máxima de 768px */
    body{
        max-width:100%;
    }
    .rodapé{
        background-color: rgba(82, 80, 80, 0.98);
    }
    #nomeLogo{
        width: 7%;
        height: auto;
        position: absolute;
    }
    .cabeçario{
        left: 55vh;
        width: 40%;
        position: relative;
        top: 15vh;
    }
    #submit{
        margin-top: 9vh;
        margin-left:82%;
        width: 10vh;
        height: 4vh;
        font-size: small;

    }
    .sexualidade{
        margin-top: 10vh;
        width: 2vh;
        height: 2vh;
        margin-left: 1vh;
    }
}

@media only screen and (max-width: 760px) {
    /* Estilos para dispositivos com largura máxima de 768px */
    body{
        max-width:100%;
    }
    .rodapé{
        background-color: rgba(82, 80, 80, 0.98);
    }
    #nomeLogo{
        width: 9%;
        height: auto;
    }
    .cabeçario{
        left: 34vh;
        width: 50%;
        position: relative;
        top: 15vh;
    }
    #submit{
        margin-top: 9.5vh;
        margin-left:84%;
        width: 10vh;
        height: 4vh;
        font-size: small;

    }
    .sexualidade{
        margin-top: 10vh;
        width: 2.5vh;
        height: 2.5vh;
    }
}

@media only screen and (max-width: 650px) {
    /* Estilos para dispositivos com largura máxima de 768px */
    body{
        max-width: 100%;
    }
    .rodapé{
        height: 10vh;
    }
    #nomeLogo{
        width: 14%;
        height: auto;
    }
    .cabeçario{
        left: 1.1vh;
        width: 96%;
        height: 10%;
        position: relative;
        top: 5vh;
    }
    .corpo{
        width: 100%;
        height: 17vh;
    }
    #usuario{
        width: 90%;
    }
    #email{
        width: 90%;
    }
    #telefone{
        width: 90%;
    }
    .prompts{
            width: 83.4%;
            height: 3.5vh;
            margin-left: 12.5vh;
        }
}

    </style>

</head>
<body>

<video autoplay muted loop>
            <source src="fundo.mp4" type="video/mp4">
            Seu navegador não suporta o elemento de vídeo.
        </video>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>