function checkEmail() {
    let email = document.getElementById('email-register');
    let filter = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    let errorField = document.getElementById('emailHelpBlock');
    if (!filter.test(email.value)) {
        errorField.textContent = "Entered email is not valid!";
        errorField.style.color = "red";
        console.log("Email check failed");
        return false;
    }
    document.getElementById('emailHelpBlock').textContent = "";
    console.log("Email check passed");
    return true;
}

function checkPassword() {
    let password = document.getElementById('password-register');
    let filter = /^(?=[^\nA-Z]*[A-Z])(?=[^\na-z]*[a-z])(?=[^\d\n]*\d)\S{6,30}$/;
    let errorField = document.getElementById('passwordHelpBlock');
    if (!filter.test(password.value)) {
        errorField.textContent = "Entered password is not valid! Your password must be 6-30 characters long " +
            "and must contain at least one uppercase letter, at least one lowercase letter and at lest one number, " +
            "and must not contain spaces.";
        errorField.style.color = "red";
        console.log("Password check failed");
        return false;
    }
    errorField.textContent = "Your password must be 6-30 characters long " +
        "and must contain at least one uppercase letter, at least one lowercase letter and at lest one number, " +
        "and must not contain spaces.";
    errorField.style.color = "#6c757d";
    console.log("Password check passed");
    return true;
}

function checkRegisterForm() {
    let emailCheck = checkEmail();
    let passCheck = checkPassword();
    let button = document.getElementById('submit-register');
    if (!passCheck || !emailCheck) {
        console.log("Total check failed");
        button.disabled = true;
        return false;
    } else {
        button.disabled = false;
    }
}

window.onload = () => {
    let emailBlock = document.getElementById("email-register");
    let passwordBlock = document.getElementById("password-register");
    if(typeof(emailBlock) != 'undefined' && emailBlock != null) {
        emailBlock.oninput = checkRegisterForm;
    }
    if(typeof(passwordBlock) != 'undefined' && passwordBlock != null) {
        passwordBlock.oninput = checkRegisterForm;
    }
}