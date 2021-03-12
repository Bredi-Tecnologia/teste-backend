<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/Produtos.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Produtos($db);

    $stmt = $items->listAll();
    $itemCount = $stmt->rowCount();


    // echo json_encode($itemCount);

    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["body"] = array();
        $employeeArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "nome" => $nome,
                "categoria_id" => $categoria_id,
                "preço" => $preço
            );

            array_push($employeeArr["body"], $e);
        }
        echo json_encode($employeeArr, JSON_UNESCAPED_UNICODE);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>