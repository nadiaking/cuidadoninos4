<?php
require_once "data.php";
require_once "header.php";
if(!$loggedin){
    if(isset($_GET['user']))
    {
      $usuario = $_GET['user'];
      $_SESSION['user'] = $usuario;
          echo'
          <meta http-equiv="Refresh" content="0;url=index.php">
          </div></body></html>
          ';
    }
      } 
echo '<div class="tile is-ancestor">
<div class="tile is-4 is-vertical is-parent">
  <div class="tile is-child box">
    <p class="title"></p>
    <img src="imagenes/cuidado.jpg">  </div>
  <div class="tile is-child box">
    <p class="title">Cuidados:</p>
    <p>De 3 a 6 horas!</p>
    <p>Desde 3 a 8 años!</p>
    <p>Todo tipo de cuidados</p>
    <p>De los mejores cuidados que pueden haber!</p>
  </div>
</div>
<div class="tile is-parent">
  <div class="tile is-child box">
    <p class="title">Un Simple registro:</p>
    <p>Nombre de su hijo(a)</p>
    <p>Edad</p>
    <p>horas que lo dejara</p>
    <p>Su nombre</p>
    <p>Es asi de sencillo el podr registrar a su hijo(a) para que nosotros podamos cuidarlo!!!</p>
    <p>Estamos abiertos desde las 6 am hasta las 8pm</p>
  </div>
</div>
</div>';
echo ' ';
