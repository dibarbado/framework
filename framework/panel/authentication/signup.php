<?php

if ($_POST) {
    $conn = new DB();
    $values = [
        'firstname'=>$_POST['firstname'],
        'lastname'=>$_POST['lastname'],
        'phonenumber'=>$_POST['phonenumber'],
        'email'=>$_POST['email'],
        'password'=>$_POST['password'],
        'birthday'=>Utils::dateFormat($_POST['birthday']),
        'gender'=>$_POST['gender'],
    ];
    $results = $conn->insert('sellers',$values);
    if ($results) {
        $id = $results;
        $_SESSION[__MODULE__]['ALERT'] = ['success','Cadastro realizado com sucesso!'];
        $results = $conn->get_results("select id, firstname, lastname, phonenumber, email, password, birthday, gender, created, modified from sellers where id = ".$id);
        $_SESSION[__MODULE__]['USER_DATA'] = reset($results);
    } else {
        $_SESSION[__MODULE__]['ALERT'] = ['danger','Cadastro não realizado tente novamente!'];
    }
    header('location: '.$_SERVER['HTTP_REFERER']);
    exit;
}
header('location: '.Utils::link('home'));
