<?php require_once("conexao/conexao.php"); ?>
<?php
    if( isset($_POST["nome"]) ) {
        $nome       = utf8_decode($_POST["nome"]);
		$t_id = $_POST["id"];
        
		// Objeto para remover
        $remover = "DELETE ";
        $remover .= "FROM  tarefas ";
        $remover .= "WHERE id = {$t_id} ";
        $operacao_remover= mysqli_query($conecta, $remover);
		echo $remover;
        if(!$operacao_remover) {
            die("Erro ao remover");   
        } else {
            echo "dados alterados com sucesso";
            header("location:index.php");   
        }
        
    }

    // Consulta a tabela de tarefas
    $tr = "SELECT * ";
    $tr .= "FROM tarefas ";
	
    if(isset($_GET["codigo"]) ) {
        $id = $_GET["codigo"];
        $tr .= "WHERE id = {$id} ";
		
    } else {
        $tr .= "WHERE id = 1 ";
    }
    
    $con_tarefa = mysqli_query($conecta,$tr);
    if(!$con_tarefa) {
        die("Erro na consulta");
    }

    $info_tarefa = mysqli_fetch_assoc($con_tarefa);

    

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Remover tarefa</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css" rel="stylesheet">
    </head>
		
	 
    <body>
      
         
        <main>  
 
				<div id="janela_formulario">
                <form action="remover_tarefa.php" method="post" name="myForm" id="myForm">
                <h2>Remover tarefa</h2>
                    
                    <label for="nome">Nome </label>
                    <input type="text" value="<?php echo utf8_encode($info_tarefa["nome"])  ?>" name="nome" id="nome">
                    <label for="custo">Custo</label>
                    <input type="int" value="<?php echo ($info_tarefa["custo"])  ?>" name="custo" id="custo">   

                    <label for="data_limite">Data Limite</label>
                    <input type="date" value="<?php echo ($info_tarefa["data_limite"])  ?>" name="data_limite" id="data_limite">
                    <input type="hidden" name="id" value="<?php echo $info_tarefa["id"] ?>">
					<button onclick="Remover_tarefa()">Remover</button>
					
					
					

                                  
                </form>   
				</div>
				<script>
              		function Remover_tarefa(){
						var r = confirm("Deseja remover a tarefa?");
						if (r == true) {
							document.getElementById("myForm").submit($info_tarefa["id"]);
						}
						else {
							document.getElementById("myForm").action = "index.php";
					   }
				}
				</script>
            
        </main>

        <?php include_once("_incluir/rodape.php"); ?>  
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>