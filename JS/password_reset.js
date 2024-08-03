function passwordCheck(){

        let password = document.getElementById('pwd').value;
        let passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        let isPasswordMatch = password.match(passwordPattern);
    
        let Cpassword = document.getElementById('Cpwd').value;
    
    
        if(isPasswordMatch && password==Cpassword){
            document.getElementById('save').removeAttribute('disabled');
            document.getElementById('save').style.backgroundColor="#5C4EFF";
        }else{
            document.getElementById('save').setAttribute('disabled', 'disabled');
            document.getElementById('save').style.backgroundColor="#756cfd";
        }
    }