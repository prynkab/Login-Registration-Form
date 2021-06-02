function validate(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("Password").value;
    var error_message = document.getElementById("error_message");
    
    error_message.style.padding = "10px";
    
    var text;
    if(email.indexOf("@") == -1 || email.length < 6){
      text = "Please Enter valid Email";
      error_message.innerHTML = text;
      return false;
    }
    alert("Logged In Successfully!");
    return true;
  }