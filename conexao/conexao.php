<?php
//abrir conexão
$servidor="localhost";
$usuario="root";
$senha="";
$banco="sistema";
$porta="3308";
$conecta=mysqli_connect($servidor,$usuario,$senha,$banco,$porta);
//testar a conexão
if(mysqli_connect_errno()){
    die("conexao falhou:".mysqli_connect_errno());
}
?>