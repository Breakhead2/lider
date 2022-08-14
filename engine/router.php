<?php

function router($page, $array_url)
{
    $data = [];

    switch ($page) {
        case 'index':
            $data['page'] = 'index';
            $data['params'] = [
                'title' => 'Главная страница',
                'style' => 'index',
                'js' => 'index',
                'catalog' => getCatalog(),
                'basket' => getBasket(session_id())
            ];
            break;

        case 'basket':
            if(!getBasket(session_id())){
                header("Location: /");
                die();
            }
            $data['page'] = 'basket';
            $data['params'] = [
                'title' => 'Корзина',
                'style' => 'basket',
                'js' => 'basket',
                'offer' => renderTemplate('components/offer'),
                'popup' => renderTemplate('components/popup'),
                'basket' => getBasket(session_id()),
                'sum' => getSum(session_id())['sum']
            ];
            break;

        case 'api':
            $action = $array_url[count($array_url) - 1];
            $answer = routerApi($action);
            header('Content-type: application/json');
            echo json_encode($answer);
            die();

        default:
            header("Location: /");
            die();
    }

    return $data;
}
