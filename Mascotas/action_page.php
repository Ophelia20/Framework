<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    
</body>
</html>

<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass);

$nombre = $_POST["ncomp"] ;
$usuario = $_POST["usuario"] ;
$contraseña = $_POST["cont"] ;
$tel = $_POST["telefono"] ;
$dir = $_POST["direccion"] ;
$masc = $_POST["nmasc"] ;
$rmasc = $_POST["razamasc"] ;
$dmasc = $_POST["descmasc"] ;
$emasc = $_POST["edad"] ;

if(!$connection) {
  echo "No se ha podido conectar con el servidor" . mysql_error();
}
        
$datab = "usuarios";      
$db = mysqli_select_db($connection,$datab);

if (!$db) {
  echo "No se ha podido encontrar la Tabla";
}

//insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
$instruccion_SQL = "INSERT INTO users (u_name, pass, nom, tel, dir, pet, raza, descr, edad, id_masc)
                    VALUES ('$usuario','$contraseña','$nombre','$tel','$dir','$masc','$rmasc','$dmasc','$emasc',1)";
                           
$resultado = mysqli_query($connection,$instruccion_SQL);
$consulta = "SELECT * FROM users";
        
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
} else {
  mysqli_close( $connection );
  header("location: index.html");
}
mysqli_close( $connection );
echo'<a href="index.html"> Volver Atrás</a>';
?>