<?php
/**
 * Autor: Paras Navlani
 */
require_once('../Model/connexio.php');
require_once('../Controlador/controlador.php');

$connexio = conectar();

if(isset($_POST['submit'])) {
    $usuari = $_POST['usuari'];
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya2 = $_POST['contrasenya2'];

    if(empty($usuari) || empty($email) || empty($contrasenya) || empty($contrasenya2)) {
        echo "Omplu els camps si us plau";
    } else if( $contrasenya != $contrasenya2) {
        echo 'Les contrasenyes no coincideixen';
    } else {

        $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE email = '$email'");
        $stmt->execute();
        $comprv = $stmt->fetch(PDO::FETCH_ASSOC); 
        if($comprv){
            echo "L'usuari ja existeix";
        }
        $stmt = $connexio->prepare("SELECT * FROM usuaris WHERE usuari = '$usuari'");
        $stmt->execute();
        $comprv = $stmt->fetch(PDO::FETCH_ASSOC); 
        if($comprv){
            echo "L'usuari ja existeix";
    

        } else {
            $contrasenya = hash('md5', $contrasenya);
            $stmt = $connexio->prepare("INSERT INTO usuaris (usuari, email, contrasenya) VALUES ('$usuari', '$email', '$contrasenya')");
            $stmt->execute();
            echo "Usuari registrat amb èxit";
        }
    

    
    }
}
    
require '../Vista/registrar.vista.php';

?>