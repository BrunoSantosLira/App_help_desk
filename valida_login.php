<?php 
session_start();

$dsn = "mysql:host=localhost;dbname=chamados";
$user = 'root';
$password = '';

$conn = new PDO($dsn,$user,$password);

$usuario_autenticado = false;
$usuario_id = 0;

$user_perfil_id = null;

$query = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindValue(':email', $_POST['email']);


$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($dados);
echo '</pre>';

if(!empty($dados)){
    if(password_verify($_POST['senha'], $dados[0]['senha'])){
            $usuario_autenticado = true;
            $usuario_id = $dados[0]['id'];
            $user_perfil_id = $dados[0]['perfil_id'];
    }
}

if($usuario_autenticado){
    echo 'Usuario autenticado!';
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $user_perfil_id;
    header('Location: home.php');
}else{
    echo 'Usuario NAO autenticado!';
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
}

?>