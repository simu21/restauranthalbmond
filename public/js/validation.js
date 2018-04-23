function emailValidate(email) {
    var email1 = email.value;

    if(email1.length < 8 ) {
        document.getElementByClass('textForm').style.backgroundColor = "red";
    }
}