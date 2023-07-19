<?php 
echo '<pre>';
print_r($_POST);
echo '</pre>';

if(!empty($_POST['nome'])){
    $dsn = "mysql:host=localhost;dbname=chamados";
    $user = 'root';
    $password = '';
    
    $conn = new PDO($dsn,$user,$password);

    $query = "SELECT * FROM usuarios WHERE email = :email ";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r($dados);
    echo '</pre>';

    if(empty($dados)){
        echo 'VAZIO';
        $query = "INSERT INTO `usuarios` (`nome`, `email`, `telefone`, `senha` , `perfil_id`) VALUES (:nome, :email, :tel, :senha, :perfil_id);";
        $stmt = $conn->prepare($query);
        
        $stmt->bindValue(':nome', $_POST['nome']);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':tel', $_POST['tel']);
        $stmt->bindValue(':senha', password_hash($_POST['senha'], PASSWORD_DEFAULT) );
        $stmt->bindValue(':perfil_id', 2);
        $stmt->execute();
    
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Location: index.php?registro=sucesso');
    }else{
        header('Location: sign.php?registro=erro2');
    }

}else{
    header('Location: sign.php?registro=erro');
}

?>