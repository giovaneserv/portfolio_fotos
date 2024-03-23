<?php
include "menu.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <title>Carrossel</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      font-weight: 600;
      font-style: italic;
    }

    body {
      background-color: yellow;
    }

    .carousel {
      width: 80%;
      height: 50%;
      padding-top: 2%;
      margin: 0 124px;
      overflow: hidden;
      right: 0;
      position: relative;
      border-radius: 5px;
    }

    .carousel-container {
      display: flex;
      transition: transform 0.5s ease;

      height: 800px;
    }

    .carousel-container img {
      width: 100%;

    }

    .slide {
      min-width: 100%;
      flex: 0 0 auto;
    }

    button {
      margin-top: 0.1%;
      color: #FFF;
      border: none;
      border-radius: 50%;
      background-color: #333;
      width: 38px;
      height: 38px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #666666;
    }

    .prev {
      left: 0;
    }

    .next {
      right: 0;
    }


    .counter {
      position: absolute;
      top: 42%;
      padding-inline: 2%;
      padding-top: 4%;

      color: #FFF;
      font-size: 1.7em;
      background-color: #333;
      height: 130px;
      z-index: -1;
    }

    .progress-bar {

      height: 9px;
      background-color: #333;
      /* Cor da barra de progresso */
      transition: width 0.5s ease;
    }

    .cont-bar {
      margin-top: 0.5%;
      overflow: hidden;
      height: 9px;
      width: 90%;
      border: #333 solid 1px;
      border-radius: 5px;
    }

    .botoes {
      margin: 0 auto;
      display: flex;
      justify-content: space-around;
      width: 85%;
    }


    footer {
      margin-top: 7%;
      background-color: #333;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }

    /* Estilos para as informações de contato */
    .contact-info {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .contact-info div {
      margin: 0 10px;
    }

    .contact-info i {
      margin-right: 5px;
    }

    .contact-info a {
      color: #fff;
      text-decoration: none;
    }

    .contact-info a:hover {
      text-decoration: underline;
    }

    .carousel-container {
      position: relative;
    }

    .carousel-title {
      position: absolute;
      top: 80%;
      left: 50%;
      transform: translate(-50%);
      color: white;
      font-size: 24px;
      text-align: center;
      background-color: rgba(0, 0, 0, 0.5);
      padding: 10px 20px;
      border-radius: 5px;
    }
  </style>
</head>

<body>

  <div class="carousel">
    <div class="carousel-container">
      <?php
      include "conecta.php";

      // Consulta para obter as imagens do banco de dados
      if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM fotos WHERE categoria='$id'";
      } else {
        $sql = "SELECT * FROM fotos";
      }
      $result = $conexao->query($sql);

      // Verifica se existem resultados
      if ($result->num_rows > 0) {
        $i = 0;
        $rows = [];
        while ($row = $result->fetch_assoc()) {
          $rows[] = $row;
        }
        // Inverter o array
        $rows = array_reverse($rows);

        // Exibir os resultados
        foreach ($rows as $row) {
          // Adiciona a classe "first-slide" apenas ao primeiro slide<div class="carousel-container">


          echo "<div class='slide'><div class='carousel-container'><img src='./img/{$row['nome_foto']}'><div class='carousel-title'><h2>{$row['titulo']}</h2><p>{$row['descricao']}</p></div></div></div>";

          $i++;
        }
      } else {
        echo "0 results";
      }
      $conexao->close();
      ?>
    </div>


  </div>
  <span class="counter"></span>
  <div class="botoes">
    <button class="prev" onclick="moveSlide(-1)"> &#10094; </button>
    <button class="next" onclick="moveSlide(1)"> &#10095; </button>

    <div class="cont-bar">
      <div class="progress-bar"></div>
    </div>
  </div>
  <script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const counter = document.querySelector('.counter');
    const progressBar = document.querySelector('.progress-bar');

    function moveSlide(n) {
      slideIndex += n;
      showSlides();
    }

    function showSlides() {
      if (slideIndex >= slides.length) {
        slideIndex = 0;
      } else if (slideIndex < 0) {
        slideIndex = slides.length - 1;
      }

      const displacement = -slideIndex * 100 + '%';
      document.querySelector('.carousel-container').style.transform = `translateX(${displacement})`;
      counter.textContent = `${slideIndex + 1} / ${slides.length}`;
      const progress = (slideIndex + 1) / slides.length * 100;
      progressBar.style.width = `${progress}%`;
    }

    showSlides();
  </script>

  <footer>
    <div class="contact-info">
      <div>
        <i class="fas fa-map-marker-alt"></i>
        <span>123 Rua Principal, Cidade, Estado</span>
      </div>
      <div>
        <i class="fas fa-phone"></i>
        <span>(123) 456-7890</span>
      </div>
      <div>
        <i class="fas fa-envelope"></i>
        <a href="mailto:info@example.com">info@example.com</a>
      </div>
    </div>
  </footer>
</body>

</html>