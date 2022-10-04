<?php require_once("conexao/conexao.php"); ?>
<?php
    if( isset($_POST["nome"]) ) {
        $nome       = utf8_decode($_POST["nome"]);
        $custo  = $_POST["custo"];
		$t_id = $_POST["id"];
        $data_lim   = utf8_decode($_POST["data_limite"]);
        
		
		//verificar se o nome já existe na tabela
		
		
		
		
		
		
        // Objeto para alterar
        $alterar = "UPDATE tarefas ";
        $alterar .= "SET ";
        $alterar .= "nome = '{$nome}', ";
        $alterar .= "custo = '{$custo}', ";
        $alterar .= "data_limite = '{$data_lim}' ";
        $alterar .= "WHERE id = {$t_id} ";
        $operacao_alterar = mysqli_query($conecta, $alterar);
        if(!$operacao_alterar) {
            echo("Erro o nome da tarefa já existe");   
			 header("location:index.php"); 
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
    
    $nome_antigo=$info_tarefa["nome"];

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar tarefa</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/alteracao.css" rel="stylesheet">
    </head>

    <body>
       
        
        <main>  
            <div id="janela_formulario">
                <form action="alterar_tarefa.php" method="post">
                    <h2>Alterar tarefa</h2>
                    
                    <label for="nome">Nome </label>
                    <input type="text" value="<?php echo utf8_encode($info_tarefa["nome"])  ?>" name="nome" id="nome">
					
                    <label for="custo">Custo</label>
                    <input type="int" value="<?php echo ($info_tarefa["custo"])  ?>" name="custo" id="custo">   

                    <label for="data_limite">Data limite</label>
                    <input type="date" value="<?php echo ($info_tarefa["data_limite"])  ?>" name="data_limite" id="data_limite">
                    <input type="hidden" name="id" value="<?php echo $info_tarefa["id"] ?>">
                    <input type="submit" value="Confirmar alteração">                    
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