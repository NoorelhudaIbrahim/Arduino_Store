let regname = "^[a-zA-Z ]*$"
let regPass = "^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])([a-zA-Z0-9@$!%*?&]{8,32}$)"
let regmail = "^[a-z A-Z 0-9 _ .]+@([a-z]+)\.([a-z]{2,3})$"

let username = document.getElementById("name")
let pass = document.getElementById("password")
let repass = document.getElementById("conf-password")
let mail =  document.getElementById("email")

checkname = () => {
    if (!username.value.match(regname)){
        document.getElementById("fnerror").innerHTML = "Please Use Letters Only" 
    }
    else{
        document.getElementById("fnerror").innerHTML = ""
    }
}

checkemail = () => {
    if (!mail.value.match(regmail)){
        document.getElementById("mlerror").innerHTML = "Please correct your email"
    }
    else{
        document.getElementById("mlerror").innerHTML = ""
    }
}

checkpass = () => {
    if (!pass.value.match(regPass)){
        document.getElementById("passerr").innerHTML = "Please insert first dig is cap and mor than 8 dig"
    }
    else{
        document.getElementById("passerr").innerHTML = ""
    }
    
}

recheckpass = () => {
    console.log('errror')
    if (!pass.value == repass.value && pass.value == "" ){
        document.getElementById("repasserr").innerHTML = "your pass and repss not match"
    }
    else{
        document.getElementById("repasserr").innerHTML = ""
    }
}

