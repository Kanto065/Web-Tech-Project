function emptyInputFieldforupdateinfo() {
    const fnameInput = document.getElementById("fname").value;
    const lnameInput = document.getElementById("lname").value;
    const addressInput = document.getElementById("present-address").value;
    const phoneInput = document.getElementById("phone").value;
    if (fnameInput == "" || fnameInput == null) {
        alert("first name field must filled out!");
        return false;
    }
    if (lnameInput == "" || lnameInput == null) {
        alert("last name field must filled out!");
        return false;
    }
    if (addressInput == "" || addressInput == null) {
        alert("address field must filled out!");
        return false;
    }
    if (phoneInput == "" || phoneInput == null) {
        alert("phone field must filled out!");
        return false;
    }
    else {
        alert("update successful ^-^");
        return true;
    }
}
