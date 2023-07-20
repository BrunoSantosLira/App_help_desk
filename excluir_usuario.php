<?php

try{

    $dsn = "mysql:host=localhost;dbname=chamados";
    $user = 'root';
    $password = '';
    
    $conn = new PDO($dsn,$user,$password);
    
    $query = "DELETE FROM usuarios WHERE `usuarios`.`id` = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    header('Location: usuarios.php?log=removido');

}catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
} 

?>