<?php 
    session_start();

    $dsn = "mysql:host=localhost;dbname=chamados";
    $user = 'root';
    $password = '';

    $conn = new PDO($dsn,$user,$password);

    $query = "INSERT INTO `chamados` (`User`, `titulo`, `categoria`, `descricao`) VALUES (:user, :titulo, :categoria, :descricao);";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':user', $_SESSION['id']);
    $stmt->bindValue(':titulo', $_POST['titulo']);
    $stmt->bindValue(':categoria', $_POST['categoria']);
    $stmt->bindValue(':descricao', $_POST['descricao']);

    $stmt->execute();

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Location: abrir_chamado.php');

?>