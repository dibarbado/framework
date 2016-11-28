<?php

if (!isset($_SESSION[__MODULE__]['USER_DATA']) && Utils::getController()!='authentication') {
    require __BASE_PATH__.'authentication/index.php';
    exit;
}
