<?php
// Verifica se o parâmetro "filename" está presente na URL
include "conecta.php";

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Verifica se o parâmetro 'filename' foi enviado por POST (o nome do arquivo da imagem a ser excluída)
if(isset($_GET["filename"])) {
    $filename = $_GET["filename"];

    // Deleta a imagem do banco de dados
    $sql_delete = "DELETE FROM fotos WHERE nome_foto = '$filename'";
    if ($conexao->query($sql_delete) === TRUE) {
        echo "Imagem excluída do banco de dados com sucesso.";
    } else {
        echo "Erro ao excluir imagem do banco de dados: " . $conexao->error;
    }

    // Deleta o arquivo da imagem do diretório
    
    
    
    $caminho_arquivo = "./img/$filename";
    
    if(file_exists($caminho_arquivo)) {
        unlink("./img/"."$filename");
        $conexao->close();
        header("location: incluir.php");
    } else {
        echo "Arquivo de imagem não encontrado no diretório.";
    }
}else{
    echo "pau";
}

// Fecha a conexão
$conexao->close();
header("location: incluir.php");
?>
