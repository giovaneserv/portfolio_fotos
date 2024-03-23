<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();


?>

<!DOCTYPE html>
<html lang="pt-br">
    <style>
        body {
    margin: 0;
}

.master {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    font-size: 1.2em;
}

.logo img {
    max-height: 70px; 
    width: 100px;
}

.nav {
    display: flex;
    align-items: center;
    
}

.nav a {
    margin-right: 15px; 
    text-decoration: none;
    color: #333; 
}
.nav .sub{
    color: darkgray;
}
.nav .sub:hover{
      color: #333; 
}

.nav p {
    margin: 0;
    padding-right: 2px; 
}
.titulo{
    font-size: 25px;
    border-bottom: 1px solid #333;
    width: 150px;
    text-align: center;
    margin: auto;
    margin-top: 35px;

}
.logo img {
    max-height: 70px; 
    width: 100px;
    vertical-align: middle;
}
#playButton {
    border-radius: 100%;
    background-color: yellow;
    color: black;
    padding: 5px 10px;
    font-size: 10px;
    cursor: pointer;
    top: -50px;
}
#playButton:hover{
    background-color: #fbec5d;
}
.sair{
    width: 120px;
    height: 25px;
    margin-left: 2%;
    cursor: pointer;
    color: #333;
    
}
.sair img{
    width: 25%;
}
.add a{
    text-decoration: none;
   color: #FFF;

}
.add{
    background-color: #333;
    margin-right: 2%;
    padding: 0.5%;
    border-radius: 5px;
}
.add:hover{
    background-color: #696969;
    
}
.area{
    display: flex;
    justify-content: space-between;
}
    </style>
<body>
   
    <div class="master">
        
        <div class="logo"><img src="./icon/logo.png" alt="logo"> 
        
            <button id="playButton">></button>
        </div>
      
        <div class="nav">
            <a href="carrossel.php">Home</a>
            <p>Ensaios:  </p>
            <a href="carrossel.php?id=casamento" class="sub"> Casamento | </a>
            <a href="carrossel.php?id=retratos" class="sub">Retratos | </a>
            <a href="carrossel.php?id=arquitetura" class="sub">Arquitetura | </a>
            <a href="carrossel.php?id=eventos" class="sub"> Eventos</a>
            <a href="contato.php">Contatos</a>
            
            
        </div>
        
    </div>
    
    <?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // O usuário está logado
   ?>
   <div class="area">
     <div class='sair'><a href="./logout.php"> <img src='./icon/sair.png' alt='logo'></a></div>
     <div class="add"><a href="incluir.php">Adicionar Imagem</a></div>
    </div>
     <?php
    }
    ?>
    <script>
        const audio = new Audio('./icon/musica.mp3');  // Substitua 'caminho/para/sua/musica.mp3' pelo caminho correto
   
        document.getElementById('playButton').addEventListener('click', function() {
            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
            }
        });

        document.addEventListener('keydown', function(event) {
  var keyPressed = event.key.toLowerCase();
  var shiftPressed = event.shiftKey;
  var ctrlPressed = event.ctrlKey;
  
  // Verifica se as teclas Shift, Ctrl e L estão pressionadas
  if (keyPressed === 'l' && shiftPressed && ctrlPressed) {
    // Redireciona para a outra página
    window.location.href = 'login.php';
  }
});
    </script>
</body>
</html>