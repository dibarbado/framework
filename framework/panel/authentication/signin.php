<?php

if ($_POST) {
    $conn = new DB();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $results = $conn->get_results("select id, firstname, lastname, phonenumber, email, password, birthday, gender, created, modified from sellers where email = '".$email."' and password ='".$password."'");
    if (!empty($results)) {
        $_SESSION[__MODULE__]['USER_DATA'] = reset($results);
    } else {
        $_SESSION[__MODULE__]['ALERT'] = ['danger','Login ou senha inválidos tente novamente!'];
    }
    header('location: '.$_SERVER['HTTP_REFERER']);
    exit;
}
header('location: '.Utils::link('home'));
