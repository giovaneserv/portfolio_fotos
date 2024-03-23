<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
    <style>
        body{
            background-color:#f8f8ff;
        }
        .contact-container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.contact-container h1, .contact-container h2 {
    color: #333;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input, textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

.but {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}

.but:hover {
    background-color: #45a049;
}

.contact-info1 {
    margin-top: 30px;
}

.contact-info1 p {
    margin-bottom: 10px;
    color: #555;
}
    </style>
</head>
<body>
    <?php
    include "menu.php";
    ?>

    <div class="contact-container">
        <h1>Entre em Contato</h1>
        <p>Estamos ansiosos para ouvir de você. Preencha o formulário abaixo ou use as informações de contato.</p>

        <form action="processa_formulario.php" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Mensagem:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit" class="but">Enviar Mensagem</button>
        </form>

        <div class="contact-info1">
            <h2>Informações de Contato</h2>
            <p>Email: contato@seusite.com</p>
            <p>Telefone: (XX) XXXX-XXXX</p>
            <p>Endereço: Rua Exemplo, 123 - Cidade</p>
        </div>
    </div>
    <script>
        const audio = new Audio('../9convert.com - Chillhop Rooftop Night Vibes Relax Under the Stars.mp3');  // Substitua 'caminho/para/sua/musica.mp3' pelo caminho correto
    
        document.getElementById('playButton').addEventListener('click', function() {
            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
            }
        });
    </script>
</body>
</html>