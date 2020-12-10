<?php
require_once "data.php";
require_once "header.php";
use Illuminate\Database\Capsule\Manager as Capsule;
if($loggedin){
$list = Capsule::table('niños')->select('nombre_niño', 'apellido', 'padres_id_padre', 'cuidadores_id_cudiador', 'tiempo', 'edad')->where('padres_id_padre', '=', $id_padre)->get();

foreach($list as $lista)
{
    $listpadre = Capsule::table('padres')->select('nombre_padre', 'apellido_padre')->where('id_padre', '=', $lista->padres_id_padre)->first();
$listcuidador = Capsule::table('cuidadores')->select('nombre_cuidador', 'apellido_cuidador')->where('id_cudiador', '=', $lista->cuidadores_id_cudiador)->first();
  echo '
  <table class="table">
  <thead>
    <tr>
      <th><abbr>Nombre</abbr></th>
      <th><abbr>Apellido</abbr></th>
      <th><abbr>Padre</abbr></th>
      <th><abbr>cuidador</abbr></th>
      <th><abbr>tiempo</abbr></th>
      <th><abbr>edad</abbr></th>
    </tr>
 
    <tr>
    <td>'. $lista->nombre_niño. '</td>
    <td>'. $lista->apellido. '</td>
    <td>'. $listpadre->nombre_padre. "  ". $listpadre->apellido_padre. '</td>
    <td>'. $listcuidador->nombre_cuidador ."  ". $listcuidador->apellido_cuidador.'</td>
    <td>'. $lista->tiempo. ' Horas</td>
    <td>'. $lista->edad. ' años de edad</td>

    </tr>
    <tr>
  </tbody>
</table>';
}
}
else
{
    echo '<h1>Debe estar logueado para ver la informacion...</h1>';
}