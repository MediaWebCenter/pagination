<?php

(new Dotenv\Dotenv(BASE_PATH))->load();

$app= new \Slim\App([
    
    "settings" => [
        
        'displayErrorDetails'=>getenv('APP_DEBUG') === 'TRUE',

        'db'=>[

            'driver'=> getenv('DRIVER'),
            'host'=>getenv('HOST'),
            'database'=>getenv('DATABASE'),
            'username'=>getenv('USERNAME'),
            'password'=>getenv('PASSWORD')

        ],

        'redis'=>[ 

            'scheme'=> 'tcp',
            'host'=>getenv('REDIS_HOST'),
            'port'=>getenv('REDIS_PORT'),
            'password'=>getenv('REDIS_PASSWORD') ?: null

        ]


    ]
    
    
]);
