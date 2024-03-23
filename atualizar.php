<?php
include "conecta.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_usuario = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $query = mysqli_query($conexao, "UPDATE usuario SET nome='$nome', email='$email', telefone='$telefone', senha='$senha' WHERE id_usuario=$id_usuario");

    if ($query) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar dados.";
    }
}
header('location: carrossel.php');
?>
