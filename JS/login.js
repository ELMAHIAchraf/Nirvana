function loginAppear(){
    document.getElementById('loginPanel').style.display='block';
    document.getElementById('signupPanel').style.display='none';
    //color switch of the form switching buttons
    document.getElementById('signup-butt').style.color='#A8A1FF';
    document.getElementById('signup-butt').style.borderBottomColor='#A8A1FF';
    document.getElementById('login-butt').style.color='#5C4EFF';
    document.getElementById('login-butt').style.borderBottomColor='#5C4EFF';
}
function signupAppear(){
    document.getElementById('signupPanel').style.display='block';
    document.getElementById('loginPanel').style.display='none';
    //color switch of the form switching buttons
    document.getElementById('login-butt').style.color='#A8A1FF';
    document.getElementById('login-butt').style.borderBottomColor='#A8A1FF';
    document.getElementById('signup-butt').style.color='#5C4EFF';
    document.getElementById('signup-butt').style.borderBottomColor='#5C4EFF';
}
let counter=0;
function showPassword(){
    counter++;
        if(counter%2 != 0){
            document.getElementById('pwd').setAttribute("type", "text");
            document.getElementById('eyeIcon').setAttribute("class", "fa-solid fa-eye");
        }else{
            document.getElementById('pwd').setAttribute("type", "password");
            document.getElementById('eyeIcon').setAttribute("class", "fa-solid fa-eye-slash");
        }
}

function signupCheck(){
document.getElementById('Spwd').value;

    let fname = document.getElementById('fname').value;
    let lname = document.getElementById('lname').value;

    let email = document.getElementById('Semail').value;
    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let isEmailMatch = email.match(emailPattern);

    let password = document.getElementById('Spwd').value;
    let passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    let isPasswordMatch = password.match(passwordPattern);

    let Cpassword = document.getElementById('SCpwd').value;


    if(fname!="" && lname!="" && isEmailMatch && isPasswordMatch && password==Cpassword){
        document.getElementById('sign').removeAttribute('disabled');
        document.getElementById('sign').style.backgroundColor="#5C4EFF";
    }else{
        document.getElementById('sign').setAttribute('disabled', 'disabled');
        document.getElementById('sign').style.backgroundColor="#756cfd";
    }
}
