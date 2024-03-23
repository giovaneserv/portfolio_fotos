<?php
if (isset($_POST['email']) && !empty($_POST['email'])) {
    if (!empty($_POST['senha'])) {

        session_start();
        include("conecta.php");

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $query = "SELECT * FROM `usuario` WHERE email='$email'";
            $resultado = $conexao->query($query);


            if ($resultado->num_rows == 1) {
                @$usuario = $resultado->fetch_assoc();
                if (password_verify($senha, $usuario['senha'])) {
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];
                    $_SESSION['email'] = $usuario['email'];

                    $_SESSION['logged_in'] = true;
                    header("location: carrossel.php");
                } else {
                    header("location:login.php?erro");
                }
            } else {
                echo "Erro ao validar";
            }
        } else {
            echo "Erro ao conectar";
        }
    } else {
        echo "Campo Senha vazío";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .formulario {
            margin-top: 2%;
        }

        .login-box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .login-box h2 {
            color: #333;
        }

        form {
            margin: 0 auto;
            width: 25%;
            border: #333 1px solid;
            border-radius: 5px;
            padding: 2%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #333;
            border-radius: 5px;
        }

        .login {
            width: 100%;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .login:hover {
            background-color: #45a049;
        }

        .signup-link {
            margin-top: 10px;
            color: #555;
            display: flex;
            align-items: center;
            /* Alinha os itens verticalmente */
        }

        .signup-link p {
            margin-right: 5px;
            /* Adiciona um espaço à direita do texto */
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }

        .alterar-btn {
            text-decoration: none;
            color: red;
            margin-left: 5px;
            /* Adiciona um espaço à esquerda do link */
            float: right;
            margin-top: -35px;
        }

        .alterar-btn:hover {
            color: #333;
        }
    </style>

</head>

<body>
    <?php
    include "menu.php";
    ?>

    <div class="formulario">
        <form action="" method="POST">
            <h2 style="text-align: center;">Login</h2>
            <input type="text" placeholder="E-mail" name="email">
            <input type="password" placeholder="Senha" name="senha"> <br>
            <?php
            if (isset($_GET['erro'])) {
            ?>
                <p style="color:red">Informações Invalídas</p>
            <?php
            }
            ?>
            <button type="submit" class="login">Entrar</button>
            <div class="signup-link">
                <p>Ainda não tem um Login ADM?<a href="cadastrar.php">Cadastre-se aqui</a></p>
            </div>
            <?php
            // Verificar se o usuário está logado
            if (isset($_SESSION['id_usuario'])) {
                // Recuperar o id_usuario do banco de dados
                include "conecta.php"; // Certifique-se de incluir o arquivo de conexão adequado

                $id_usuario = $_SESSION['id_usuario'];

                // Consulta para obter o id_usuario do banco de dados
                $consulta = "SELECT id_usuario FROM usuario WHERE id_usuario = $id_usuario";
                $resultado = mysqli_query($conexao, $consulta);

                if ($resultado) {
                    $row = mysqli_fetch_assoc($resultado);
                    $id_usuario = $row['id_usuario'];

                    // Criação do botão
                    echo "<a href='alterar.php?id=$id_usuario' class='alterar-btn'>Alterar Dados</a>";
                } else {
                    echo "Erro na consulta ao banco de dados";
                }

                // Fechar a conexão
                mysqli_close($conexao);
            }
            ?>


        </form>

    </div>
</body>

</html>