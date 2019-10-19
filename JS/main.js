const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


function validateForm() {
    var phone = document.forms["myForm"]["phone"].value;
    var email = document.forms["myForm"]["email"].value;
    
    var phoneCorrect = false;
    var emailCorrect = false;
    if (!phone == "" && phoneRegex.test(phone)) {
        phoneCorrect =  true;
    }

    if(!email == "" && emailRegex.test(email)){
        emailCorrect =  true;
    }

    if(!phoneCorrect)
    {
      alert("Please enter a valid phone number.");
    }

    if(!emailCorrect){
      alert("Please enter a valid email address.");
    }

      return phoneCorrect && emailCorrect;
    }



