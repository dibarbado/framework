<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$_POST) {
    ?>
        <form action="<?= Utils::link('products', 'add'); ?>" method="post">
            <div class="form-group">
                <label for="name">NOME</label>
                <input type="text" name="name" class="form-control validate-tooltip">
            </div>
            <div class="form-group">
                <label for="price">PREÇO</label>
                <input type="text" pattern="[0-9]{1,6}" maxlength="6" name="price" class="form-control validate-tooltip">
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                <button type="submit" class="btn btn-primary">SALVAR</button>
            </div>
            <div class="clearfix"></div>
        </form>
    <?php
    } else {
        $conn = new DB();
        $values = [
            'name'=>$_POST['name'],
            'price'=>$_POST['price'],
        ];
        $results = $conn->insert('products',$values);
        if ($results) {
            echo json_encode(['success','Produto adicionado com sucesso!']);
        } else {
            echo json_encode(['danger','Produto não adicionado tente novamente!']);
        }
    }
}
