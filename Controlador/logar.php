<?php
/**
 * Autor: Paras Navlani
 */
session_start();
require_once ('../Model/connexio.php');    
$connexio = conectar();

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];

    if( empty($email) || empty($contrasenya)) {
        echo "Omplu els camps si us plau";
    }  else {
        $contrasenya = hash('md5', $contrasenya);

        $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$email'");
        $stmt->execute();
    if($stmt->rowCount() == 1) {
       
        $usuari = $stmt->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['id'] = $usuari['id'];
        $_SESSION['usuari'] = $usuari['usuari'];
        $_SESSION['email'] = $usuari['email'];
        $_SESSION['contrasenya'] = $usuari['contrasenya'];

        header('Location: usuari.php');
    }else{
        echo "L'usuari no existeix";
    }
} 


}

    include '../Vista/logar.vista.php';

?>