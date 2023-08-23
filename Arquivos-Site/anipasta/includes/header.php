<header>
    <p>ANIMATHS</p>
    <nav>
         <div class="headerfont">
            <div class="headerfont">
                
            <a href="index.php">Pagina inicial </a>
            <?php 
            if(isset($_SESSION['user'])){?> 
                |   <a href="insert.php">Inserir anime</a> 
                <?php if($_SESSION['nivel'] == 1){ ?>
            
                |    <a href="estudios.php"> Inserir estudio</a>
            
            <?php }} 
            else
            {?>
                    <a href="registro.php"> Registrar usuario</a>
            <?php } ?>
                   <div class=""> <form METHOD="POST" action="details.php">
                    <p> Pesquisar <input type="text" name="pesquisa" > </div></p></form>                 
           
                <?= login2($msgLog); ?>
            </div>
    </nav>
</header>