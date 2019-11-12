<?php 
$serverName = 'DESKTOP-8RVHB35';

$connectionInfo = array("Database"=>"Follow","UID"=>"","PWD"=>"","CharacterSet"=>"UTF-8");

$con = sqlsrv_connect($serverName, $connectionInfo);

if($con){
   # echo "conexion exitosa";
}else{
    echo "fallo en la conexion";
   // die(print_r(sqlsrv_errors(), true));
}
?>
