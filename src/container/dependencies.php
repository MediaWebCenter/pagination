<?php

use GuzzleHttp\Client;
use Predis\Client as Predis;
use GuzzleHttp\Psr7\Request;
use Src\Services\ServiceFactory;

$container = $app->getContainer();
  
    //usar capsule donde queramos, fuera y llamarlo con: use ($capsule)
    $capsule= new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

/********************* Dependencias inyectadas al container **************************/

//Conexion DB eloquent
$container['db'] = function($c) use ($capsule){
    return $capsule;
};
//Guzzle HTTP client
$container['httpClient'] = function() {
    $guzzle = new Client;
    return $guzzle;
};

$container['cache'] = function($container) {

    $settings = $container['settings']['redis'];

      $client = new Predis([

            'scheme'=> $settings['scheme'],
            'host'=>$settings['host'],
            'port'=>$settings['port'],
            'password'=>$settings['password']
      ]);
      
      return new Src\Cache\RedisAdapter($client);
};

$container['services'] = function($container) {
    
    return new ServiceFactory
    (     new Client,
          $container->get('cache')
       );
    
};


