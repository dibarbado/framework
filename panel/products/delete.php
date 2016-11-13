<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new DB();
    $where = ['id'=>$_POST['id']];
    $results = $conn->delete('products',$where);
    if ($results) {
        $_SESSION['ALERT'] = ['success','Produto deletado com sucesso!'];
    } else {
        $_SESSION['ALERT'] = ['success','Produto não deletado tente novamente!'];
    }
}
header('location: ' . Utils::link('products'));
