const emailField = document.querySelector("#email"); 
const usernameField = document.querySelector("#username");
const passField = document.querySelector("#passwd");
const repassField = document.querySelector("#repasswd");
const btnSubmit = document.querySelector(".btn-submit");
btnSubmit.addEventListener("click", (e)=> {
    e.preventDefault();
    checkEmpty(emailField)
    checkEmpty(usernameField)
    checkEmpty(passField)
    checkEmpty(repassField)
    checkUsername(usernameField)
    checkEmail(emailField)
    checkPass(passField)
    thesamepass(passField,repassField)
    
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
function checkEmail(emaiField) {
    var emailText = emaiField.value;
    var regex =  /(\<|^)[\w\d._%+-]+@(?:[\w\d-]+\.)+(\w{2,})(\>|$)/i;
    var checkEmail= regex.test(emailText);
        if(!checkEmail) {
                alert("Địa chỉ mail không hợp lệ")
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
function thesamepass(passField,repassField){
    var passText = passField.value;
    var repassText = repassField.value;
        if(passText != repassText){
            alert("Mật khẩu chưa khớp nhau!")
        }
    return 0;
}
