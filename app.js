function validation(){

    var user = document.getElementById('userid').value;
    var pass = document.getElementById('password').value;
    var confirmpass = document.getElementById('cpassword').value;
    var mobileNumber = document.getElementById('phone').value;
    var emails = document.getElementById('email').value;





    if(user == ""){
        document.getElementById('useid1').innerHTML =" ** Please fill the username field";
        return false;
    }
    if((user.length <= 2) || (user.length > 20)) {
        document.getElementById('userid1').innerHTML =" ** Username lenght must be between 2 and 20";
        return false;	
    }
    if(!isNaN(user)){
        document.getElementById('userid1').innerHTML =" ** only characters are allowed";
        return false;
    }







    if(pass == ""){
        document.getElementById('password1').innerHTML =" ** Please fill the password field";
        return false;
    }
    if((pass.length <= 5) || (pass.length > 20)) {
        document.getElementById('password1').innerHTML =" ** Passwords lenght must be between  5 and 20";
        return false;	
    }


    if(pass!=confirmpass){
        document.getElementById('cpassword1').innerHTML =" ** Password does not match the confirm password";
        return false;
    }



    if(confirmpass == ""){
        document.getElementById('cpassword1').innerHTML =" ** Please fill the confirmpassword field";
        return false;
    }




    if(mobileNumber == ""){
        document.getElementById('phone1').innerHTML =" ** Please fill the mobile NUmber field";
        return false;
    }
    if(isNaN(mobileNumber)){
        document.getElementById('phone1').innerHTML =" ** user must write digits only not characters";
        return false;
    }
    if(mobileNumber.length!=10){
        document.getElementById('phone1').innerHTML =" ** Mobile Number must be 10 digits only";
        return false;
    }



    if(emails == ""){
        document.getElementById('email1').innerHTML =" ** Please fill the email idx` field";
        return false;
    }
    if(emails.indexOf('@') <= 0 ){
        document.getElementById('email1').innerHTML =" ** @ Invalid Position";
        return false;
    }

    if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
        document.getElementById('email1').innerHTML =" ** . Invalid Position";
        return false;
    }
}