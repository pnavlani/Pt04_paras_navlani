<!-- Autor: Paras Navlani -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar-se</title>
    <link rel="stylesheet" href="../Estils/formulari.css">
</head>

<body>

<h1 align="center">Registrar-se</h1>

<div>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label> Nom d'usuari</label>
        <input type="text" id="usuari" name="usuari" placeholder="Usuari">
        <label> Email</label>
        <input type="text" id="email" name="email" placeholder="Email">
        <label> Contrasenya</label>
        <input type="password" id="contrasenya" name="contrasenya" placeholder="Contrasenya">
        <label> Torna a posar la Contrasenya</label>
        <input type="password" id="contrasenya2" name="contrasenya2" placeholder="Torna a posar la contrasenya">
  
    <input type="submit" value="Registrar-se" name="submit">
    <input type="button" value="Tornar enrere"  onclick="window.location.href='../index.php'"> 
  
  
  </form>
</div>

</body>
</html>