<?php

define('DS','/',true);
define('__BASE_PATH__',realpath(dirname(__FILE__)).DS,true);
define('__MODULO__','panel',true);
define('__BASE_URL__','http://192.168.0.111/',true);
define('__URL__','http://192.168.0.111/'.__MODULO__.'/',true);

define('__PUBLIC__',__BASE_URL__.'public'.DS,true);
define('__JS__',__PUBLIC__.'js'.DS,true);
define('__CSS__',__PUBLIC__.'css'.DS,true);

define('__HEAD__',__BASE_PATH__.'layouts/head.php',true);
define('__HEAD_DATATABLES__',__BASE_PATH__.'layouts/head-datatables.php',true);
define('__HEADER__',__BASE_PATH__.'layouts/header.php',true);
define('__FOOT__',__BASE_PATH__.'layouts/foot.php',true);
define('__FOOT_DATATABLES__',__BASE_PATH__.'layouts/foot-datatables.php',true);

define('DB_HOST','localhost',true);
define('DB_USER','root',true);
define('DB_PASS','123456',true);
define('DB_NAME','s',true);
define('SEND_ERRORS_TO','dibarbado@gmail.com');
define('DISPLAY_DEBUG',true);
