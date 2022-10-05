<?php
//abrir conexão
$servidor="localhost";
$usuario="root";//usuario
$senha="";//senha
$banco="sistema";//banco de dados
$porta="3308";//porta  Mysql
$conecta=mysqli_connect($servidor,$usuario,$senha,$banco,$porta);
//testar a conexão
if(mysqli_connect_errno()){
    die("conexao falhou:".mysqli_connect_errno());
}
?>
