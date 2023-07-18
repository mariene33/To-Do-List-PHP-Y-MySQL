<?php 
try{
$conn = new PDO('mysql:host=localhost;dbname=aplicacion','root','' );
}catch(PDOException $e) {
    echo "Error de conexion:";
}


if(isset($_POST['Agregar_tarea'])){

    $Tarea=($_POST['Tarea']);
    $sql='INSERT INTO tareas (tarea) VALUE(?)';
    $sentencia= $conn->prepare($sql);
    $sentencia->execute ([$Tarea]);
}




$sql= "SELECT * FROM tareas";
$registros=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

error_reporting(E_ALL);
ini_set('display_errors', 1);


?>