//Function for button on registration form(getting values and redirecting to login form)
function registerFunc() {

   var compName = document.forms["myForm"]["compName"].value;
    var compEmail = document.forms["myForm"]["compEmail"].value;
    var uName = document.forms["myForm"]["uName"].value;
    var password = document.forms["myForm"]["pWord"].value;
    var confirmPassword = document.forms["myForm"]["pWord2"].value;

   /* if ( confirmUserName != userName ) {
        alert("Usernames do not match, please retry.");
    }*/
     if (confirmPassword != password) {
        alert("Password do not match, please retry.")
    }
    else if (compName == '' ||  compEmail=='' || uName ==''|| password==''|| confirmPassword=='') {
        alert("Please fill in empty fields");
    }

    else {
        console.log(compName,compEmail,uName,password,confirmPassword);
        window.location.href="homepage.php";
    }
}
 
//function to redirect the jobseeker to the home page
/*function jobseeker_registerFunc(){
    var username= document.forms["myForm"]["userName"].value;
    var uEmail= document.forms["myForm"]["uEmail"].value;
    var pw = document.forms["myForm"]["pw"].value;
    var pw2 = document.forms["myForm"]["pw2"].value;
    if (pw2 != pw) {
        alert("Password do not match, please retry.")
    }
    else if (username == '' ||  uEmail=='' || pw ==''|| pw2=='') {
        alert("Please fill in empty fields");
    }

    else {
        console.log(username,uEmail,pw,pw2);
        window.location.href="jobseeker_homepage.html";
    }
    
}
*/
//Function for button on registration form(getting values and redirecting to login form)
function login(){
    var user= document.forms["myForm"]["email"].value;
    var pw= document.forms["myForm"]["password"].value;
    if(user=="" && pw==""){
        alert("Please enter a Username and Password");
    }
    else{
       
        window.open("user_homepage.php");
    }
}

//Function to redirect to login page
function toLoginPage() {
    window.location.href = "login.php";
}

//Function to redirect to Registration page
function toRegistrationPage() {
    window.location.href = "registrationpage.php";
}

//Function to logout
function logout(){
    window.open("landing.html");
}
//Function to show the menu list responsive
var menuList= document.getElementById('menuList');
menuList.style.maxHeight= "0px";
function myMenu(){
   if( menuList.style.maxHeight== "0px"){
      menuList.style.maxHeight= "200px";
   }
   else{
      menuList.style.maxHeight= "0px";
   }
}
// function to apply job
function apply(){
    window.location.href="application.php";
}
