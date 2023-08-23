<?php 
// class Animes{
//     public $nome;
//     public $cor;
//     private $ponta;
//     protected $carga;
//     protected $tampada;

//     public function rabiscar(){
//         if($this->tampada == true){
//             echo "<p>vai se fuder nao da pra rabiscar mlk";
//         }else{
//             echo "<p>agora pode heh</p>";
//         }
//     }

//     public function tampar(){
//           $this->tampada = true;
//     }
//     public function destampar(){
//           $this->tampada = false;  
//     }


// }
 
// class Caneta{

//     public $modelo;
//     private $cor;
//     private $ponta;
//     private $tampada;


//     public function __construct($m, $c, $p){
//         $this->modelo = $m;
//         $this->cor =$c;
//         $this->ponta= $p;
//     }


//     public function tampar(){
//         $this->tampada = true;
//     }


//     public function getModelo(){
//         return $this->modelo;
//     }
//     public function setModelo($m){
//         $this->modelo = $m;
//     }

//     public function getPonta(){
//         return $this->ponta = $p;
//     }

//     public function setPonta($p){
//         $this->ponta = $p;
//     }

class Banco{

    public $numConta;
    protected $tipo;
    private $dono ;
    private $saldo ;
    private $status ;

    
    public function abrirConta($t){
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC"){
            $this->setSaldo(50);
        } else if ($t == "CP") {
            $this->setSaldo(150);
        }
    }
    /*-----------------------------*/
    public function fecharConta(){
        if ($this->getSaldo() > 0){
            echo("Conta com dinheiro");
        } elseif ($this->getSaldo() < 0){
            echo ("conta em débito!");
        } else {
            $this->setStatus(false);
        }
    }
    /*-----------------------------*/   
    public function depositar($v){
        if ($this->getStatus()){
            $this->setSaldo($this->getSaldo() + $v);
         } else {
            echo ("Impossivel depositar!");
         }
    }
     /*-----------------------------*/
     public function sacar($v){
       if ($this->getStatus()){
            if ($this->getSaldo() > $v){
                $this->setSaldo($this->getSaldo() - $v);
                } else {
                    echo ("Saldo insuficiente para saque");
                }
       } else {
        echo ("Nao posso sacar de uma conta fechada");
       }
}


    public function pagarMensal(){
           if ($this->getTipo() == "CC"){
            $v = 20;
        } elseif($this->getTipo() == "CP"){
            $v = 20;
        }
        if ($this->getStatus()){
            $this->setSaldo($this->getSaldo() - $v);
        } else {
            echo("problemas na conta voce é pobre");
        }
    }








    public function __construct(){
            $this->saldo = 0;
            $this->status = false;
            echo ("contineas criadas<br>");
        }
        /*-----------------------------*/
        public function setnumConta($n){
            $this->numConta = $n;
        }
        public function getnumConta(){
            return $this->numConta = $n;
        }
        /*-----------------------------*/
        public function setTipo($t){
            $this->numConta = $t;
        }
        public function getTipo(){
            return $this->tipo = $t;
        }
    
        /*-----------------------------*/
        public function setdono($d){
            $this->numConta = $d;
        }
        public function getdono(){
            return $this->dono = $d;
        }  
        /*-----------------------------*/
        public function setSaldo($saldo){
            $this->saldo = $saldo;
        }
        public function getSaldo(){
            return $this->saldo;
        }
        
        /*-----------------------------*/
        public function setStatus($status){
            $this->status= $status;
        }
        public function getStatus(){
            return $this->saldo;
        }
        /*-----------------------------*/
   
}




































?>