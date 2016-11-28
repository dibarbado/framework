<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (sizeof($_POST)==1) {
        $conn = new DB();
        $results = $conn->get_results("select id, number, emission from invoices where id = '".$_POST['id']."'");
        if (!empty($results)) {
            $record = reset($results);
        ?>
            <strong>Você está prestes a deletar esse item.</strong>
            <form action="<?= Utils::link('invoices', 'delete'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                <input type="hidden" name="id_seller" value="<?= $_SESSION[__MODULE__]['USER_DATA']['id']; ?>">
                <br>
                <div class="form-group">
                    <input type="text" readonly name="number" value="<?= $record['number']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" readonly name="emission" value="<?= $record['emission']; ?>" class="form-control validate-tooltip">
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
        $where = [
            'id'=>$_POST['id'],
            'id_seller'=>$_POST['id_seller'],
        ];
        $results = $conn->delete('invoices',$where);
        if ($results) {
            echo json_encode(['success','Nota fiscal deletada com sucesso!']);
        } else {
            echo json_encode(['success','Nota fiscal não deletada tente novamente!']);
        }
    }
}
