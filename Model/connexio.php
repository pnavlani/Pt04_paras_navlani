<?php 
// Ens connectem a la base de dades	mitjançant try...catch i fent servir PDO.
try {
    $connexio = new PDO('mysql:host=localhost;dbname=Pt03_paras_navlani', 'root', '');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    echo "Error al conectarse a la base de dades!";

}

?>