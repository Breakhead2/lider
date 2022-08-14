<div class="product_item" data-productId="<?=$item['id']?>">
    <div class="image_container">
        <img src="/public/images/catalog/<?=$item['id']?>.png" alt="">
    </div>
    <p class="title">
        <?=$item['title']?>
    </p>
    <p class="price"><span><?=$item['price']?></span> &#x20bd</p>
    <?php if(empty($basket)) :?>
        <button class="add_to_basket">Добавить в корзину</button>
    <?php else: ?>
        <?php foreach ($basket as $value) :?>
            <?php if($item['id'] === $value['id_product']) :?>
                <button class="add_to_basket active">В корзине</button>
                <?php break; ?>
            <?php elseif ($item['id'] != $value['id_product'] && array_search($value, $basket) === count($basket)-1) :?>
                <button class="add_to_basket">Добавить в корзину</button>
            <?php endif;?>
        <?php endforeach; ?>
    <?php endif;?>

</div>