<section class="basket__container">
    <h1>Корзина</h1>
    <div class="basket_box">
        <?php foreach ($basket as $item) : ?>
            <?php include "./templates/components/basketItem.php" ?>
        <?php endforeach;?>
    </div>
    <h2>Сумма <span id="sum"><?=$sum?></span> &#x20bd</h2>
</section>

<?=$offer?>

<?=$popup?>
