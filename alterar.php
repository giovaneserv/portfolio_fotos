<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados</title>
    <style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f8ff;
    margin: 0;
    padding: 0;
}

.formulario {
    width: 300px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.formulario input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.formulario button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.formulario button:hover {
    background-color: #45a049;
}

    </style>
</head>

<body>
    <div class="formulario">
        <?php
        include "conecta.php";

        if (isset($_GET['id'])) {
            $id_usuario = $_GET['id'];

            $query = mysqli_query($conexao, "SELECT * FROM usuario WHERE id_usuario = $id_usuario");
            $dados = mysqli_fetch_assoc($query);
        ?>
            <form action="atualizar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dados['id_usuario']; ?>">
                <input type="text" placeholder="Nome" name="nome" value="<?php echo $dados['nome']; ?>">
                <input type="email" placeholder="E-mail" name="email" value="<?php echo $dados['email']; ?>">
                <input type="text" placeholder="Telefone" name="telefone" value="<?php echo $dados['telefone']; ?>">
                <button type="submit" class="login">Atualizar</button>
            </form>
        <?php
        } else {
            echo "ID do usuário não fornecido.";
        }
        ?>
    </div>
</body>

</html>
