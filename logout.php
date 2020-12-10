<?php 
   require_once 'data.php';
   require_once "funciones.php";
   
   
    echo'

    

    <title>logout</title>

    </head>

    <body>';

    if (isset($_SESSION['user']))
    {
       
      destroySession();
      echo '<meta http-equiv="Refresh" content="0;url=login.php">';  
    }
    else
    {

    }

    echo'

    </body>

    </html>
    ';

?>