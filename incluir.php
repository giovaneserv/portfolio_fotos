<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Incluir Imagem - Listagem</title>
<style>
    /* Estilos CSS aqui */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color:#f8f8ff;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        
    }

    form {
        
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="file"]{
        display: none;
    }
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .tags-container {
        border: 1px solid #ccc;
        padding: 5px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .tags-container input[type="text"] {
        width: calc(100% - 20px);
        padding: 8px;
        border: none;
        margin: 0;
        outline: none;
    }

    .tags-container input[type="text"]:focus {
        border: none;
    }

    .tags-container input[type="text"]::placeholder {
        color: #999;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .box >.delete-button {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #f44336;
        
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        cursor: pointer;
    }
    .tags-container {
        
        padding: 5px;
        display: inline-block;
    }
    
    .tag {
        display: inline-block;
        background-color: #f1f1f1;
        color: #333;
        padding: 2px 6px;
        margin: 2px;
        border-radius: 3px;
    }
    
    .tag-close {
        cursor: pointer;
    }
    #selectImg{
        color: #0056b3;
        border: 1px solid #0056b3;
        border-radius: 5px;
        text-align: center;
        padding: 1%;
        width: 80%;
        margin: 0 auto;
        margin-bottom: 2%;
        transition: 0.3s;
        cursor: pointer;
    }
    #selectImg:hover{
        padding: 3%;
    }
    button[type="submit"] {
        background-color: #008000;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 12px 20px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #6eaa5e;
    }
    .box{
        position: relative;
        width: 500px;
        margin-bottom: 20px;
    }
    .box img{
        display: block;
        width: 100%;
        border-radius: 15px;
    }
    .list{
        display: inline-block;
    }
    form img{
       border-radius: 10px;
        position: relative;
    left: 50%;
    transform: translateX(-50%);
    }
    select {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
        width: 100%;
}


</style>
</head>
<body>
    <?php
        include "menu.php";
    ?>
<div class="container">
    <h2>Incluir Imagem</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">

        <label for="fileToUpload" id="selectImg">Selecionar imagem</label>
        <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewImage(event)">
        <img id="preview" src="#" alt="Imagem selecionada" style="display: none; max-width: 100%; margin-top: 10px;">
        
        <script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>

        <label for="titulo">Titulo
        <input type="text" name="titulo">
        </label>
        <label for="descricao">Descrição
        <input type="text" name="descricao">
        </label>
        
        
            <label for="categoria">Categorias
            <select id="escolha" name="categoria" >
            <option>-Categorias-</option>  
    <option value="casamento">Casamento</option>
    <option value="retratos">Retratos</option>
    <option value="arquitetura">Arquitetura</option>
    <option value="eventos">Eventos</option>
    <!-- Adicione mais opções conforme necessário -->
  </select>
        </label>
<br>
  

    <button type="submit">Enviar</button>
    </form>

    <h2>Listagem de Imagens</h2>

        <?php
        include "conecta.php";
        // Diretório onde as imagens estão armazenadas
        if ($conexao->connect_error) {
            die("Conexão falhou: " . $conexao->connect_error);
        }
    
        // Consulta para obter as imagens do banco de dados
        $sql = "SELECT * FROM fotos";
        $result = $conexao->query($sql);
 
    if ($result->num_rows > 0) {
           echo "<div class='list'>";
        // Armazenar os resultados em um array
        $rows = [];
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        // Inverter o array
        $rows = array_reverse($rows);
    
        // Exibir os resultados
        foreach ($rows as $row) {
                // Exibe a imagem e um botão de exclusão
                
                echo "<div class='box'><img src='./img/{$row['nome_foto']}' alt='{$row['titulo']}'><button class='delete-button' onclick='deleteImage(\"{$row['nome_foto']}\")'>Excluir</button> </div>";
                
            }
            echo "</div>";
        } else {
            echo "Nenhuma imagem encontrada.";
        }
    
        // Fecha a conexão
        $conexao->close();
        ?>
       
   
</div>

<script>
    function deleteImage(filename) {
        if (confirm("Tem certeza de que deseja excluir esta imagem?")) {
            // Fazer uma requisição AJAX ou redirecionar para uma página PHP para excluir a imagem
            window.location.href = "delete.php?filename=" + filename;
        }
    }
</script>
</body>
</html>
