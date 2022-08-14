function showError(input){
    let error = document.querySelector('#' + input.id + '+ span.error');
    if(!input.value.length){
        input.className = 'invalid';
        error.className = 'error active';
        error.textContent = "Поле обязательно к заполнению";
        return false;
    }
    switch (input.id){
        case 'name':
            const namePattern = /^[a-zа-яё\s]+$/iu;
            if(!namePattern.test(input.value)){
                input.className = 'invalid';
                error.className = 'error active';
                error.innerText = "Поле заполнено неверно";
                return false;
            }
            break;
        case 'phone':
            if(input.value.length < 16) {
                input.className = 'invalid';
                error.className = 'error active';
                error.innerText = "Должно быть 11 цифр";
                return false;
            }
            break;
        case 'email':
            if(input.validity.typeMismatch){
                input.className = 'invalid';
                error.className = 'error active';
                error.innerText = "Поле заполнено неверно";
                return false;
            }
    }

    input.className = 'valid';
    error.className = 'error';
    error.textContent = "";
    return true;
}

export default showError;