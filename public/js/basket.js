import showError from "./modules/showError.js";

const productsBox = document.querySelector('.basket_box');
const sum_span = document.querySelector('#sum');
const btn_delete_arr = productsBox.querySelectorAll('.btn_delete');
const btn_change_arr = productsBox.querySelectorAll('.change_quantity');

btn_delete_arr.forEach(button =>{
    button.addEventListener('click', () => {
        let basketId = button.closest('.basket_item').getAttribute('data-basketId');
        (async () =>{
            const response = await fetch('api/delete',{
                method: 'POST',
                headers: new Headers({"Content-type" : "application/json"}),
                body: JSON.stringify({
                    basketId
                })
            })
            const answer = await response.json();
            if(answer.quantity){
                button.closest('.basket_item').remove();
                document.querySelector('#quantity').innerText = answer.quantity;
                sum_span.innerText = answer.sum;
            }else{
             location.pathname = "/";
            }
        })()
    })
})

btn_change_arr.forEach(button => {
    button.addEventListener('click', () => {
        let basketId = button.closest('.basket_item').getAttribute('data-basketId');
        let div = button.closest('.quantity');
        let quantity = div.querySelector('#item_quantity').value;
        if(button.id === 'increase' && quantity < 10){
            quantity++;
            div.querySelector('#item_quantity').value++;
        }else if(button.id === 'decrease' && quantity > 1){
            quantity--;
            div.querySelector('#item_quantity').value--;
        }else{
            return false;
        }
        (async () => {
            const response = await fetch('api/change',{
                method: 'POST',
                headers: new Headers({"Content-type" : "application/json"}),
                body: JSON.stringify({
                    basketId,
                    quantity
                })
            });
            const answer = await response.json();
            document.querySelector('#quantity').innerText = answer.quantity;
            sum_span.innerText = answer.sum;
        })()
    })
})

// Validation

const name = document.querySelector('#name');
const phone = document.querySelector('#phone');
const email = document.querySelector('#email');
const mask = document.querySelector('.customPlaceholder');
const offerForm = document.querySelector('#offer');
const btn_submit = document.querySelector('#submit');
const inputs = offerForm.querySelectorAll('input');
const popup = document.querySelector('.popup');
const popupTitle = document.querySelector('.popup__title');
const popupText = document.querySelector('.popup__text');
const body = document.querySelector('body');
const closePopup = document.querySelector('.close_popup');

phone.onfocus = ()=>{
    if(!phone.value.length){
        mask.innerText = "+7(999) 999-99-99";
    }
}
phone.onblur = ()=>{
    if(!phone.value.length) mask.innerText = "Телефон";
}

phone.addEventListener('keypress', (event) => {
    if(isNaN(event.key) || phone.value.length === 16){
        event.preventDefault();
    }
})

phone.addEventListener('input', () =>{
    if(!phone.value.length){
        mask.innerText = "+7(999) 999-99-99";
    }else{
        mask.innerText = "";
        let arr = phone.value.split("");
        let lastNumb = arr[arr.length - 1];
        if(phone.value.length === 2 && phone.value[phone.value.length - 1] !== '('){
           arr[arr.length - 1] = "(";
           arr[arr.length] = lastNumb;
           phone.value = arr.join("");
        }else if(phone.value.length === 6 && phone.value[phone.value.length - 1] !== ')'){
            arr[arr.length - 1] = ") ";
            arr[arr.length] = lastNumb;
            phone.value = arr.join("");
        }else if(phone.value.length === 11 && phone.value[phone.value.length - 1] !== '-'
            || phone.value.length === 14 && phone.value[phone.value.length - 1] !== '-'){
            arr[arr.length - 1] = "-";
            arr[arr.length] = lastNumb;
            phone.value = arr.join("");
        }
    }
})

offerForm.addEventListener('submit', (event)=>{
    event.preventDefault();
    if (btn_submit.classList.contains('active')){
        (async () => {
            const response = await fetch('api/offer',{
                method: 'POST',
                headers: new Headers({"Content-type":"application/json"}),
                body: JSON.stringify({
                    name: name.value,
                    phone: phone.value,
                    email: email.value
                })
            })
            const answer = await response.json();
            if(answer.order){
                popup.classList.add('open');
                body.classList.add('lock')
                popupTitle.innerHTML = `Спасибо <span>${name.value}</span>, ваш заказ <span>№${answer.order}</span> оформлен`
                popupText.innerHTML = `В ближайшее время мы свяжемся с вами по телефону <span>+${phone.value}</span> для его подтверждения.`
            }
        })()
    }
})

closePopup.addEventListener('click', () =>{
    body.classList.remove('lock');
})

for(let input of inputs){
    input.addEventListener('input', () => {
        showError(input);
        if(checking()){
            btn_submit.classList.add('active');
        }else{
            btn_submit.classList.remove('active');
        }
    })
}

function checking(){
    let status = true;
    for(let input of inputs){
        if(!input.classList.contains('valid')){
            status = false;
        }
    }
    return status;
}