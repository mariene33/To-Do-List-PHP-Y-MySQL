<?php 
try{
$conn = new PDO('mysql:host=localhost;dbname=aplicacion','root','' );
}catch(PDOException $e) {
    echo "Error de conexion:";
}

if(isset($_POST['id'])){
    $idVariable=$_POST ['id'];
    $completadoVariable=(isset($_POST ['completado']))?1:0;

    $sql='UPDATE tareas SET Completada=? WHERE Id=?';
    $sentencia= $conn->prepare($sql);
    $sentencia->execute ([$completadoVariable,$idVariable]);

 }
if(isset($_POST['Agregar_tarea'])){

    $Tarea=($_POST['Tarea']);
    $sql='INSERT INTO tareas (tarea) VALUE(?)';
    $sentencia= $conn->prepare($sql);
    $sentencia->execute ([$Tarea]);
}



 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tareas WHERE id=?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]);
}




$sql= "SELECT * FROM tareas";
$registros=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

error_reporting(E_ALL);
ini_set('display_errors', 1);


?>