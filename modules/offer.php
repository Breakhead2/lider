<?php

function createOffer($session_id, $name, $phone, $email)
{
    $phone = str_replace(['+', '-', ' ', '(', ')'], '', $phone);
    return executeSql("INSERT INTO offer (session_id, name, phone, email) VALUES ('{$session_id}', '{$name}', {$phone}, '{$email}')");
}

function getOrderId($session_id){
    return getOneResult("SELECT id FROM offer WHERE session_id = '{$session_id}'");
}