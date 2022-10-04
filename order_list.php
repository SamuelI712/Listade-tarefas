<?php 


require_once("conexao/conexao.php");


$position = $_POST['position'];


$i=1;

foreach($position as $k=>$v){

    $sql = "Update tarefas SET ordem=".$i." WHERE id=".$v;

    mysqli_query($conecta, $sql);


	$i++;

}


?>