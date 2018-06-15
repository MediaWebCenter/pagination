<?php

(new Dotenv\Dotenv(__DIR__))->load();

define('DB_DRIVER', getenv('DRIVER'));
define('DB_HOST', getenv('HOST'));
define('DB_NAME', getenv('DATABASE'));
define('DB_USER', getenv('USERNAME'));
define('DB_PASSWORD', getenv('PASSWORD'));
define('DB_PORT', getenv('PORT'));