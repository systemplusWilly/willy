<?php
function connect (){
$host = "localhost";
$port = "5432";
$db = "willy_db";
$user = "postgres";
$pass = "postgres";
        $connection = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass");
        return $connection;
		$conexion = pg_connect($connection) or die("Error en la Conexión: ".pg_last_error());
echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";

pg_close($conexion);
}
?>
<?php
