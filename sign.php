
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
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
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Registro
            </div>
            <div class="card-body">
              <form action='registrar_usuario.php' method='post'>
              <div class="form-group">
                  <input name="nome" type="text" required class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                  <input name="email" type="email" required class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="tel" type="tel" required class="form-control" placeholder="Telefone">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" required class="form-control" placeholder="Senha">
                </div>
                <?php if(isset($_GET['registro']) && $_GET['registro'] == 'erro'){ ?>
                    <div class="text-danger">
                        Por favor, preencha todos os dados corretamente!!
                    </div>
                <?php } ?>
                <?php if(isset($_GET['registro']) && $_GET['registro'] == 'erro2'){ ?>
                    <div class="text-danger">
                        Email já cadastrado!!!
                    </div>
                <?php } ?>
                
                <button class="btn btn-lg btn-info btn-block" type="submit">Registrar-se</button>
              </form>
              <div>
                Já tem uma conta?
              </div>
              <a class="btn btn-lg btn-info btn-block" href="index.php">Login</a>

          </div>
        </div>
    </div>
  </body>
</html>