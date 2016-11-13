<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $conn = new DB();
    $_GET['id'] = $_GET['id'];
    $results = $conn->get_results("select id, name, price from products where id = '".$_GET['id']."'");
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <?php include __HEAD__; ?>
        </head>
        <body>
            <?php include __HEADER__; ?>
            <div class="container-fluid">
                <h2>EDITAR PRODUTO</h2>
                <br>
                <?php
                if (!empty($results)) {
                    $record = reset($results);
                ?>
                <form action="<?= Utils::link('products', 'edit'); ?>" method="post">
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <div class="form-group">
                        <label for="name">NAME</label>
                        <input type="text" name="name" value="<?= $record['name']; ?>" class="form-control validate-tooltip">
                    </div>
                    <div class="form-group">
                        <label for="price">PREÇO</label>
                        <input type="text" pattern="[0-9]{1,6}" maxlength="6" name="price" value="<?= $record['price']; ?>" class="form-control validate-tooltip">
                    </div>
                    <button type="submit" class="btn btn-primary">SALVAR</button>
                </form>
                <?php
                } else {
                ?>
                    <h4>registro não encontrado</h4>
                <?php
                }
                ?>
            </div>
            <?php include __FOOT__; ?>
        </body>
    </html>
    <?php
} else {
    $conn = new DB();
    $values = [
        'name'=>$_POST['name'],
        'price'=>$_POST['price'],
    ];
    $where = ['id'=>$_POST['id']];
    $results = $conn->update('products',$values,$where,1);
    if ($results) {
        $_SESSION['ALERT'] = ['success','Produto editado com sucesso!'];
    } else {
        $_SESSION['ALERT'] = ['danger','Produto não editado tente novamente!'];
    }
    header('location: ' . Utils::link('products'));
}
