<?php
/**
 * Autor: Paras Navlani
 */
require_once('../Model/connexio.php');
require_once('../Controlador/controlador.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuari = $_POST['usuari'];
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya = $_POST['contrasenya2'];


    if( $contrasenya != $contrasenya2) {
        echo 'Les contrasenyes no coincideixen';
    } else {
        $contrasenya = password_hash($contrasenya, PASSWORD_DEFAULT);
        if(existeixUsuariBDD($usuari)){
            echo "L'usuari ja existeix";
        } else {
            $stmt = $connexio->prepare('INSERT INTO usuaris (usuari, email, contrasenya) VALUES (?, ?, ?)');
            $stmt->execute([$usuari, $email, $contrasenya]);
            echo "Usuari registrat amb èxit";
        }
    }


}
?>