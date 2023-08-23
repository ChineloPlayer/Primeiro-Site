<?php
 session_start();
 require("../connect.php");
 require('includes/func.php');
 $msgLog=login1($connect);

if($_SERVER['REQUEST_METHOD']=='POST'){
    //criar variaveis com os valores recebidos do formulario (array POST)
    $N_anime=$_POST['nome_anime'];
    $G_anime=$_POST['genero'];
    $Q_eps=$_POST['episodios_qnt'];
    $D_lancamento=$_POST['data_estreia'];
    $Q_temporada=$_POST['temporada_qnt'];
    $id_estudio=$_POST['id_estudio'];
    $ida=$_GET["id"];
    $wiki=$_POST['wiki_anime'];
    $imagem = $_FILES["img_a"];
    deleteImg($connect, $ida);
    $ft_a = 'animagens/'.$imagem['name'];
    move_uploaded_file($imagem['tmp_name'], $ft_a);
    

    
    /* definir uma instrucao SQL */
    $sql="UPDATE animes SET nome_anime='$N_anime', genero='$G_anime', episodios_qnt=$Q_eps, 
    data_estreia='$D_lancamento', temporada_qnt=$Q_temporada, wiki_anime='$wiki', img_a='$ft_a' WHERE idanimes=$ida";
    
    /* enviar SQL para BD */
    $resultado= mysqli_query($connect, $sql); 
    //die($sql);
    /* verificar o sucesso na inserçao dos dados na BD*/
    if($resultado === TRUE){
        header("location:index.php?alerta=2");
    }else{
        header("location:index.php?alerta=0");
    }
}elseif (isset($_GET["id"]))
    {
    $ida=$_GET["id"];
        
    $query = "SELECT * FROM animes WHERE animes.idanimes='$ida'"; 

    $result = mysqli_query($connect, $query);
    $dados=mysqli_fetch_array($result);
    $ide=$dados['id_estudio'];
    $nome=$dados['nome_anime'];
    $genero=$dados['genero'];
    $episodios=$dados['episodios_qnt'];
    $data=date("Y-m-d",strtotime($dados['data_estreia']));
    $temporadas=$dados['temporada_qnt'];
    $ft_a=$dados['img_a'];
    $wiki=$dados['wiki_anime'];

}
   
?>

<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>::  PHP + BD ::</title>
		<link href="includes/style.css" rel="stylesheet">
        <script src="includes/coolstuffs.js"></script> 
		<meta charset="UTF-8">
	</head>
	<body>
        <?php
            include_once('includes/header.php');      
        ?>
        <div class="caixaViewCenter">
            <div class="caixa3"> 
                <section class="caixa3">   
                    <?php if($_SESSION['nivel'] == 1){ ?>     
                    <p id="text"> Editar anime </p>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="caixa3">
                            <table>
                                    <tr><td> Foto do anime </td><td><input type="file" value ="<?php echo $ft_a ?>" name="img_a"></td></tr>
                                    <!--------------------------------------------------------------------------->
                                    <tr><td> Genero do anime </td><td><input type="text" value="<?php echo $genero ?>" name="genero"></td></tr>
                                    <!--------------------------------------------------------------------------->
                                    <tr><td> Nome do Anime </td><td><input type="text" value="<?php echo $nome ?>" name="nome_anime"></td></tr>
                                    <!--------------------------------------------------------------------------->
                                    <tr><td> Quantidade de episodios </td><td><input type="text" value="<?php echo $episodios ?>" name="episodios_qnt"></td></tr>
                                    <!--------------------------------------------------------------------------->
                                    <tr><td> Data de estréia </td><td><input type="date" value="<?php echo $data ?>" name="data_estreia"></td></tr>
                                    <!--------------------------------------------------------------------------->
                                    <tr><td> Quantidade de temporadas </td><td><input id="temporada_qnt" type="text" value="<?php echo $temporadas ?>" name="temporada_qnt"></td></tr>
                                    <!--------------------------------------------------------------------------->        
                                    <tr><td>wiki(opcional) </td><td><input name="wiki_anime" value="<?php echo $wiki ?>" type="text"></td></tr>
                                    <!--------------------------------------------------------------------------->
                                    <tr><td>Estudio </td><td><select name="id_estudio" value="<?php echo $data ?>" id="id_estudio">
                                    <!--------------------------------------------------------------------------->
                                    <?php
                                        $sql="select nome_estudio, id_estudio FROM estudios";
                                        $resultado= mysqli_query($connect, $sql);
                                        while ($item= mysqli_fetch_array($resultado)){
                                    ?>
                                <option value="<?php echo $item['id_estudio']?>"><?php echo $item['nome_estudio']?></option>
                                    <?php } ?>
                                </td></tr>

                                <tr><td></td><td><input type="submit" value="Editar">
                                    <input type="reset" value="Refazer"></td></tr>
                            </table>
                        </div>            
                    </form>
                    <?php } else echo "Erro! Vc não tem acesso a isso"; ?>
                </section> 
            </div>
        </div>                                    
        <?php
            include_once("includes/footer.php");
        ?>
	</body>
</html>