<?php
    session_start();
    require("../connect.php");
    include('includes/func.php');
    include('class.php');
    $msgLog=login1($connect);

    $query = "SELECT animes.*, estudios.nome_estudio AS N_estudio FROM animes INNER JOIN estudios ON (estudios.id_estudio = animes.id_estudio) 
    ORDER BY animes.nome_anime"; 

    $result = mysqli_query($connect, $query);

    if(isset($_GET["alerta"])){
            $msgAlerta = verifAlerta($_GET["alerta"]);
        }else{
            $msgAlerta="";
            

}?>

<!DOCTYPE html>
<html>
    <head>
            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>   
    <title></title>
    <link href="includes/style.css" rel="stylesheet">
    </head>
<body>
    <?php 
    include("includes/header.php");
    echo $msgAlerta;
    ?>
    <br>
    <div class="row" style="flex-direction: row">
        <?php
            while ($row=mysqli_fetch_array($result)){
        ?>
            
            <div class="col-sm-2" style="margin-bottom: 20px;">
                <a href="view.php?id=<?php echo $row["idanimes"]?>">
                    <div id="card" style="width: 100%; height: 300px; text-align: center;">
                                 <h5 class="card-title"><?php echo $row["nome_anime"]?></h5>
                                <div class="animeColumnIndex" style="">
                                    <img src=<?=$row["img_a"] != null ? $row["img_a"] : "imgs/default.jpg" ?> class="anime-thumbnail" alt="...">
                                </div>
                            <div class="card-body">
                            </div>
                    </div>
                </a>
            </div>
        <?php
            }
        ?>
    </div>
    <br>
    <?php include("includes/footer.php");
    ?>
</body>