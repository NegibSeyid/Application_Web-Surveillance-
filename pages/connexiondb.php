<?php
try {

    $pdo = new PDO("mysql:host=localhost;dbname=surveilance;charset=UTF8",
        "root", "");

}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());

    //die('Erreur : impossible de se connecter à la base de donnée');
}
?>

