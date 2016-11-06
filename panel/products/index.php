<!DOCTYPE html>
<html>
    <head>
        <?php include __HEAD__; ?>
        <?php include __HEAD_DATATABLES__; ?>
    </head>
    <body>
        <?php include __HEADER__; ?>
        <div class="container-fluid">
            <h2>PRODUTOS</h2>
            <a class="btn btn-primary pull-right" href="<?= Utils::link('products','add'); ?>">
                <span class="glyphicon glyphicon-plus"></span>
            </a>
            <br>
            <table class="table table-hover table-to-datatables">
                <thead>
                    <tr>
                        <th>NOME</th>
                        <th>PREÇO</th>
                        <th>CRIADO</th>
                        <th>MODIFICADO</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <?php
                $conn = new DB();
                $results = $conn->get_results("select id, name, price, created, modified from products");
                if (!empty($results)) {
                ?>
                    <tbody>
                    <?php foreach($results as $record) : ?>
                        <tr>
                            <td><?= $record['name']; ?></td>
                            <td><?= $record['price']; ?></td>
                            <td><?= $record['created']; ?></td>
                            <td><?= $record['modified']; ?></td>
                            <td class="list-inline">
                                <form class="form-edit" action="<?= Utils::link('products','edit'); ?>" method="get">
                                    <input type="hidden" name="id" value="<?= $record['id']; ?>">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </form>
                                <form class="form-delete" action="<?= Utils::link('products','delete'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $record['id']; ?>">
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                <?php } ?>
                <tfoot>
                    <tr>
                        <th>NOME</th>
                        <th>PREÇO</th>
                        <th>CRIADO</th>
                        <th>MODIFICADO</th>
                        <th>AÇÕES</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <strong>Você está prestes a deletar esse item. Clique em Deletar para continuar.</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary btn-delete">Deletar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include __FOOT__; ?>
        <?php include __FOOT_DATATABLES__; ?>
    </body>
</html>
