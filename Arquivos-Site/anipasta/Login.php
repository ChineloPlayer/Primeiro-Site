<?php
session_start();
    require("../connect.php");
    $msgLog="";

    if(isset($_POST['user']) && isset($_POST['password'])){
        $nome=$_POST['user'];
        $senha=$_POST['password'];
        
        $sqlUser= "SELECT * FROM usuarios WHERE user='$nome'";
        $result_user = mysqli_query($connect, $sqlUser);
        
        if(mysqli_num_rows($result_user)>0){
            $linha=mysqli_fetch_array($result_user);
            // guardar como var local a info retornada da BD: a password encriptada e o nivel de acesso
            $passBd=$linha['senha'];
            //echo var_dump($linha);
            //echo var_dump($_POST);
            // Verificar se a pass preenchida corresponde à pass armazenada na BD
            //echo password_hash($senha,PASSWORD_DEFAULT);
            if(password_verify($senha,$passBd)){
                $_SESSION['user']=$nome;
                footer("location:index.php?logOK");
            }else{
                $msgLog= "<p class='logP'>A password está incorreta</p>";
            }    
        }else{
            $msgLog= "<p class='logP'>O utilizador $nome não foi encontrado</p>";
        }
    
    if(!isset($msgLog)){
        $msgLog="";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="includes/Login.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
         <style>
             body{
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(45deg, rgb(5, 145, 31), rgb(1, 30, 1));
        }
             div {
                background-color: rgba(0, 0, 0, 0.8);
                position:absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                padding: 80px;
                border-radius: 15px;
                color:white;
        }
            input{
                padding:15px;
                border:none;
        }
            input[type=submit]{
                background-color:dodgerblue;
                border: none;
                padding: 15px;
                width: 100%;
                border-radius: 8px;
                color:white;
                font-size:15px;
                cursor:pointer;
        }
            button:hover{
                background-color:deepskyblue
        }
         </style>
</head>
    <body>
         <a href="index.php">Voltar</a>
            <div class="PlaceLogin">
                    <form action="" method="POST">
                        <h1>Login</h1>
                            <input type="text" name="user" placeholder="Nome">
                        <br><br>
                            <input type="password" name="password" placeholder="Senha">
                        <br><br>
                            <input type="submit" value="Enviar">
                    </form>
                    <span><?=$msgLog?></span>
            </div>
    </body>
        
</html>