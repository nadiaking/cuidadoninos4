<?php
   require_once "data.php";
    require_once "header.php";
     
echo <<<_END
<div class="columns">
    <div class="column is-three-fifths is-offset-one-fifth">

        <div class="field">
        <form method='post' action='api/index.php/signup'>
            <label class="label">Nombre</label>
            <div class="control">
                <input class="input" maxlength='16' type="text" name='user' placeholder="Nombre....">
            </div>
        </div>

        <div class="field">
            <label class="label">Apellido</label>
            <div class="control">
                <input class="input" maxlength='16' name='apellido' type="text" placeholder="Apellido....">
            </div>
        </div>

            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                    <input class="input" maxlength='16' type="password" name='pass' placeholder="Contraseña...">
                </div>
                <br>
                </form>
                <input data-transition='slide' class='button is-primary' type='button' value='Aceptar' onclick="signup()">
            </div>
        </div>
    </div>  

_END;
?>
<script>
function signup(){
    axios.post( `api/index.php/signup/${document.forms[0].user.value}`, {
      user: document.forms[0].user.value,
     apellido: document.forms[0].apellido.value,
     pass: document.forms[0].pass.value,
  })
  .then(resp =>{
    if(resp.data.repetido)
    {

      alert(`${resp.data.error}`)             
            
    }
    else{
    if(resp.data.afirmativo){
        alert(`Registrado con exito:  ${resp.data.usua}`) 
        setTimeout(`location.href='index.php?user=${resp.data.usua}'` , 500)            
    }
    else{
        alert(`Falta llenar un campo`)
    
      }
    }
  })
  .catch(error =>{
    console.log(error);
  });
          
    }

    
</script>