<?php
session_start();
require_once('includes/func.php');
require("../connect.php");


    if(isset($_POST['update'])){

        $idanimes = $_POST['idanimes']
        $N_anime = $_POST['nome_anime'];
        $G_anime = $_POST['genero'];
        $Q_eps = $_POST['episodios_qnt'];
        $D_lancamento = $_POST['data_estreia'];
        $Q_temporada = $_POST['temporada_qnt'];
        $id_estudio = $_POST['id_estudio'];
        $wiki = $_POST['W_anime'];

        $sqlUpdate = "UPDATE animes SET nome_anime='$N_anime', genero='$G_anime', episodios_qnt='$Q_eps',
        data_estreia='$D_lancamento', temporada_qnt='$Q_temporada', W_anime='$wiki' WHERE idanimes='$idanimes'";

        $result = $conexao ->query($sqlUpdate);
    }
    header('Location:index.php');
?>