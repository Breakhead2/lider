<section class="offer">
    <div class="offer__container">
        <h2>Пожалуйста, представьтесь</h2>
        <form id="offer" novalidate>
            <label for="name">
                <input type="text" name="name" id="name" placeholder="Ваше имя" required>
                <span class="error"></span>
            </label>
            <label for="phone">
                <span class="customPlaceholder">Телефон</span>
                <input type="text" name="phone" id="phone" required >
                <span class="error"></span>
            </label>
            <label for="email">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <span class="error"></span>
            </label>
            <button class="submit" type="submit" id="submit">оформить заказ</button>
        </form>
    </div>
</section>