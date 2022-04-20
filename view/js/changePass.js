function emptyInputFieldPass() {
    const passInput = document.getElementById("pass").value;
    const newPassInput = document.getElementById("newPass").value;

    if (passInput == "" || passInput == null) {
        alert("password field must filled out!");
        return false;
    }
    if (newPassInput == "" || newPassInput == null) {
        alert("new password field must filled out!");
        return false;
    }
    if (newPassInput.length < 4) {
        alert("new password must contain 4 characters minimum!");
        return false;
    }

    else {
        alert("pass changed ^-^");
        return true;
    }
}