<div class="basket_item" data-basketId="<?=$item['id']?>">
    <div class="image_container">
        <img src="/public/images/catalog/<?=$item['id_product']?>.png" alt="">
    </div>
    <p class="title">
        <?=$item['title']?>
    </p>
    <div class="quantity">
        <button class="change_quantity" id="decrease"><i class="fa-solid fa-minus"></i></button>
        <input type="text" id="item_quantity" disabled value="<?=$item['quantity']?>">
        <button class="change_quantity" id="increase"><i class="fa-solid fa-plus"></i></button>
    </div>
    <p class="price">
        <span><?=$item['price']?></span> &#x20bd
    </p>
    <button class="btn_delete desk"><i class="fa-solid fa-xmark"></i></button>
    <button class="btn_delete mob"><i class="fa-solid fa-xmark"></i> Удалить</button>
</div>