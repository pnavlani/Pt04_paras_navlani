<?php
/**
 * Autor: Paras Navlani
 */
require_once('../Model/connexio.php');
require_once('../Controlador/controlador.php');

//$connexio = conectar();

if(isset($_POST['submit'])) {
    $usuari = $_POST['usuari'];
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya2 = $_POST['contrasenya2'];

    if(empty($usuari) || empty($email) || empty($contrasenya) || empty($contrasenya2)) {
        if(empty($_POST['email'])){
            $errors["email"] = "Ompliu el email";
        }
    
        if(empty($_POST['usuari'])){
            $errors["usuari"] = "Ompliu el camp d'usuari";
        }

        if(empty($_POST['contrasenya'])){
            $errors["contrasenya"] = "Ompliu el camp de contrasenya";
        }

        if(empty($_POST['contrasenya2'])){
            $errors["contrasenya2"] = "Ompliu el segon camp de contrasenya";
        }

    } else if( $contrasenya != $contrasenya2) {
        echo 'Les contrasenyes no coincideixen';
    } else {
        registrarse($email,$usuari,$contrasenya);
    }
    
}

    function registrarse($email,$usuari,$contrasenya){
        $connexio =conectar();
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

/*
if(!empty($nom) && !empty($correo) && !empty($text)){
    enviarPhpMailer($nom,$correo,$text);
   echo
   "<script>
   alert('Enviat correctament');
    </script>";
}else{

    if(empty($_POST['correo'])){
        $errors["correo"] = "Ompliu l'adreça";
        
        
    }else if( !filter_var($correo,FILTER_VALIDATE_EMAIL)){
        $errors["correo"] = "L'adreça incorrecta, ha de haver '@' i '.' ";
    }

    if(empty($_POST['correo'])){
        $errors["nom"] = "Ompliu el nom";
    }

    if(empty($text)){
        $errors[] = "Ompliu el Text";
    }

    if( $contrasenya != $contrasenya2) {
        echo 'Les contrasenyes no coincideixen';

} */
 
include '../Vista/registrar.vista.php';

?>