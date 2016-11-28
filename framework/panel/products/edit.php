<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (sizeof($_POST)==1) {
        $conn = new DB();
        $results = $conn->get_results("select id, name, price from products where id = '".$_POST['id']."'");
        if (!empty($results)) {
            $record = reset($results);
        ?>
            <form action="<?= Utils::link('products', 'edit'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                <div class="form-group">
                    <label for="name">NOME</label>
                    <input type="text" name="name" value="<?= $record['name']; ?>" class="form-control validate-tooltip">
                </div>
                <div class="form-group">
                    <label for="price">PREÇO</label>
                    <input type="text" pattern="[0-9]{1,6}" maxlength="6" name="price" value="<?= $record['price']; ?>" class="form-control validate-tooltip">
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                    <button type="submit" class="btn btn-primary">SALVAR</button>
                </div>
                <div class="clearfix"></div>
            </form>
        <?php
        } else {
        ?>
            <h4>registro não encontrado</h4>
        <?php
        }
    } else {
        $conn = new DB();
        $values = [
            'name'=>$_POST['name'],
            'price'=>$_POST['price'],
        ];
        $where = ['id'=>$_POST['id']];
        $results = $conn->update('products',$values,$where,1);
        if ($results) {
            echo json_encode(['success','Produto editado com sucesso!']);
        } else {
            echo json_encode(['danger','Produto não editado tente novamente!']);
        }
    }
}
