<?php

try{

    $dsn = "mysql:host=localhost;dbname=chamados";
    $user = 'root';
    $password = '';
    
    $conn = new PDO($dsn,$user,$password);
    
    $query = "UPDATE `usuarios` SET `perfil_id` = '2' WHERE `usuarios`.`id` = :id;";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    header('Location: usuarios.php?log=promovido');
}catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
} 

?>