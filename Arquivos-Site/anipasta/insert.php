<?php
 session_start();
 require("../connect.php");
 require('includes/func.php');
 $msgLog=login1($connect);


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // criar variaveis com os valores recebidos do formulario (array POST)
    $N_anime=$_POST['nome_anime'];
    $G_anime=$_POST['genero'];
    $Q_eps=$_POST['episodios_qnt'];
    $D_lancamento=$_POST['data_estreia'];
    $Q_temporada=$_POST['temporada_qnt'];
    $id_estudio=$_POST['id_estudio'];
    $ida=$_GET["id"];
    $wiki=$_POST['wiki_anime'];
    $imagem = $_FILES["img_a"];
    $ft_a = 'animagens/'.$imagem['name'];
    move_uploaded_file($imagem['tmp_name'], $ft_a);

        /* definir uma instrucao SQL */
        $sql="INSERT INTO animes (idanimes, id_estudio, nome_anime, img_a, genero, episodios_qnt, data_estreia, temporada_qnt, wiki_anime)
        VALUES (NULL, $id_estudio, '$N_anime', '$ft_a', '$G_anime', $Q_eps, '$D_lancamento', $Q_temporada, '$wiki_a')";
        
        /* enviar SQL para BD */
        $resultado= mysqli_query($connect, $sql); 
        
        /* verificar o sucesso na inserçao dos dados na BD*/
        if($resultado === TRUE){
            header("location:index.php?alerta=1");
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
                    <div class="dive"> <p id="nome_anime"> Insira um novo anime </p> </div> <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="divvv">
                                <table>
                                        <tr><td> Foto do anime </td><td><input type="file" name="img_a"></td></tr>
                                        <!--------------------------------------------------------------------------->
                                        <tr><td> Genero do anime </td><td><input type="text" name="genero"></td></tr>
                                        <!--------------------------------------------------------------------------->
                                        <tr><td> Nome do Anime </td><td><input type="text" name="nome_anime"></td></tr>
                                        <!--------------------------------------------------------------------------->
                                        <tr><td> Data de estréia </td><td><input type="date" value="<?php echo $data ?>" name="data_estreia"></td></tr>
                                        <!--------------------------------------------------------------------------->
                                        <tr><td> Quantidade de episódios </td><td><input type="text" name="episodios_qnt"></td></tr>
                                        <!-- --------------------------------------------------------------------- -->
                                        <tr><td> Quantidade de temporadas </td><td><input id="temporada_qnt" type="text" name="temporada_qnt"></td></tr>
                                        <!--------------------------------------------------------------------------->
                                        <tr><td>wiki(opcional) </td><td><input name="wiki_a" type="text"></td></tr>
                                        <!--------------------------------------------------------------------------->
                                        <tr><td>Estudio </td><td><select name="id_estudio" id="id_estudio">
                                        <!--------------------------------------------------------------------------->
                                                <?php
                                                    $sql="select nome_estudio, id_estudio FROM estudios";
                                                    $resultado= mysqli_query($connect, $sql);
                                                    while ($item= mysqli_fetch_array($resultado)){
                                                ?>

                                        <option value="<?php echo $item['id_estudio']?>"><?php echo $item['nome_estudio']?></option>
                                        <?php } ?>
                                        </td></tr>

                                        <tr><td></td><td><input type="submit" name="submit" value="Inserir">
                                        <input type="reset" value="Refazer"></td></tr>
                                </table>
                            </div>                        
                        </form>
                        <?php } else {
                            echo ("sua namorada ta te traindo enquanto você ta tentando hackear um site de anime");
                        } ?>
                    </section> 
                </div>
    </div>
            <?php
                include("includes/footer.php");
            ?>
	</body>
</html>