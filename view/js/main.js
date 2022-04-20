
function emptyInputField() {
    const fnameInput = document.getElementById("fname").value;
    const lnameInput = document.getElementById("lname").value;
    const emailInput = document.getElementById("email").value;
    const passInput = document.getElementById("pass").value;
    const cpassInput = document.getElementById("cpass").value;

    if (fnameInput == "" || fnameInput == null) {
        alert("first name field must filled out!");
        return false;
    }
    if (lnameInput == "" || lnameInput == null) {
        alert("last name field must filled out!");
        return false;
    }
    if (emailInput == "" || emailInput == null) {
        alert("email field must filled out!");
        return false;
    }
    if (emailInput) {
        const mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (emailInput.match(mailformat)) {
        }
        else {
            alert("Invalid email address!");
            return false;
        }
    }
    if (passInput == "" || passInput == null) {
        alert("password field must filled out!");
        return false;
    }
    if (passInput.length < 4) {
        alert("password must contain 4 characters minimum!");
        return false;
    }
    if (cpassInput == "" || cpassInput == null) {
        alert("confirm password field must filled out!");
        return false;
    }
    if (passInput !== cpassInput) {
        alert("password and confirm password doesn't match!");
        return false;
    }

    else {
        alert("registration successful ^-^");
        return true;
    }
}

function emptyInputFieldforlogin() {
    const emailInput = document.getElementById("email").value;
    const passInput = document.getElementById("pass").value;
    if (emailInput == "" || emailInput == null) {
        alert("email field must filled out!");
        return false;
    }
    if (passInput == "" || passInput == null) {
        alert("password field must filled out!");
        return false;
    }
    else {
        alert("Log in successful ^-^");
        return true;
    }
}


//emptyInputField("fname");

// const isEmpty = str => !str.trim().length;

// document.getElementById("fname").addEventListener("input", function () {
//     if (isEmpty(this.value)) {
//         console.log("NAME is invalid (Empty)")
//     } else {
//         console.log(`NAME value is: ${this.value}`);
//     }
// });