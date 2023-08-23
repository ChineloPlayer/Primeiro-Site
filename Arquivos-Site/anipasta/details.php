<?php
 session_start();
 require("../connect.php");
 require('includes/func.php');
$msgLog=login1($connect);


if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['pesquisa'])){
    $pesq=$_POST['pesquisa'];
    /* definir uma instrucao SQL */
    $sql="SELECT * FROM animes WHERE nome_anime LIKE '%$pesq%' OR genero LIKE '%$pesq%' ORDER BY nome_anime ASC";
    /* enviar SQL e receber dados da BD */
    $resultado= mysqli_query($connect,$sql); 
}else{
    $pesq="";
}
?>


<!DOCTYPE html>
<html>
    <head>
    <title></title>
    <link href="includes/style.css" rel="stylesheet">
    </head>
<html lang="pt">
	<body>
        <?php
            include_once('includes/header.php');
        ?>
        <div class="divvv">
            <p class="divvv"> Resultados da sua pesquisa por "<?=$pesq?>" </p>
            <?php verifica_resultados($resultado) ?>                   
        </div>
        <?php
            include_once('includes/footer.php');
        ?>
	</body>
</html>