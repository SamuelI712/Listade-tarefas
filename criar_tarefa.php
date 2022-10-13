<?php require_once("conexao/conexao.php"); ?>
<?php

    $tr = "SELECT * FROM tarefas ORDER BY ordem";
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }
	$lin=0;
	 while($linha = mysqli_fetch_assoc($consulta_tr)) {
		$lin= $linha["ordem"];
	 }
	$pos=$lin+1;
	
    // insercao no banco
    if(isset($_POST["nome"])) {
        $nome       = utf8_decode($_POST["nome"]);
        $custo  = $_POST["custo"];
        $data_lim   = utf8_decode($_POST["data_limite"]);
        $mod_custo=str_replace(',', '.', $custo);
		$custo=$mod_custo;
        $inserir     = "INSERT INTO tarefas ";
        $inserir    .= "(nome,custo,data_limite,ordem) ";
        $inserir    .= "VALUES ";
        $inserir    .= "('$nome','$custo','$data_lim','$pos')";
        
        $operacao_inserir = mysqli_query($conecta,$inserir);
		$val=false;
        if(!$operacao_inserir) { 
		echo"<script>alert('Erro,já existe uma tarefa com o mesmo nome!')</script>";	
		echo"<script> window.location.href='index.php';</script>";
		
        }  
		 else {
			echo"<script>alert('Tarefa adicionada com sucesso!')</script>";	
			echo"<script> window.location.href='index.php';</script>";
        }
		
    }

    

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Tarefas</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/crud.css" rel="stylesheet">
    </head>

    <body>
       
        
        <main> 
            <div id="janela_formulario">
            
                <form action="criar_tarefa.php" method="post">
                    <input type="text" name="nome" placeholder="Nome ">
                    <input type="int" name="custo" placeholder="Custo">
					<br>
					<label for="data_limite"> Data limite: </label>
                    <input type="date" name="data_limite" placeholder="Data limite">
                    <input type="submit" value="inserir">
                </form>
            </div>
            
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
	
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>