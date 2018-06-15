<?php

//Vendor------------------------------------------------------------------------------
require  BASE_PATH .'/vendor/autoload.php';
//Configuracion-----------------------------------------------------------------------
require BASE_PATH .'/src/config/config.php';
//Container dependencies--------------------------------------------------------------
require BASE_PATH .'/src/container/dependencies.php';
//Rutas web---------------------------------------------------------------------------
require BASE_PATH .'/src/routes/web.php';
//Rutas api---------------------------------------------------------------------------
require BASE_PATH .'/src/routes/api.php';
//Middlewares-------------------------------------------------------------------------
require BASE_PATH .'/src/middlewares/Middlewares.php';



$app->run();