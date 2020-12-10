<?php
require_once  "data.php";
 require_once "header.php";
 use Illuminate\Database\Capsule\Manager as Capsule;
 if(!$loggedin){
    if(isset($_GET['user']))
    {
      $usuario = $_GET['user'];
      $_SESSION['user'] = $usuario;
    }
      } 
if($loggedin){
    $cuidadores = Capsule::table('cuidadores')->select('nombre_cuidador', 'apellido_cuidador', 'id_cudiador')->where("identi_cuidador","=", "1")->get();
echo'
<div class="columns">
    <div class="column is-three-fifths is-offset-one-fifth">
        <form method="post" action="api/index.php/signupkid">
            <p>Seleccione al cuidador!</p>
            <div class="control">
                <div class="select">
                     <select name="cuidador">';
                     foreach($cuidadores as $cui)
                     {
      echo'  <option value="'.$cui->id_cudiador.'">'.$cui->nombre_cuidador." ".$cui->apellido_cuidador .'</option>';
                }
   echo'   </select>
                </div>
            </div>
            <br>
            <p>Seleccione la edad de su hijo!</p>
            <div class="control">
                <div class="select">
                    <select name="edad">
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
    </select>
                </div>
            </div>
            <p>Seleccione el tiempo  de cuidado de su hijo</p>
            <div class="control">
                <div class="select">
                    <select name="tiempo">
      <option value="3">3 horas</option>
      <option value="4">4 horas</option>
      <option value="5">5 horas</option>
    </select>
                </div>
            </div>
            <br>
            <div class="control">
                <input class="input" name="kid_name" type="text" placeholder="Nombre del niño(a)">
            </div>
            <br>
            <div class="field">
                <input class="input" name="kid_ape" type="text" placeholder="Apellido del niño(a)">
            </div>
            <p>Datos de los padres.</p>
            <div class="field">
            <input class="input" name="dad_name" type="text" placeholder="Nombre del padre/madre">
        </div>
        <div class="field">
        <input class="input" name="dad_ape" type="text" placeholder="Apellido del padre/madre">
    </div>
    </form>
            <div class="field">
                <p class="control">
                <input data-transition="slide" class="button is-primary" type="button" value="Aceptar" onclick="signup()">
                </p>
            </div>
    </div>
</div>';
}
else
{
echo '<h1>Loguese para poder registrar a su hijo.</h1>';

}
?>
<script>
function signup(){
    axios.post( `api/index.php/signupkid/${document.forms[0].kid_name.value}`, {
      kid_name: document.forms[0].kid_name.value,
      kid_ape: document.forms[0].kid_ape.value,
      dad_name: document.forms[0].dad_name.value,
      dad_ape: document.forms[0].dad_ape.value,
      edad: document.forms[0].edad.value,
      cuidador: document.forms[0].cuidador.value,
      tiempo: document.forms[0].tiempo.value,
  })
  .then(resp =>{
    if(resp.data.repetido)
    {

      alert(`${resp.data.error}`)             
            
    }
    else{
    if(resp.data.afirmativo){
        alert(`Niño(a) registrado con exito:  ${resp.data.usua}`) 
        setTimeout(`location.href='index.php?user=${resp.data.usua}'` , 500)            
    }
    else{
        alert(`Falta llenar un campo`)
    
      }
    }
  })
}
</script>