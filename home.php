<?php
  require "validador_acesso.php";

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
      .card-home {
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
                <?php $_SESSION['perfil_id'] == 1 ? print_r( 'USUARIO') : print_r( 'ADMINISTRADOR')?>
            </span>
            <a href="logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <a href="abrir_chamado.php">

                    <img src="formulario_abrir_chamado.png" width="70" height="70">
                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <a href="consultar_chamado.php">
                    <img src="formulario_consultar_chamado.png" width="70" height="70">
                  </a>
                </div>
              </div>
              <!-- OPÇÃO LIBERADA APENAS PARA ADMINS -->
              <?php if($_SESSION['perfil_id'] == 2){ ?>
                <div class="row mt-5">
                  <div class="col-12 d-flex justify-content-center">
                    <a href="usuarios.php">
                      <i class="fa-solid fa-user fa-2xl" style="font-size:70px;color:#17A2B8;"></i>
                    </a>
                  </div>
                </div>
              <?php } ?>

            </div>
          </div>
        </div>
    </div>
  </body>
</html>