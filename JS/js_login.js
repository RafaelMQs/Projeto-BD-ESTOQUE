const init = () =>{ 
    const validateEmail = (event)=> {
        const input = event.currentTarget;
        const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const emailTest = regex.test(input.value);

        if(!emailTest){
            submitButton.setAttribute('disabled', 'disabled');
            input.nextElementSibling.classList.add('error');
        }else{
            submitButton.removeAttribute('disabled');
            input.nextElementSibling.classList.remove('error');
        }
        
    }

    const show_hide = document.querySelector('#show-hide');
    show_hide.addEventListener("click", showHide);
    function showHide(){
        if(inputPassword.type == 'password'){
            inputPassword.setAttribute('type', 'text');
            show_hide.classList.add('hide');
        }else{
            inputPassword.setAttribute('type', 'password');
            show_hide.classList.remove('hide');
        }
    }
    


    /*Validar a senha: const validatePassword = (event)=> {
        const input = event.currentTarget;

        if(input.value.length < 8){
            submitButton.setAttribute('disabled', 'disabled');
            input.nextElementSibling.classList.add('error');
        }else{
            submitButton.removeAttribute('disabled', 'disabled');
            input.nextElementSibling.classList.remove('error');
        }
    }*/

    const inputEmail = document.querySelector('input[type="email"]');
    const inputPassword = document.querySelector('input[type="password"]');
    const submitButton = document.querySelector('.login_submit');


    inputEmail.addEventListener('input', validateEmail);
    //Validar a senha: inputPassword.addEventListener('input', validatePassword);
}

window.onload = init;