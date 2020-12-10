<?php
require "vendor/autoload.php";
require "config/database.php"; 

  function destroySession()
  {
	$_SESSION=array();

	if (session_id() != "" || isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-2592000,'/');

	session_destroy();
  }

  function sanitizeString($var)
  {
      $var = strip_tags($var);
      $var = htmlentities($var);
      return $var;
  }

?> 
    