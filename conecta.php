<?php
$host="localhost";
$usuario="root";
$senha="";
$nomedobanco="portfolio_fotos";

$conexao=mysqli_connect($host,$usuario,$senha,$nomedobanco);
if($conexao){
    echo "";
}else{
    echo("Erro na conexão!");
}

?>
