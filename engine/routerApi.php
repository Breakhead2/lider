<?php

function routerApi($action){
    $answer = [];

    switch($action){
        case 'add':
            $data = json_decode(file_get_contents('php://input'));
            $productId = $data->productId;
            $session_id = session_id();
            addProduct($session_id, $productId);
            $answer['quantity'] = getQuantityBasketItems($session_id)['quantity'];
            break;
        case 'delete':
            $data = json_decode(file_get_contents('php://input'));
            $basketId = $data->basketId;
            $session_id = session_id();
            remove($basketId);
            $answer['quantity'] = getQuantityBasketItems($session_id)['quantity'];
            $answer['sum'] = getSum($session_id)['sum'];
            break;
        case 'change':
            $data = json_decode(file_get_contents('php://input'));
            $basketId = $data->basketId;
            $quantity = $data->quantity;
            $session_id = session_id();
            changeQuantity($basketId,$quantity);
            $answer['quantity_item'] = getItemQuantity($basketId, $session_id)['quantity_item'];
            $answer['quantity'] = getQuantityBasketItems($session_id)['quantity'];
            $answer['sum'] = getSum($session_id)['sum'];
            break;
        case 'offer':
            $data = json_decode(file_get_contents('php://input'));
            $session_id = session_id();
            $name = safety($data->name);
            $phone = safety($data->phone);
            $email = safety($data->email);
            createOffer($session_id, $name, $phone, $email);
            $order = getOrderId($session_id)['id'];
            $answer['order'] = $order;
            sendMail($name, $email, $order, $phone);
            session_regenerate_id();
            break;
    }

    return $answer;
}