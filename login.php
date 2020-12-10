<?php
    require_once 'data.php';
    require_once "header.php";
  
    $error = $nombre = $pass = "";
    echo'    <title>Login</title>

    </head>
    <body>
        <div class="container-fluid">
        ';
    if(!$loggedin)
    {

        echo <<<_END
        <div class="columns">
        <div class="column is-three-fifths is-offset-one-fifth">
            <div class="field">
            <form method='post' action='api/index.php/login'>
                <label class="label">Usuario</label>
                <div class="control">
                    <input class="input" name="user" type="text" maxlength='16' placeholder="Nombre...">
                </div>
            </div>
    
            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                    <input class="input" name="pass"type="password" maxlength='16'  placeholder="contraseña.....">
                </div>
            </div>
             </form>
            <input data-transition='slide' class='button is-primary' type='button' value='Aceptar' onclick="login()">
        </div>
    </div>
    </body>
    
    </html>
    _END;
    }
    else
{
    echo'
    <meta http-equiv="Refresh" content="0;url=index.php">
    </div></body></html>
    ';
}
?>  
<script>

function login(){
    axios.post( `api/index.php/login/${document.forms[0].user.value}`, {
        user: document.forms[0].user.value,
     pass: document.forms[0].pass.value,
  })
  .then(resp =>{
    if(resp.data.afirmativo){
        alert(`Bienvenido:  ${resp.data.usua}`)
        setTimeout(`location.href='index.php?user=${resp.data.usua}'` , 500)

    }
    else{
        alert(`Contraseña o nombre de usuario incorrecto(s)`)

    }
  })
  .catch(error =>{
    console.log(error);
  });
          
    }



</script>