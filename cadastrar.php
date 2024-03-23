<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
 
.formulario {
    width: 300px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
 
h1 {
    text-align: center;
    color: #333;
}
 
input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}
 
button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}
 
button:hover {
    background-color: #45a049;
}
 
.error {
    color: #ff0000;
    margin-bottom: 10px;
}
    </style>

</head>

<body>
   
    
    <div class="formulario">
        <form action="" method="POST">
             <input type="text" placeholder="Nome" name="nome">
            <input type="email" placeholder="E-mail" name="email">
            <input type="text" placeholder="Telefone" name="telefone" >
            <input type="password" placeholder="Senha" name="senha">
            <input type="password" placeholder="Repitir Senha" name="resenha"> <br>
            <a href="incluir.php"><button type="submit" class="login">Cadastrar</button></a>
    
            
        </form>
        <?php
        include "conecta.php";
       if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset(($_POST['nome'])) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email']) && isset(($_POST['senha'])) && !empty($_POST['senha']) && isset(($_POST['telefone'])) && !empty($_POST['telefone']) && isset(($_POST['resenha'])) && !empty($_POST['resenha'])) {
            if($_POST['senha']==$_POST['resenha']){

            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $telefone=$_POST['telefone'];
            $senha=$_POST['senha'];

            $hash=password_hash($senha,PASSWORD_DEFAULT);
            
            mysqli_query ( $conexao, "INSERT INTO `usuario`(`id_usuario`, `nome`, `telefone`, `email`, `senha`) VALUES (default,'$nome','$telefone','$email','$hash')");
            
            echo "cadastrado";
            }else{
                echo "As senhas não considem";
            }
        }else{
            echo "<h3>Preencha todo o Formulario";
        }
    }
        ?>
    </div>
</body>

</html>