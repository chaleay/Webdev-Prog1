
//regex checks
const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//card stuff
const visa = new RegExp("^4[0-9]{12}(?:[0-9]{3})?$");
const amex = new RegExp("^3[47][0-9]{13}$");
const mastercard = new RegExp("^5[1-5][0-9]{14}$");
const exp = /^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/;
////////////

//cart variable
var cart = new Array();
var currentlySelectedItem = null;

//totalPrice
var totalPrice = 0;
var completeTotal = 0;

function ValidateEmail(emailInput) {
  if(!emailRegex.test(emailInput.value)){
    alert("Invalid email format, please enter again.")
    emailInput.value = "";
    return false;
  }

  return true;
}

function ValidatePhone(phoneInput) {
  if(!phoneRegex.test(phoneInput.value)){
    alert("Invalid phone format, please enter again.")
    phoneInput.value = "";
    return false;
  }

  return true;
}

function validInput(){
  return (event.charCode >= 48 && event.charCode <= 57)
}

function validInput2(){
  return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 47);
}


//SHOPPING CAR FUNCTIONS
function calculateUnitPrice(select){
      //reset total price/units number if new item selected
      ShoppingReset();   


       var selectedOptionIndex = select.selectedIndex;
       switch(selectedOptionIndex){
         case 0:
           var item = {
             name: "Banana",
             price : .50,
           };
           break;
        case 1:
           var item = {
            name: "Peaches",
            price : .60,
          };
           break;
        case 2:
           var item = {
            name: "Apple",
            price : .70,
          };
            break;
        case 3:
           var item = {
            name: "Love",
            price : 10,
          };
            break;
       }

       currentlySelectedItem = item;
        
      
}

function CalculateTotalUnitPrice(unitInput){
  var totalUnitPriceInput = document.forms["productForm"]["unitPrice0"]
  if((unitInput.value == null ||unitInput.value == '') || currentlySelectedItem == null)
    {
      totalUnitPriceInput.value = "";
      return;
    }
   

     currentlySelectedItem.units = parseInt(unitInput.value);
     totalUnitPrice = currentlySelectedItem.price * currentlySelectedItem.units;
     totalUnitPriceInput.value = "$" + totalUnitPrice.toFixed(2);
     
       

}

function ShoppingReset(){
  //reset total unitPrice
  document.forms["productForm"]["unitPrice0"].value = "";
  //reset unit #
  document.forms["productForm"]["unitsNumber"].value = "";
}

function AddToCart()
{
  if(!ValidateCartAdd())
    return false;
  
  cart.push(currentlySelectedItem);
  alert("Item sucessfully added to Cart: " + currentlySelectedItem.name + "   Unit #: " + currentlySelectedItem.units);
  currentlySelectedItem = null;
  CalculateTotalPrice();
  ShoppingReset();

  //store session vars
  sessionStorage.setItem("cart", JSON.stringify(cart));
  sessionStorage.setItem("totalPrice", totalPrice);
  
}

function CalculateTotalPrice(){
  //need to get vars from session storage
  totalPrice = 0;

  var totalPriceVal = document.forms["productForm"]["totalPrice"];
  cart.forEach(function(element){
      totalPrice += element.price * element.units;
  })
  totalPriceVal.value = "$" + totalPrice.toFixed(2);
}

function ShowCart(){
  
  var cartString = new String();
  cart.forEach(function(item){
    cartString += item.name + ", Unit #: " + item.units + ", Price: " + (item.units * item.price).toFixed(2) + '\n';
  })

  alert("Cart contains " + cart.length + " items: \n" + cartString);
}

function ValidateCartAdd(){
  if(!currentlySelectedItem){
    alert("Please select an item to add to the cart");
    return false;
  }
  else if(currentlySelectedItem.units == 0 || document.forms["productForm"]["unitPrice0"].value ==""){
    alert("Please enter a number of units greater than 0");
    return false;
  }
  else
    return true;
  }

  function OnShoppingCartPageLoad(){
    
    //RELOAD CART SAVED IN SESSION STORAGE WHEN RELOADING PAGE
    
    cart = JSON.parse(sessionStorage.getItem('cart'));
    //cart still null after loading from sess storage
    if(!cart){
      cart = new Array();
      return;
    }
    //CALC TOTAL PRICE USING ARRAY WE JUST LOADED
     CalculateTotalPrice();
  }
  //end shopping cart functions
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
    return true;
  }
  else{
    alert("Purchase failed. Recheck your form to make sure all information is correct and terms are checked, and try again.");
    return false;
  }
}

  function StoreShippingInfo(){
    //load fields to store inputs
    var address1Store = document.forms["userInfo"]["address1"];
    var address2Store = document.forms["userInfo"]["address2"];
    var zipStore = document.forms["userInfo"]["zipcode"];
    var stateStore = document.forms["userInfo"]["state"];
    var cityStore = document.forms["userInfo"]["city"];

    sessionStorage.setItem("address1", address1Store.value);
    sessionStorage.setItem("address2", address2Store.value);
    sessionStorage.setItem("zipStore", zipStore.value);
    sessionStorage.setItem("stateStore", stateStore.selectedIndex);
    sessionStorage.setItem("cityStore", cityStore.value);

  }

  function LoadShippingInfo(checkbox){
    var address1 = document.forms["shippingInfo"]["address1"];
    var address2 = document.forms["shippingInfo"]["address2"];
    var zip = document.forms["shippingInfo"]["zipcode"];
    var state = document.forms["shippingInfo"]["state"];
    var city = document.forms["shippingInfo"]["city"];
    
    if(!checkbox.checked)
    {
      console.debug("here");
      address1.readOnly = false;
      address2.readOnly = false;
      zip.readOnly = false;
      state.readOnly = false;
      city.readOnly = false;
      return;
    }
    
    address1.value = sessionStorage.getItem("address1");
    address2.value = sessionStorage.getItem("address2");
    zip.value = sessionStorage.getItem("zipStore");
    state.selectedIndex = parseInt(sessionStorage.getItem("stateStore"));
    city.value = sessionStorage.getItem("cityStore");

    address1.readOnly = true;
    address2.readOnly = true;
    zip.readOnly = true;
    state.readOnly = true;
    city.readOnly = true;
  }








