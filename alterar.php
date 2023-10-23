<?php

    echo '<div class="fundoPretoTransparente"> </div>';
    echo '<div class="rodapé">'; 
    echo '<img id="nomeLogo" src="logo.png">';
    echo '</div>';

    echo '<div id="SUMALUCIFER">';
include 'conexao.php'; // conexão
    echo '</div>';

if(isset($_GET['id'])){ // verifica se um parâmetro ID está presente na URL (GET)
    $id = $_GET['id']; // se sim, o valor da ID é atribuído a variavel $id

    // Recupera os dados do usuário com o ID fornecido
    $sql = "SELECT * FROM users WHERE id = $id"; // seleciona o ID
    $result = $conn->query($sql); // consulta SQL executada para recuperar dados da tabela "user" no SQL


    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc(); // armazena cada coluna da linha da tabela escolhida
       
        echo '<div class="cabeçario">';
        echo '<div id="cabeçarioEscrita"> Alterar Formulário';
        echo '</div>';

        echo '<div class="corpo">';
        echo '<form action="atualizar.php" method="post">';

        echo '<div id="acimaNome" class="promptsDescrição"> Nome </div>';
        echo '<div id="usuario">';
        echo '<input type="text" class="prompts" name="nome" placeholder="Alterar usuário" value="'.$row["nome"].'"><br>'; // formulário pre-preenchido com os valores inseridos anteriormente
        echo '</div>';

        
        echo '<div id="acimaEmail" class="promptsDescrição"> E-mail </div>';
        echo '<div id="email">';
        echo ' <input type="text"class="prompts" name="email" placeholder="Alterar E-mail" value="'.$row["email"].'"><br>'; // formulário pre-preenchido com os valores inseridos anteriormente
        echo '</div>';

        echo '<div id="acimaTelefone" class="promptsDescrição"> Telefone </div>';
        echo '<div id="telefone">';
        echo '<input type="text" class="prompts" name="telefone" placeholder="Alterar Telefone" value="'.$row["telefone"].'"><br>';  // formulário pre-preenchido com os valores inseridos anteriormente
        echo '</div>';
        
        echo '<div id="acimaSexo" class="promptsDescrição"> Sexo </div>';
        echo '<div id="sexo">';
        echo '<input type="text" class="prompts" name="sexo" placeholder="Alterar Sexualidade" value="'.$row["sexo"].'"><br>'; // formulário pre-preenchido com os valores inseridos anteriormente
        echo '</div>';

        echo '<input type="hidden" name="id" value="'.$id.'">';  // valor oculto para manter o mesmo ID do usuário
        echo '<input type="submit" id="submit" value="Atualizar">';
        echo '</form>';
        
    } else {
        echo "Usuário não encontrado."; // se não for achado o usuário
    }
    echo '</div>';  
    echo '</div>';
}

$conn->close(); // fechamento da conexão
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="iconi.jpg" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        #acimaNome{
            margin-top: 3.2vh;
            margin-left: 4.4vh;
            z-index: 2;
        }
        #acimaEmail{
            margin-top: 5.9vh;
            margin-left: 4.4vh;
            z-index: 2;
        }
        #acimaTelefone{
            margin-top: 8.5vh;
            margin-left: 4.4vh;
            z-index: 2;
        }
        #acimaSexo{
            margin-top: 10.8vh;
            margin-left: 4.4vh;
            z-index: 2;
        }
    .corpo{
        height: 55vh;
    }
    #submit{
    border-radius: 4vh;
    border: none;
    margin-top: 12vh;
    margin-left: 83%;
    cursor: pointer;
    position: absolute;
    transition: background-color 0.3s ease, transform 0.3s ease;
    color: #363636;
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
        height: 60vh;
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