<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style type="text/css">
      table {
        border: solid 2px rgb(57, 170, 151);
        border-collapse: collapse;
        position: center; 
        width: 80%;           
      }
      th {
        background-color:rgb(104, 174, 162);
      }
      td,th {
        border: solid 1px rgb(118, 150, 136);
        padding: 2px;
        text-align: center;
      }
      button {
        margin: 10px;
        height: 35px;
        width: 75px;
        background-color: rgb(57, 79, 161);
        border-radius: 8px;
        font-family: 'Verdana';
        color: white;
      }
      button:hover{
        background-color: rgb(132, 138, 165);
      }
      button:active{
        background-color: rgb(95, 104, 141);
      }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="menu">
        <section class="menu__cont">
            <h1 class="logo">MASCOTAS</h1>
            <ul class="links">
                <li class="menu__item  menu__item--show">
                    <a href="#" class="menu__link"><i class="fa fa-bars" style="font-size:24px; color:white;"></i></a>
    
                    <ul class="nesting">
                        <li class="inside">
                            <a href="masc_perd.html" class="menu__link menu__link--inside">Mascotas perdidas</a>
                        </li>
                        <li class="inside">
                            <a href="index.html" class="menu__link menu__link--inside">Salir</a>
                        </li>
                    </ul>
                </li>    
            </ul>
        </section>     
    </nav>
</body>
</html>

<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al input
$usuario = $_POST["usuario"] ;
$contraseña = $_POST["cont"] ;

//verificamos la conexion a base datos
if(!$connection) {
    echo "No se ha podido conectar con el servidor" . mysql_error();
}
//indicamos el nombre de la base datos
$datab = "usuarios";
//indicamos selecionar a la base datos
$db = mysqli_select_db($connection,$datab);

if (!$db) {
    echo "No se ha podido encontrar la Tabla";
}

$consulta = "SELECT * FROM users WHERE u_name='$usuario' AND pass='$contraseña'";
        
$result = mysqli_query($connection,$consulta);
if(!$result) {
    echo "No se ha podido ingresar";
    exit;
}

if($user = mysqli_fetch_assoc($result)) {
    echo "<br><div style='text-align: left'>";
    echo "<button id='tablaD'>Dueño</button>";
    echo "<button id='tablaM'>Mascotas</button>";
    echo "</div></br>";
    echo "<br><div style='text-align: center'>";
    echo "<table style='margin: 0 auto'>";
    echo "<tr>";
    echo "<th'><h2>Nombre</th></h2>";
    echo "<th'><h2>Teléfono</th></h2>";
    echo "<th'><h2>Dirección</th></h2>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><h3>" . $user['nom']. "</td></h3>";
    echo "<td><h3>" . $user['tel']. "</td></h3>";
    echo "<td><h3>" . $user['dir'] . "</td></h3>";
    echo "</tr>";
    echo "</table>";
    echo "</div></br>";
} else {
    echo "<b><h4 style='text-align: center'>Usuario o contraseña incorrectos</h4></b>";
}

mysqli_close( $connection );
echo'<a href="index.html"> Volver Atrás</a>';
?>