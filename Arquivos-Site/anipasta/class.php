<?php
   class BD{
    public function __construct(){
        try{
            $CNdb = new PDO ("mysql:dbname=animezineos; host=localhost", "root", "");
            $this->connect = $CNdb;
        } catch (PDOException $errors){
                echo "errado corno, bd ta fudida".$errors->getMessage();
        } catch (Exception $errors){
                echo "erro comum.$errors->getMessage()";
        }
    
    }
    public function getBD(){
        return $this->connect;
    }
}
        class Animes {

        


    }

?>