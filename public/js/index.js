const productsBox = document.querySelector('.products_box');
const buttons = productsBox.querySelectorAll('.add_to_basket');
const basket = document.querySelector('.basket');
const link = document.querySelector('.basket_hover');

buttons.forEach(button =>{
    button.addEventListener('click', ()=>{
        if(!button.classList.contains('active')){
            button.classList.add('active');
            button.innerText = 'в корзине';
            (async () => {
                let productId = button.closest('.product_item').getAttribute('data-productId');
                const response  = await fetch('/api/add', {
                    method: 'POST',
                    headers: new Headers({"Content-type" : "application/json"}),
                    body: JSON.stringify({
                        productId
                    })
                });
                const answer = await response.json();
                if(answer.quantity){
                    if(document.querySelector('#quantity')){
                        document.querySelector('#quantity').innerText = answer.quantity;
                    }else{
                        let span = document.createElement('span');
                        span.setAttribute('id', 'quantity');
                        span.innerText = answer.quantity;
                        basket.insertAdjacentElement('beforeend', span);
                    }
                    if(!link.href){
                        link.href = '/basket';
                    }
                }
            })()
        }
    })
})