<?php

$conn = new DB();
$results = $conn->get_results("select name, price, created, modified, id from products");
$data = ['data'=>[]];
if (!empty($results)) {
    foreach ($results as $record) :
        $values = [
            $record['name'],
            $record['price'],
            $record['created'],
            $record['modified'],
            '<button class="btn btn-primary btn-crud" data-title="EDITAR PRODUTO" data-id=' . $record["id"] . ' data-url=' . Utils::link("products","edit") . '>
                <span class="glyphicon glyphicon-edit"></span>
            </button>
            <button class="btn btn-danger btn-crud" data-title="DELETAR PRODUTO" data-id=' . $record["id"] . ' data-url=' . Utils::link("products","delete") . '>
                <span class="glyphicon glyphicon-remove"></span>
            </button>',
        ];
        $data['data'][] = $values;
    endforeach;
}
echo json_encode($data);
