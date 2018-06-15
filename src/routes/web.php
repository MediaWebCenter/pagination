<?php
use Illuminate\Pagination\LengthAwarePaginator;
use Src\Models\User;
use Src\Models\Topic;
use Src\Services\Transformers\Api\userTopic;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


//respuesta segun sale de la bbdd
$app->get('/',function(Request $request, Response $response) use($container){
     
  //sacar la query
  $dbUser=  User::with(['topics'])->get();
  //convertir el objeto en un array
  $arrayUser=$dbUser->toArray();
  //sacar la pagina
  $page= $request->getParam('page', 1);
  //colocar numero de items por pagina
  $perpage = $request->getParam('perPage', 10);
 
  $user= new LengthAwarePaginator (
       //trocear el array para colocar los items por pagina   
       $sliceUsers = array_slice( $arrayUser, ($page-1) * $perpage, $perpage),
       //colocar la longitud del array
       count($arrayUser),
       $perpage,
       $page,
       ['path'=> $request->getUri()->getPath(), 'query'=>$request->getParams()]


  );

  return $response->withJson([
    //separar la data en el array troceado
    'data'=> $sliceUsers,
    //introducir los metadatos para trabajar con ellos en la API
    'meta'=>[

      'pagination'=> array_except($user->toArray(), ['data'])
      ]
  
  ],200);


});

//respuesta con transformers
$app->get('/transformer',function(Request $request, Response $response) use($container){
    
  //sacar la query
  $dbUser=  User::with(['topics'])->get();
  //convertir el objeto en un array
  $arrayUser=$dbUser->toArray();
 
  //transformar los datos
  $tranfomerData= (new userTopic($arrayUser))->create();
  //sacar la pagina
  $page= $request->getParam('page', 1);
  //colocar numero de items por pagina
  $perpage = $request->getParam('perPage', 10);
 
  $user= new LengthAwarePaginator (
       //trocear el array para colocar los items por pagina   
       $sliceUsers = array_slice( $tranfomerData, ($page-1) * $perpage, $perpage),
       //colocar la longitud del array
       count($arrayUser),
       $perpage,
       $page,
       ['path'=> $request->getUri()->getPath(), 'query'=>$request->getParams()]


  );

  return $response->withJson([
    //separar la data en el array troceado
    'data'=> $sliceUsers,
    //introducir los metadatos para trabajar con ellos en la API
    'meta'=>[

      'pagination'=> array_except($user->toArray(), ['data'])
      ]
  
  ],200);


});




