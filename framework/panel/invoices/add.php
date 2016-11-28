<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$_POST) {
    ?>
        <form action="<?= Utils::link('invoices', 'add'); ?>" method="post">
            <input type="hidden" name="id_seller" value="<?= $_SESSION[__MODULE__]['USER_DATA']['id']; ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="number">NÚMERO</label>
                        <input type="text" name="number" class="form-control validate-tooltip">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emission">EMISSÃO</label>
                        <input type="text" name="emission" class="form-control validate-tooltip">
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="text-center"><strong>ITENS</strong></h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_product">PRODUTO</label>
                        <select name="id_product[]" class="form-control validate-tooltip">
                            <option value=""></option>
                            <?php
                            $db = new DB();
                            $results = $db->get_results("select name, id from products");
                            foreach ($results as $record) :
                            ?>
                                <option value="<?= $record['id']; ?>"><?= $record['name']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quantity">QUANTIDADE</label>
                        <input type="number" name="quantity[]" class="form-control validate-tooltip">
                    </div>
                </div>

            </div>
            <div class="pull-right">
                <button type="button" id="add-item" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="pull-right">
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                <button type="submit" class="btn btn-primary">SALVAR</button>
            </div>
            <div class="clearfix"></div>
        </form>
        <script src="<?= __JS__.'jquery.maskedinput.min.js'; ?>"></script>
        <script>
            $(function(){
                // masked input
                $('input[name="emission"]').mask('99/99/9999')

                $(document).on('click','.remove-item',function(){
                    // $(this).remove()
                })


                $('#add-item').on('click',function(){
var content = ''
content += '<div class="pull-right">'
content += '<button type="button" class="btn btn-danger remove-item">'
content += '<span class="glyphicon glyphicon-remove"></span>'
content += '</button>'
content += '</div>'
content += '<div class="row">'
content += '<div class="col-md-6">'
content += '<div class="form-group">'
content += '<select name="id_product[]" class="form-control validate-tooltip">'
content += '<option value=""></option>'
content += '</select>'
content += '</div>'
content += '</div>'
content += '<div class="col-md-4">'
content += '<div class="form-group">'
content += '<input type="number" name="quantity[]" class="form-control validate-tooltip">'
content += '</div>'
content += '</div>'
// content += '<div class="col-md-2">'
// content += '</div>'
content += '</div>'
                    $(this).parent().before(content)
                })
            })
        </script>
    <?php
    } else {
        $conn = new DB();
        $values = [
            'number'=>$_POST['number'],
            'emission'=>$_POST['emission'],
            'id_seller'=>$_POST['id_seller'],
        ];
        $results = $conn->insert('invoices',$values);
        if ($results) {
            echo json_encode(['success','Nota fiscal adicionado com sucesso!']);
        } else {
            echo json_encode(['danger','Nota fiscal não adicionado tente novamente!']);
        }
    }
}
