<section class="index__container">
    <h1>Каталог товаров</h1>
    <div class="products_box">
        <?php foreach ($catalog as $item) : ?>
            <?php include "./templates/components/productItem.php" ?>
        <?php endforeach;?>
    </div>
</section>