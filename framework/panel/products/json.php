<?php

$conn = new DB();
$results = $conn->get_results("select * from products");
echo json_encode($results);
