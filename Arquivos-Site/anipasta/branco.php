<body><pre>
<?php 
require_once 'Classes.php';
    // $c1= new Animes;
    // $c1->nome ="Bic Cristal";
    // $c1->cor ="Azul"
    // print_r($c1);

    $p1 = new Banco();
    $p2 = new Banco();
    
    $p1->abrirConta("CC");
    $p1->setDono("Jubileu");
    $p1->setnumConta(2000);
    $p1->depositar(300);



    $p2->abrirConta("CP");
    $p2->setDono("Creusa");
    $p2->setnumConta("22430");
    $p2->depositar(500);
    $p2->sacar(100);
 

    print_r($p1);
    print_r($p2);

    ?>
    </pre>
</body>