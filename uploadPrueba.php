<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'conexion.php';
    $imageData = $_POST ['path'];
    $nombre = $_POST['nombre'];
    $query = "SELECT numero FROM tbl_solicitudesmovil ORDER BY numero ASC";
    $result = $mysql->query($query);
    while($row = $result->fetch_array()){
            $defaultId = $row['numero'] + 1;
    }
    $imagePath = "uploads/$defaultId + $nombre.jpg";

    $SERVER_URL = "http://10.4.57.12/ssman_movil/$imagePath";


    if($result == TRUE){
        file_put_contents($imagePath, base64_decode($imageData));
    }

    $mysql->close();
}