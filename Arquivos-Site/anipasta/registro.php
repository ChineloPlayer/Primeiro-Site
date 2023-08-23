<?php 
   require("../connect.php");
   require('includes/func.php');
   if(isset($_POST['user']) && isset($_POST['password'])){
    $nome=$_POST['user'];
    $senha=password_hash($_POST['password'], PASSWORD_DEFAULT);
 
             $sqlUser= "INSERT INTO usuarios (user, senha) VALUES ('$nome', '$senha')";
             $result_user = mysqli_query($connect, $sqlUser);
 
             if(mysqli_insert_id($connect)){
                 header("Location: index.php?alerta=5");
             }
             else{
                 header("Location: index.php?alerta=0");
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

                <title>Registrar</title>

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
                            border-radius: 8px;
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
                        button{
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
                            <h1>Registrar</h1>
                            <form method="POST">
                                        <input type="text" name="user" placeholder="Nome">
                                    <br><br>
                                        <input type="password" name="password" placeholder="Senha">
                                    <br><br>
                                        <input type="submit" value="Cadastrar">
                            </form>
                        </div>
                </body>
            
    </html>