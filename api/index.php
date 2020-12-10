<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Instantiate app
$app = AppFactory::create();

$app->setBasePath("/cuidadoninos4/api/index.php");
$app->addErrorMiddleware(true, false, false);

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});
$app->post('/signup/{user}', function (Request $request, Response $response, array $args) {
    $data = json_decode($request->getBody()->getContents(), false);
   $users =  $args['user'];
   $pass =  $data->pass;
   $apellido  = $data->apellido;
    $nombre = $args['user'];

   $sig =  new stdClass();
   if ($data->pass  == "" || $data->apellido == ""  ){
   $sig->afirmativo = false;
   }else{
       $result = Capsule::table('padres')->where('nombre_padre', '=' , $users)->first();
if($result){
   if ($result->nombre_padre==$nombre){
   $sig->error = 'Ya existe ese usuario.';
   $sig->repetido =  true;
   }
}
else
{ 
 
 $sig->repetido = false;
$sig->afirmativo  =  true;
$sig->usua = $args['user'];
$pass =  $data->pass;
$apellido  = $data->apellido;
Capsule::table('padres')->insert(['nombre_padre' => $args['user'], 'apellido_padre' => $apellido, 'pass' => $pass]);
}
}
    $response->getBody()->write(json_encode($sig));
            
            return $response;
        });
        $app->post('/signup/', function (Request $request, Response $response, array $args) {
            $data = json_decode($request->getBody()->getContents(), false);
            $nombre =  $args['user'];
            $pass =  $data->pass;
            $apellido  = $data->apellido;
            if ($data->user == "" || $data->pass  == "" || $data->apellido == ""  ){
                $name->afirmativo = false;
            }
            $response->getBody()->write(json_encode($name));
            
            return $response;
        });
$app->post('/login/{user}', function (Request $request, Response $response, array $args) {

    $data  = json_decode($request->getBody()->getContents(), false);
    $usuario =  ($args['user']);
    $pass =  $data->pass;
    $user = Capsule::table('padres')->select(['nombre_padre', 'pass'])->where('nombre_padre', $usuario)->where('pass', $pass)->first();


    $msg =  new stdClass();
    if ($user->nombre_padre == $data->user || $user->pass == $data->pass  ){
    $msg->afirmativo = true;
    $msg->nombre =  $user->nombre_padre;
    $msg->usua = $usuario;
    }else{
        $msg->afirmativo  =  false;
    }

    
    $response->getBody()->write(json_encode($msg));
    return $response;
});
$app->post('/signupkid/{kid_name}', function (Request $request, Response $response, array $args) {
    $data = json_decode($request->getBody()->getContents(), false);
    $kid_name=  $args['kid_name'];
    $apellido  = $data->kid_ape;
    $user = Capsule::table('padres')->select(['id_padre'])->where('nombre_padre', $data->dad_name)->first();
    $msg =  new stdClass();
    if ($data->kid_name  == "" || $data->kid_ape == "" || $data->dad_name == "" || $data->dad_ape == "" ){
    $msg->afirmativo = false;
    }else{
        $result = Capsule::table('niños')->where('nombre_niño', '=' , $kid_name)->first();
 if($result){
    if ($result->nombre_niño==$kid_name){
    $msg->error = 'Este niño ya se esta cuidando.';
    $msg->repetido =  true;
    }
}
else
{ 
 
 $msg->repetido = false;
$msg->afirmativo  =  true;
$msg->usua = $args['kid_name'];
$apellido  = $data->kid_ape     ;
Capsule::table('niños')->insert(['nombre_niño' => $args['kid_name'], 'apellido' => $apellido, "padres_id_padre" => $user->id_padre, "tiempo" => $data->tiempo, "edad" => $data->edad, "cuidadores_id_cudiador" => $data->cuidador]);
}
}

$response->getBody()->write(json_encode($msg));
return $response;
});
// Run application
$app->run();