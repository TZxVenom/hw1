function checkName(event) {
    const input = event.currentTarget;
    if (formStatus[input.name] = input.value.length > 0) {
        input.parentNode.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.parentNode.classList.add('errorj');
    }
    
    checkForm();
}

function jsonCheckUsername(json) {
    if(formStatus.username = !json.exists){
        document.querySelector('.username').classList.remove('errorj');
    } else {
        document.querySelector('.username .sotto').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errorj');
    }
    checkForm();
}

function jsonCheckEmail(json) {
    if(formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
    } else {
        document.querySelector('.email .sotto').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }
    checkForm();
    
}

function fetchResponse(response) {
    return response.json();
}

function checkUsername(event) {
    const input = document.querySelector('.username input');
    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.parentNode.querySelector('.sotto').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.parentNode.parentNode.classList.add('errorj');
        formStatus.username = false;
        checkForm();
    } else {
        fetch("check_username.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}
function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email .sotto').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;
        checkForm();
    } else {
        fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errorj');
    } else {
        document.querySelector('.password').classList.add('errorj');
    }
    checkForm();
}

function checkPassword_confirm(event) {
    const passwordConfirmInput = document.querySelector('.password_confirm input');
    if (formStatus.passwordConfirm = passwordConfirmInput.value === document.querySelector('.password input').value) {
        document.querySelector('.password_confirm').classList.remove('errorj');
    } else {
        document.querySelector('.password_confirm').classList.add('errorj');
    }
    checkForm();
}

function checkForm() {
    Object.keys(formStatus).length !== 6 || 
    Object.values(formStatus).includes(false);
}


const formStatus = {'upload' : true };
document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkName);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.password_confirm input').addEventListener('blur', checkPassword_confirm);
