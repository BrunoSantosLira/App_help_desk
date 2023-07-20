<?php
  require "validador_acesso.php";

    $dsn = "mysql:host=localhost;dbname=chamados";
    $user = 'root';
    $password = '';

    $conn = new PDO($dsn,$user,$password);

    $query = "SELECT * FROM USUARIOS";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
            <span class="nav-item text-white">
                <?php $_SESSION['perfil_id'] == 1 ?print_r( 'USUARIO') : print_r( 'ADMINISTRADOR')?>
            </span>
            <a href="logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Usuários cadastrados
            </div>
            
            <div class="card-body">
            <?php if(isset($_GET['log']) && $_GET['log'] == 'promovido'){ ?>
                <p class="text-success">Usuário promovido com sucesso!</p>
            <?php }else if(isset($_GET['log']) && $_GET['log'] == 'removido'){ ?>
                <p class="text-danger">Usuário removido!</p>
            <?php } ?>

              <?php foreach ($usuarios as $user) { ?>
                <div class="card mb-3 bg-light">
                    <div class="card-body">
                    <?php if($_SESSION['perfil_id'] == 2 && $user['perfil_id'] == 1){ ?>
                        <span class="float-right ml-4 ">
                            <a href="excluir_usuario.php?id=<?php echo $user['id'] ?>">
                                <i class="fa-solid fa-trash fa-2xl" style="color: #d62929;"></i>
                            </a>
                        </span>
                        <span class="float-right">
                            <a href="promover_usuario.php?id=<?php echo $user['id'] ?>">
                                <i class="fa-solid fa-angle-up fa-2xl" style="color: blue;"></i>
                            </a>
                        </span>
                    <?php } ?>

                    <h5 class="card-title font-weight-bold"><?php echo $user['id'] ?></h5>
                    <h6 class="card-title mb-2 " style="font-size:25px;"><?php echo $user['nome'] ?></h6>
                    <h5 class="card-subtitle mb-2"><?php echo $user['email'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $user['telefone'] ?></h6>
                    <p class="card-text font-weight-bold">Nivel de acesso: <?php echo $user['perfil_id'] ?></p>
                    <?php if($user['perfil_id'] == 2 ){ ?>
                        <span class="badge badge-primary">ADMINISTRADOR</span>
                    <?php } else{ ?>
                        <span class="badge badge-warning">USUARIO</span>
                    <?php } ?>
                    </div>
                </div>
              <?php } ?>

              <div class="row mt-5">
                <div class="col-12">
                  <a class="btn btn-lg btn-warning btn-block"  href="home.php">Voltar</a>
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>