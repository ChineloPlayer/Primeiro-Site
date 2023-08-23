<?php
function verifAlerta($num){
    switch($num){
        case 1:
            $msgAlerta="<p class='alertas'> Um anime foi adicionado</p>";
            break;  
        case 2:
            $msgAlerta="<p class='alertas'> Atualização feita! </p>";
            break;  
        case 3:
            $msgAlerta="<p class='alertas'> Anime Eliminado!</p>";
            break;
        case 4:
            $msgAlerta="<p class='alertas'> Um estudio foi adicionado!</p>";
            break;
        case 5:
            $msgAlerta="<p class='alertas'> Usuário registrado com sucesso!";
            break;
        default:
            $msgAlerta="<p class='alertas'> A operacao não foi concluida com sucesso. Por favor tente mais tarde</p>";
            break; 
    }
    return $msgAlerta;
}


/*function getGeneroAnime($connect){
    $query = "SELECT * FROM genero";
    $result = mysqli_query($connect, $query);

    return $result;
}

function getEstudios($connect, $id){
    $query = "SELECT * FROM estudios";
    $result = mysqli_query($connect, $query);

    return $result;
}

function register($conexao){
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
}*/


function login1($conexao){
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['user'])){
        // passar p variaveis locais os dados do form de login
        $user=$_POST['user'];
        $pass=$_POST['pass'];

        //pedir à BD a info do user preenchido
        $sql="SELECT * FROM usuarios WHERE user='$user'";
        $resultado=mysqli_query($conexao,$sql);

        /* caso a BD tenha retornado algum registo... ou seja SE o utilizador foi reconhecido  */
        if(mysqli_num_rows($resultado)>0){
            $linha=mysqli_fetch_array($resultado);
            // guardar como var local a info retornada da BD: a password encriptada e o nivel de acesso
            $passBd=$linha['senha'];
            $nivel =$linha['nivel_u'];

            // Verificar se a pass preenchida corresponde à pass armazenada na BD
            if(password_verify($pass,$passBd)){
                $_SESSION['user']=$user;
                $_SESSION['nivel']=$nivel;
            }else{
                $msgLog= "<p class='logP'>A password está incorreta</p>";
            }    
        }else{
            $msgLog= "<p class='logP'>O utilizador $user não foi encontrado</p>";
        }
    }
    if(!isset($msgLog)){
        $msgLog="";
    }
    return $msgLog;
}


function login2($msgLog=""){
       // se já há dados do user na SESSION é pq já estamos logados (escondemos o formulário)
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
        $msgLog = "<p class='logP2'>Salve garaio $user - <a href='logout.php'>logout</a></p>";
        echo '
        <table id="logTab">
            <tr>
                <td colspan="3">'.$msgLog.'</td>
            </tr>
        </table>';
    }else{  // se não há SESSION então temos de nos logar (mostramos o formulário e a linha do msgLog: q pode trazer um erro ou o vazio "") 
        echo 
        '<form method="POST" action="">
        <table id="logTab">
            <tr>
                <td>
                    <input type="text" class="LogInputButton" name="user" required>
                </td>
                <td>
                    <input type="password" class="LogInputButton" name="pass" required>
                </td>
                <td>
                    <input type="submit" value="login">
                </td>
            </tr>
            <tr>
                <td colspan="3">'.$msgLog.'</td>
            </tr>
        </table>
    </form>';
    }
}

function verifica_resultados($resultado){
    //Se o select retornou resultados
    if (mysqli_num_rows($resultado)>0){
        //Loopar entre os resultados
        while($registo=mysqli_fetch_array($resultado)){
            $id=$registo['idanimes'];
            $nome_a=$registo['nome_anime'];
            echo "<p class='crudLink'><a href='view.php?id=$id'>$nome_a</a></p>";
        }
    }else{
        echo '<p class="titx"> A sua pesquisa nao retornou qualquer resultado </p>';
    }
}


function deleteImg($connect, $id){
    $sql="SELECT img_a FROM animes WHERE idanimes=$id";
    $result=mysqli_query($connect,$sql);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        
        unlink("$row[img_a]");
    }
}


?>