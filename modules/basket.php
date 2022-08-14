<?php

function getQuantityBasketItems($session_id){
    return getOneResult("SELECT SUM(quantity) as quantity FROM basket WHERE session_id = '{$session_id}'");
}

function getBasket($session_id){
    return getAssocResult("SELECT basket.id, basket.id_product, basket.quantity, list.title, list.price FROM basket, list WHERE list.id = basket.id_product AND basket.session_id = '{$session_id}'");
}

function addProduct($session_id, $product_id){
    return executeSql("INSERT INTO basket (session_id, id_product) VALUES ('{$session_id}', {$product_id})");
}

function getSum($session_id){
    return getOneResult("SELECT SUM(list.price * quantity) as sum FROM basket, list WHERE list.id = basket.id_product AND basket.session_id = '{$session_id}'");
}

function remove($basketId){
    return executeSql("DELETE FROM basket WHERE id = {$basketId}");
}

function changeQuantity($basket_id, $quantity){
    return executeSql("UPDATE basket SET quantity = {$quantity} WHERE id = {$basket_id}");
}

function getItemQuantity($basketId, $session_id){
    return getOneResult("SELECT quantity as quantity_item FROM basket WHERE id = {$basketId} and session_id = '{$session_id}'");
}