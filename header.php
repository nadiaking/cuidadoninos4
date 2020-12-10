<?php
 require_once 'data.php';

echo <<<_INIT
<!DOCTYPE html> 
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  

   <link rel="stylesheet" href="node_modules/bulma/css/bulma.min.css">
    
  <script src="node_modules/axios/dist/axios.min.js"></script>
_INIT;

  require_once 'funciones.php';

if(!$loggedin){
echo <<<_MAIN
<title>Sistema Escolar</title>
</head>
<nav class="navbar is-primary" role="navigation" aria-label="main navigation">

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="index.php">
        Home
      </a>

      <a class="navbar-item" href="signup_niño.php">
        Registrar a un niño
      </a>
        <a class="navbar-item" href="info.php">
          Información de la guarderia
        </a>
        </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="signup.php">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" href="login.php">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<section class="hero is-medium is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Guarderia infantil
      </h1>
      <h2 class="subtitle">
      Desde los 3 a los 8 años!
      </h2>
    </div>
  </div>
</section>
<body>
_MAIN;
}
if($loggedin)
{
echo '
<nav class="navbar is-primary" role="navigation" aria-label="main navigation">

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="index.php">
        Home
      </a>

      <a class="navbar-item" href="signup_niño.php">
        Registrar a un niño
      </a>
        <a class="navbar-item" href="info.php">
          Información de la guarderia
        </a>
        </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="signup.php">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" href="logout.php">
            Log out
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<section class="hero is-medium is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Guarderia infantil
      </h1>
      <h2 class="subtitle">
      Desde los 3 a los 8 años!';
      echo '<p>Bienvenido, '.$name.'</p>
      </h2>
    </div>
  </div>
</section>
';

}
?>