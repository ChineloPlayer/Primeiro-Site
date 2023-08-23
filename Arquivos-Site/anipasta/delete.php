<?php
session_start();
require("../connect.php");
require_once('includes/func.php');
$msgLog=login1($connect);

$id = @$_GET['id'];
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
           
            if(@$_POST['Enviar']){
                $id = $_POST['id'];
                
                $sql = "DELETE FROM animes WHERE idanimes='$id'";
                $resultado = mysqli_query($connect, $sql);
                if($resultado){
                    header("location:index.php?alerta=3");
                }else{
                    header("location:index.php?alerta=0");
                }
            }
        ?>
        <div class="caixaViewCenter">
                    <div class="caixa3"> 
                        <section class="caixa2">
                        <?php if($_SESSION['nivel'] == 1){ ?>     
                        <p id="nome_anime"> Deseja eliminar o anime selecionado? </p> <p> <label id="idanimes"> </p> <br>
                            <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value="
                                <?php 
                                echo $id; 
                                ?>">
                                    <div class="divvv">
                                        <br><br>
                                            <div class="">
                                                <p><input name="Enviar" type="submit" value="Deletar">
                                            </div>
                                    </div>
                            </form>
                            <?php } else { echo "Sai fora corno, não pode apagar nada!"; }?>
                        </section> 
                    </div>
        </div>
        <?php
            include_once('includes/footer.php');
        ?>
	</body>
</html>