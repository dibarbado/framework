<!DOCTYPE html>
<html>
    <head>
        <?php include __HEAD__; ?>
        <?php include __LAYOUTS__.'head-datatables.php'; ?>
    </head>
    <body>
        <?php include __HEADER__; ?>
        <div class="container-fluid">
            <h2>NOTAS FISCAIS</h2>
            <button class="btn btn-primary pull-right btn-crud" data-title="ADICIONAR NOTA FISCAL" data-url="<?= Utils::link('invoices','add'); ?>">
                <span class="glyphicon glyphicon-plus"></span>
            </button>
            <br>
            <table class="table table-hover table-to-datatables" data-ajax="<?= Utils::link('invoices','datatables'); ?>">
                <thead>
                    <tr>
                        <th>NÚMERO</th>
                        <th>EMISSÃO</th>
                        <th>CRIADO</th>
                        <th>MODIFICADO</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NÚMERO</th>
                        <th>EMISSÃO</th>
                        <th>CRIADO</th>
                        <th>MODIFICADO</th>
                        <th>AÇÕES</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="modal-crud" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
        <?php include __FOOT__; ?>
        <?php include __LAYOUTS__.'foot-datatables.php'; ?>
    </body>
</html>
