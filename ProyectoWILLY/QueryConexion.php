<?php
header("access-control-allow-origin: *");
include ("ConexionBasurero.php");
$queryConexion = "";
$con = connect();
$queryView = array();

$result = pg_query($con,'SELECT wllyid, wllyCont, wllyVerif, wllyFechIni, wllyFechFin, wllyGeoloc
                         FROM wlly '); 
while($row = pg_fetch_array($result)) {
    $ubicacionid = trim ($row['wllyid']);
    $ubicacionplaca = trim ($row['wllycont']);
    $ubicacionmarca = trim ($row['wllyverif']);
    $ubicacioncolor = trim ($row['wllyfechini']);
    $ubicacioncolor1 = trim ($row['wllyfechfin']);
    $ubicaciongeoloc  = trim($row['wllygeoloc']);
    $latlon = explode(",", $ubicaciongeoloc);
    $latitud = $latlon[0];
    $longitud  = $latlon[1];
    $queryView [] = array (
        'movid' => $ubicacionid,
        'movplaca' => $ubicacionplaca,
        'movmarca' => $ubicacionmarca,
        'movmarca1' => $ubicacioncolor,
        'movmarca2' => $ubicacioncolor1,
        'latitud' => $latitud,
        'longitud' => $longitud
    );
}
$queryConexion = json_encode($queryView);
echo $queryConexion;$file = fopen("willy.txt", "r") or die("Unable to open file!");
while (!feof($file)) {
    $linea = fgets($file) ;
    $saltodelinea = nl2br($linea);
    $separar = explode(",", $saltodelinea);
    $primero = $separar[0];
    $segundo  = $separar[1];
    $tercero  = $separar[2];
    $cuarto  = $separar[3];
    $quinto  = $separar[4];
  }
  
$sql =  "UPDATE wlly SET wllyCont = '".$segundo."',wllyverif='".$tercero."',wllyFechIni='".$cuarto."',wllyFechFin='".$quinto."'where wllyid =".$primero; 
    return pg_query($con,$sql);



