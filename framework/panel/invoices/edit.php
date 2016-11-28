<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (sizeof($_POST)==1) {
        $conn = new DB();
        $results = $conn->get_results("select id, number, emission from invoices where id = '".$_POST['id']."'");
        if (!empty($results)) {
            $record = reset($results);
        ?>
            <form action="<?= Utils::link('invoices', 'edit'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                <input type="hidden" name="id_seller" value="<?= $_SESSION[__MODULE__]['USER_DATA']['id']; ?>">
                <div class="form-group">
                    <label for="number">NÚMERO</label>
                    <input type="text" name="number" value="<?= $record['number']; ?>" class="form-control validate-tooltip">
                </div>
                <div class="form-group">
                    <label for="emission">EMISSÃO</label>
                    <input type="text" name="emission" value="<?= $record['emission']; ?>" class="form-control validate-tooltip">
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
            'number'=>$_POST['number'],
            'emission'=>$_POST['emission'],
        ];
        $where = [
            'id'=>$_POST['id'],
            'id_seller'=>$_POST['id_seller'],
        ];
        $results = $conn->update('invoices',$values,$where,1);
        if ($results) {
            echo json_encode(['success','Nota fiscal editado com sucesso!']);
        } else {
            echo json_encode(['danger','Nota fiscal não editado tente novamente!']);
        }
    }
}
