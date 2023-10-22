<?php
/**
 * Autor: Paras Navlani
 */
require_once ('../Model/connexio.php');       
$connexio = conectar();

if($_SERVER["REQUESTED_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];

    $stmt = $connexio->prepare('SELECT * FROM usuaris WHERE email = ?');
    $stmt->execute([$email]);
    $usuari = $stmt->fetch();

    if($usuari && password_verify($contrasenya, $usuari['contrasenya'])) {
        session_start();
        $_SESSION['usuari'] = $usuari;
        echo "S'ha iniciat la sessió";
        header("Location: ../Vista/index.vista.php");
    } else {
        echo "Email o la contrasenya son incorrectes";
    }

    if(isset($_POST['enrere'])) {
        header('Location: ../Vista/index.vista.php');
        exit;
    }

    include '../Vista/logar.vista.php';
}
?>