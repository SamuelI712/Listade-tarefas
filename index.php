<!DOCTYPE html>

<html>

<head> 
<style>
.button {
  background-color: #98FF98; 
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block; 
  font-size: 12px;
  margin: 2px 2px;
  cursor: pointer;
}

.button1 {border-radius: 2px; }
.button2 {border-radius: 4px;}
.button3 {border-radius: 8px;}
.button4 {border-radius: 12px;}
.button5 {border-radius: 50%;}

</style>
    <title>Lista de tarefas</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<!-- estilo -->
    <link href="_css/estilo.css" rel="stylesheet">
    <link href="_css/alteracao.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <h3 class="text-center">Lista de Tarefas</h3>

        <table class="table table-bordered">

            <tr>

                <th>id</th>

                <th>Nome</th>

                <th>Custo</th>
				<th>Data Limite</th>
				

            </tr>

            <tbody class="row_position">

            <?php


           require("conexao/conexao.php");


            $sql = "SELECT * FROM tarefas ORDER BY ordem ";

            $users = mysqli_query($conecta, $sql);
			$color = "white";
            while($user =mysqli_fetch_assoc($users )){
                if($user['custo']>=1000){
				$color="yellow";
				}else{
				$color="white";
				}
            ?>
				
                <tr  id="<?php echo $user['id'] ?>" >
					
					<?php if($color=="yellow"){?>
                    <td bgcolor= yellow ><?php echo $user['id'] ?></td>
					<td bgcolor= yellow ><?php echo $user['nome'] ?></td>

                    <td bgcolor= yellow ><?php echo $user['custo'] ?></td>
					<td bgcolor= yellow ><?php echo $user['data_limite'] ?></td>
					<td bgcolor= yellow ><button ><a href="alterar_tarefa.php?codigo=<?php echo $user["id"] ?>"><i class="fa fa-edit"style="font-size:12px;color:black"></i> </a></button></td>
					<td bgcolor= yellow ><button ><a href="remover_tarefa.php?codigo=<?php echo $user["id"] ?>"><i class="fa fa-trash"style="font-size:12px;color:black"></i></a></button></td>
					<?php }else{?>
					<td bgcolor= white ><?php echo $user['id'] ?></td>
					<td bgcolor= white><?php echo $user['nome'] ?></td>

                    <td bgcolor= white><?php echo $user['custo'] ?></td>
					<td bgcolor= white><?php echo $user['data_limite'] ?></td>					
					<td bgcolor= white><button ><a href="alterar_tarefa.php?codigo=<?php echo $user["id"] ?>"><i class="fa fa-edit"style="font-size:12px;color:black"></i> </a></button></td>
					<td bgcolor= white><button><a href="remover_tarefa.php?codigo=<?php echo $user["id"] ?>"><i class="fa fa-trash"style="font-size:12px;color:black"></i></a></button></td>
					<?php } ?>

                    
				
					
                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div> 
	<div style="text-align:right; width:100%; padding:0;">
	<h3>Criar nova tarefa <button class="button button5" ><a href="criar_tarefa.php"><i class="fa fa-plus" style="font-size:20px;color:black"></i></a></button></h3>
	</div>
	<main></main>
		
        <?php include_once("_incluir/rodape.php"); ?>  
</body>


<script type="text/javascript">

    $( ".row_position" ).sortable({

        delay: 150,

        stop: function() {

            var selectedData = new Array();

            $('.row_position>tr').each(function() {

                selectedData.push($(this).attr("id"));

            });

            updateOrder(selectedData);

        } 

    });


    function updateOrder(data) {

        $.ajax({

            url:"order_list.php",

            type:'post',

            data:{position:data},

            success:function(){

               alert('Ordem alterada com sucesso!');

            }

        })

    }
	


</script>

</html>