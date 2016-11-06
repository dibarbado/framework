<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <?php include __HEAD__; ?>
        </head>
        <body>
            <?php include __HEADER__; ?>
            <div class="container-fluid">
                <h2>ADICIONAR PRODUTO</h2>
                <br>
                <form action="<?= Utils::link('products', 'add'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">NOME</label>
                        <input type="text" name="name" class="form-control validate-tooltip">
                    </div>
                    <div class="form-group">
                        <label for="price">PREÇO</label>
                        <input type="text" pattern="[0-9]{1,6}" maxlength="6" name="price" class="form-control validate-tooltip">
                    </div>
                    <button type="submit" class="btn btn-primary">SALVAR</button>
                </form>
            </div>
            <?php include __FOOT__; ?>
        </body>
    </html>
    <?php
} else {
    $conn = new DB();
    $values = [
        'name'=>$conn->filter($_POST['name']),
        'price'=>$conn->filter($_POST['price']),
    ];
    $results = $conn->insert('products',$values);
    if ($results) {
        $_SESSION['ALERT'] = ['success','Produto adicionado com sucesso!'];
    } else {
        $_SESSION['ALERT'] = ['danger','Produto não adicionado tente novamente!'];
    }
    header('location: ' . Utils::link('products'));
}
