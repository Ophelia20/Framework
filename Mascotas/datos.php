<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
      table {
        border: solid 2px #7e7c7c;
        border-collapse: collapse;
        position: center;            
      }
      th,h1 {
        background-color: #edf797;
      }

      td,th {
        border: solid 1px #7e7c7c;
        padding: 2px;
        text-align: center;
      }
    </style>
</head>
<body>
    
</body>
</html>

<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$usuario = $_POST["usuario"] ;
$contraseña = $_POST["cont"] ;

//verificamos la conexion a base datos
if(!$connection) 
    {
        echo "No se ha podido conectar con el servidor" . mysql_error();
    }
//indicamos el nombre de la base datos
$datab = "usuarios";
//indicamos selecionar a la base datos
$db = mysqli_select_db($connection,$datab);

if (!$db) {echo "No se ha podido encontrar la Tabla";}

$consulta = "SELECT * FROM users WHERE u_name='$usuario' AND pass='$contraseña' LIMIT 1";
        
$result = mysqli_query($connection,$consulta);
if(!$result) {
    echo "No se ha podido realizar la consulta";
}

echo "<table>";
echo "<tr>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>Telefono</th></h1>";
echo "<th><h1>Dirección</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td><h2>" . $colum['nom']. "</td></h2>";
    echo "<td><h2>" . $colum['tel']. "</td></h2>";
    echo "<td><h2>" . $colum['dir'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );
echo'<button href="index.html">Mascotas</button>';
?>