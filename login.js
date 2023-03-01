
const usernameField = document.querySelector(".username");
const passField = document.querySelector(".passwd");
const btnSubmit = document.querySelector(".input_box button");
btnSubmit.addEventListener("click", (e)=> {
    e.preventDefault();
    checkEmpty(emailField)
    checkEmpty(usernameField)
    checkEmpty(passField)
    checkUsername(usernameField)
    checkPass(passField)
})
function checkUsername(usernameElement) {
    var usernameText = usernameElement.value;
    var regex =  /^[a-zA-Z0-9]+$/;
    var regexp = /^\S/;
    var checkUsername = regexp.test(usernameText);
    var checkUname = regex.test(usernameText);
        if(!checkUsername || !checkUname) {
            alert("Tài khoản không bắt đầu bằng số hoặc có khoảng trắng!")
        } 
    return 0;
}

function checkEmpty(String){
    var regexEmpty = /^(?!\s*$).+/;
        if(!checkEmpty){
            alert("Không để trống thông tin")
        }
    return 0;
}
function checkPass(passField){
    var passText = passField.value;
    var regexpass = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$";
    var checkPass = regexpass.toString(passText);
        if(checkPass){
            alert("Mật khẩu nhiều hơn 8 kí tự và nhỏ hơn 16 kí tự, bao gồm:chữ hoa, chữ thường, số, kí tự đặc biệt");
        }
    return 0;
}


