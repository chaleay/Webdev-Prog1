const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//card stuff
const visa = new RegExp("^4[0-9]{12}(?:[0-9]{3})?$");
const amex = new RegExp("^3[47][0-9]{13}$");
const mastercard = new RegExp("^5[1-5][0-9]{14}$");
const exp = /^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/;

var itemsInShoppingList = new Array();
var thisObjectsPrice = 0;
var totalPrice = 0;
var completeTotal = 0;

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

function validInput(){
  return (event.charCode >= 48 && event.charCode <= 57)
}

function validInput2(){
  return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 47);
}

function calculateUnitPrice(select){
      //first get the dom for the (#unit price) indicator
       var unitPrice = document.forms["productForm"]["unit0"];
       var selectedOptionIndex = select.selectedIndex;
       switch(selectedOptionIndex){
         case 0:
           thisObjectsPrice = .50;
           break;
        case 1:
           thisObjectsPrice = .60;
           break;
        case 2:
            thisObjectsPrice = .70;
            break;
        case 3:
            thisObjectsPrice = 10;
            break;
       }

       unitPrice.value = "$" + thisObjectsPrice.toFixed(2);


       //if a total value has been computed, then compute the new total value on switching products
       if(document.forms["productForm"]["unitsNumber"].value != "" && document.forms["productForm"]["totalPrice"].value != ""){
         CalculateTotalPrice(document.forms["productForm"]["unitsNumber"]);
       }
          
}

function CalculateTotalPrice(unitInput){
     var totalPriceInput = document.forms["productForm"]["totalPrice"];
     totalPrice = thisObjectsPrice * parseInt(unitInput.value);
     totalPriceInput.value = "$" + totalPrice.toFixed(2);
     
     //store info for later use
     sessionStorage.setItem('totalPrice', totalPrice);
     var prod = document.forms["productForm"]["productList"];
     sessionStorage.setItem('itemBought', prod.options[prod.selectedIndex].value);
     sessionStorage.setItem('unitsBought', unitInput.value);

}

function OnCheckoutPageLoad(){
  //get form elements
  totalPrice =  parseFloat(sessionStorage.getItem('totalPrice'));
  console.log(totalPrice);
  
  var totalShopAmt = document.forms["checkoutForm"]["totalShopAmt"];
  var totalTax = document.forms["checkoutForm"]["totalTax"];
  var totalShipping = document.forms["checkoutForm"]["totalShipping"];
  var completeTotalField = document.forms["checkoutForm"]["completeTotal"];

  //calc
  var tax = (totalPrice*.08);
  var shipping =  (totalPrice*.03);
  completeTotal = totalPrice + tax + shipping;

  //fill in
  totalShopAmt.value =  "$" + totalPrice.toFixed(2);
  totalTax.value = "$" + tax.toFixed(2);
  totalShipping.value =  "$" + shipping.toFixed(2);
  completeTotalField.value = "$" + completeTotal.toFixed(2);

}

function OnConfirmPageLoad(){
  totalPrice =  parseFloat(sessionStorage.getItem('totalPrice'));
  var totalShopAmt = document.getElementById("totalId1");
  var totalTax = document.getElementById("totalId2");
  var totalShipping = document.getElementById("totalId3");
  var completeTotalField = document.getElementById("totalId4");

  //calc
  var tax = (totalPrice*.08);
  var shipping =  (totalPrice*.03);
  completeTotal = totalPrice + tax + shipping;

  //fill in
  totalShopAmt.value =  "$" + totalPrice.toFixed(2);
  totalTax.value = "$" + tax.toFixed(2);
  totalShipping.value =  "$" + shipping.toFixed(2);
  completeTotalField.value = "$" + completeTotal.toFixed(2);
}

function ValidateCard(cardInput){
  var selectionForm = document.forms["checkoutForm"]["cardType"];
  var selectedOptionIndex = selectionForm.selectedIndex;
  var testRegex;

  switch(selectedOptionIndex){
    case 0: //visa
      testRegex = visa;
      break;
   case 1: //mastercard
      testRegex = mastercard;
      break;
   case 2: //amex
       testRegex = amex;
       break;
  }

  //once set regex, test card valid
  if(!testRegex.test(cardInput.value)){
    alert("Invalid card format. Please check your number and try again.")
    cardInput.value = "";
    return false;
  }
}

function ValidateExpiration(cardExp){
    
  if(!exp.test(cardExp.value)){
    alert("Invalid card expiration format. Please check your number and try again.")
    cardExp.value = "";
    return false;
  }

}


function ValidateInformation(){
  var cardNum = document.forms["checkoutForm"]["cardNum"];
  var cardExp = document.forms["checkoutForm"]["cardDate"];
  var terms = document.forms["checkoutForm"]["terms"];
  console.log(terms.checked);

  if(cardNum.value != "" && cardExp.value != "" && terms.checked == true){
    alert("success");
    window.location.href = "Confirm.html";
    return true;
  }
  else{
    alert("Purchase failed. Recheck your form to make sure all information is correct and terms are checked, and try again.");
    return false;
  }
}







