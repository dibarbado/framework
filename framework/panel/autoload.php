<?php
session_start();

header('Content-Type: text/html; charset=utf-8');

require 'config.php';

require __BASE_PATH__.'../vendor/class.db.php';

require __BASE_PATH__.'../vendor/utils.php';

require __BASE_PATH__.'authentication/auth.php';
