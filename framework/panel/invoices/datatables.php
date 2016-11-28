<?php

$conn = new DB();
$results = $conn->get_results("select number, emission, created, modified, id, id_seller from invoices");
$data = ['data'=>[]];
if (!empty($results)) {
    foreach ($results as $record) :
        $values = [
            $record['number'],
            $record['emission'],
            $record['created'],
            $record['modified'],
            '<button class="btn btn-primary btn-crud" data-title="EDITAR NOTA FISCAL" data-id=' . $record["id"] . ' data-url=' . Utils::link("invoices","edit") . '>
                <span class="glyphicon glyphicon-edit"></span>
            </button>
            <button class="btn btn-danger btn-crud" data-title="DELETAR NOTA FISCAL" data-id=' . $record["id"] . ' data-url=' . Utils::link("invoices","delete") . '>
                <span class="glyphicon glyphicon-remove"></span>
            </button>',
        ];
        $data['data'][] = $values;
    endforeach;
}
echo json_encode($data);
