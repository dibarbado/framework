<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (sizeof($_POST)==1) {
        $conn = new DB();
        $results = $conn->get_results("select id, name, price from products where id = '".$_POST['id']."'");
        if (!empty($results)) {
            $record = reset($results);
        ?>
            <strong>Você está prestes a deletar esse item.</strong>
            <form action="<?= Utils::link('products', 'delete'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                <br>
                <div class="form-group">
                    <input type="text" readonly name="name" value="<?= $record['name']; ?>" class="form-control">
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                    <button type="submit" class="btn btn-primary">DELETAR</button>
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
        $where = ['id'=>$_POST['id']];
        $results = $conn->delete('products',$where);
        if ($results) {
            echo json_encode(['success','Produto deletado com sucesso!']);
        } else {
            echo json_encode(['success','Produto não deletado tente novamente!']);
        }
    }
}
