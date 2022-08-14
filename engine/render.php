<?php

function render($page, $params = []){
    return renderTemplate('layout/main', [
        'title' => $params['title'],
        'style' => $params['style'],
        'js' => $params['js'],
        'content' => renderTemplate($page, $params),
        'header' => renderTemplate('layout/header',[
            'items' => getQuantityBasketItems(session_id())
        ]),
        'footer' => renderTemplate('layout/footer')
    ]);
}


function renderTemplate($page, $params = []){
    ob_start();

    extract($params);

    include TEMPLATES_DIR . $page . ".php";

    return ob_get_clean();
}