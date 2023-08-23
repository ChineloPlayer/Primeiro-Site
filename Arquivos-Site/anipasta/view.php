<?php
     session_start();
     require("../connect.php");
     require('includes/func.php');
     $msgLog=login1($connect);
        if (isset($_GET["id"]))
        {
            $ida=$_GET["id"];           
            $query = "SELECT animes.*, estudios.nome_estudio AS N_estudio FROM animes INNER JOIN estudios ON (estudios.id_estudio = animes.id_estudio) 
            WHERE animes.idanimes='$ida' ORDER BY animes.nome_anime "; 
            $result = mysqli_query($connect, $query);
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title></title>
    <link href="includes/style.css" rel="stylesheet">
    </head>
<body>
    <?php include("includes/header.php");?>
    <br>
    <br>
    <div class="row" style="flex-direction: row">
        <?php
            while ($row=mysqli_fetch_array($result)){
        ?>
            <div class="caixaViewCenter">
                    <div class="colunaflex" style="margin-bottom: 20px;">
                            <div class="animecolumn" style="text-align: center;">
                                <img src=<?=$row["img_a"] != null ? $row["img_a"] : "imgs/default.jpg" ?> class="card-img-top anime-thumbnail imgBorder" alt="...">
                                <?php if($_SESSION['nivel'] == 1){ ?>
                                <a href="update.php?id=<?=$row["idanimes"]?>" id="update">Update</a>
                                <a href="delete.php?id=<?=$row["idanimes"]?>" id="delete">Delete</a>
                                <?php }?>
                            </div>
                                    <div class="coluna">
                                        <h5 class="card-title"><?php echo $row["nome_anime"]?></h5>
                                        <p class=""><?php echo("Genêro: "); echo $row["genero"]?></p>
                                        <p class="card-text"><?php echo("Data de estréia: "); echo $row["data_estreia"]?></p>
                                        <p class="card-text"><?php echo("Quantidade de temporadas: "); echo $row["temporada_qnt"]?></p>
                                        <p class="card-text"><?php echo("Quantidade de episódios: "); echo $row["episodios_qnt"]?></p>
                                        <p class="card-text"><?php  echo $row["wiki_anime"]?></p>
                                    </div>
                    </div>
            </div>
        <?php
            }
        ?>
    </div>
    <br>
    <?php include("includes/footer.php");?>
</body>