<?php
$targetDirectory = "./img/";
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// Verifica se o arquivo de imagem é real ou falso
if(isset($_POST["submit"]) && !empty($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "O arquivo é uma imagem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }
}

// Verifica se o arquivo já existe


// Verifica o tamanho do arquivo
if ($_FILES["fileToUpload"]["size"] > 900000) {
    echo "Desculpe, o arquivo é muito grande.";
    $uploadOk = 0;
}

// Permitir apenas certos formatos de arquivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
    $uploadOk = 0;
}

// Se $uploadOk estiver configurado para 0, houve um erro
if ($uploadOk == 0) {
    echo "Desculpe, seu arquivo não foi enviado.";

// Se tudo estiver ok, tente fazer o upload do arquivo
} else {
    $nomeAleatorio = uniqid();

    // Obtém a extensão do arquivo original
    $extensao = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
    $novonome = $nomeAleatorio . "." . $extensao;
    // Monta o caminho completo do arquivo de destino com nome aleatório e extensão original
    $caminhoArquivo = $targetDirectory . $novonome;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $caminhoArquivo)) {
        echo "O arquivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " foi enviado.";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            include "conecta.php";
            
              
                $categoria=$_POST['categoria'];
                $titulo=$_POST['titulo'];
                $descricao=$_POST['descricao'];
    
                
                mysqli_query ( $conexao, "INSERT INTO `fotos`(`nome_foto`, `posicao`, `categoria`, `titulo`, `descricao`) VALUES ('$novonome',default,'$categoria','$titulo','$descricao')");
                
                echo "cadastrado";
                header("location: incluir.php");
            }else{
                echo "<h3>Preencha todo o Formulario";
            }
        
    } else {
        echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
    }
}
?>
