<?php
session_start();
require("../connect.php");
require('includes/func.php');
$msgLog=login1($connect);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // criar variaveis com os valores recebidos do formulario (array POST)
   
    $N_estudio=$_POST['nome_estudio'];  
  
    /* definir uma instrucao SQL */
    $sql="INSERT INTO estudios VALUES ('$N_estudio', NULL)";
    
    $resultado= mysqli_query($connect, $sql); 
   
    /* verificar o sucesso na inserçao dos dados na BD*/
    if($resultado === TRUE){
        header("location:index.php?alerta=4");
    }else{
        header("location:index.php?alerta=0");
    }
   }

?>



<!DOCTYPE html>
<html lang="pt">
            <head>
                <title>::  PHP + BD ::</title>
                <link href="includes/style.css" rel="stylesheet">
                <meta charset="UTF-8">
            </head>
                <body>
                    <?php
                    include_once('includes/header.php');
                    ?> 
                    <div class="caixaViewCenter">
                        <div class="caixa3"> 
                            <section class="caixa2">
                                <?php if($_SESSION['nivel'] == 1){ ?> 
                                    <p id="nome_anime"> Insira um novo estudio </p> <br> 
                                        <form action="" method="POST">
                                            <div class="divvv">
                                
                                                    <p id="text">Produtores <input type="text" name="nome_estudio"></p>          

                                                    <p><input type="submit" value="Inserir">
                                                    <input type="reset" value="Refazer"></p>
                                            </div>
                                        </form>
                                    <?php }
                                    else {
                                        echo "SAI FORA IRMÃO, SÓ ADM PODE!";
                                        }?>
                            </section> 
                        </div>
                    </div>    
                    <?php
                        include("includes/footer.php");
                    ?>
                </body>
</html>