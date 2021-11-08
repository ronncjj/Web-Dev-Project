//////////////////////
// Box check functions
//////////////////////
// Check box DOM -- address
var address_same = document.getElementById("address_same");
address_same.addEventListener("change", sameAddress);

// Shipping address DOM
var shipping_address_textarea = document.getElementById("shipping_address_textarea");

// Billing address DOMs
var billing_address = document.getElementById("billing_address");
var billing_address_textarea = document.getElementById("billing_address_textarea");

function sameAddress(event){
    var node = event.currentTarget;
    // Handle visibility & value
    if (node.checked) {
        billing_address.style.visibility = "hidden";
        billing_address.style.display = "none";
        billing_address_textarea.value = shipping_address_textarea.value;
    }
    else{
        billing_address.style.visibility = "visible";
        billing_address.style.display = "inline-block";
        billing_address_textarea.value = "";
    }
}

// Check box DOM -- name
var name_same = document.getElementById("name_same");
name_same.addEventListener("change", sameName);

// Contact name DOM
var contact_name_input = document.getElementById("contact_name_input");

// Payment name DOMs
var payment_name = document.getElementById("payment_name");
var payment_name_input = document.getElementById("payment_name_input");

function sameName(event){
    var node = event.currentTarget;
    // Handle visibility & value
    if (node.checked) {
        payment_name.style.visibility = "hidden";
        payment_name.style.display = "none";
        payment_name_input.value = contact_name_input.value;
    }
    else{
        payment_name.style.visibility = "visible";
        payment_name.style.display = "inline-block";
        payment_name.value = "";
    }
}

//////////////////////////////////////////
// Mirror address and name on box checked
/////////////////////////////////////////

shipping_address_textarea.addEventListener("change", (e)=>{
    if(address_same.checked){
        billing_address_textarea.value = e.currentTarget.value;
        console.log('shipping_address_textarea.value: ', shipping_address_textarea.value);
        console.log('billing_address_textarea.value: ', billing_address_textarea.value);
    }
})   

contact_name_input.addEventListener("change", (e)=>{
    if(name_same.checked){
    payment_name_input.value = e.currentTarget.value;
    console.log('contact_name_input.value: ', contact_name_input.value);
    console.log('payment_name_input.value: ', payment_name_input.value);
    }
})

///////////////////////////
// Handling of Grand Total
///////////////////////////
var sub_total_cell = document.getElementById("sub_total_cell");
var delivery_cell = document.getElementById("delivery_cell");
var grand_total_cell = document.getElementById("grand_total_cell");

// Grand total = sub total + delivery fees - discount
grand_total = parseFloat(sub_total_cell.innerText.split('$')[1])
+ parseFloat(delivery_cell.innerText.split('$')[1]);
grand_total_cell.innerText = '$' + grand_total.toFixed(2);


// Coupon code Handling
var list_of_coupon_codes = ['dbsnew21', 'ntunew21', 'f32ee', 'freepizza'];
var coupon_code_cell = document.getElementById("coupon_code_cell");
coupon_code_cell.addEventListener("change", (e)=>{
    var node = e.currentTarget;

    coupon_discount = 0.00;
    var coupon_code_name = node.childNodes[1].value;
    if (list_of_coupon_codes.includes(coupon_code_name)){
        coupon_discount = 5.00;
        node.innerHTML = `- $${coupon_discount}`;
        document.getElementById('coupon_code_title').innerHTML = "Coupon Code '" + coupon_code_name + "'";
        document.getElementById('discount').value = coupon_discount;
    }
    else{
        alert(`The coupon code you've entered is Invalid`);
    }

    // Grand total = sub total + delivery fees - discount
    grand_total = parseFloat(sub_total_cell.innerText.split('$')[1])
    + parseFloat(delivery_cell.innerText.split('$')[1])
    - coupon_discount;
    
    console.log(grand_total);
    console.log(document.getElementById('discount').value);

    grand_total_cell.innerText = '$' + grand_total.toFixed(2);
})

/////////////////
// Hidden forms
/////////////////
var custName_1 = document.getElementById("custName_1");
var custEmail_1 = document.getElementById("custEmail_1");
var custAddress_1 = document.getElementById("custAddress_1");
var grandTotal = document.getElementById("grandTotal");
// Form submission handling
document.getElementById('confirm_order_button').addEventListener('click', ((e)=>{
    custName_1.value = document.getElementById("contact_name_input").value;
    custEmail_1.value = document.getElementById("contact_email_input").value;
    custAddress_1.value = document.getElementById("shipping_address_textarea").value;
    discount.value = document.getElementById("discount").value;
    grandTotal.value = grand_total_cell.innerText.split('$')[1];

    console.log(document.getElementById("custName_1").value);
    console.log(document.getElementById("custEmail_1").value);
    console.log(document.getElementById("custAddress_1").value);
    console.log(document.getElementById("discount").value);

    // Credit Card MTH / YR Expiry validation
    if(cardExpiryValidation()){
        document.getElementById('confirm_order_form').submit();
    }
}))

//////////////////////////////
// Form input error validator
/////////////////////////////

// Customer name:
document.getElementById("contact_name_input")
.addEventListener("change", nameValidation);
// Payment name:
document.getElementById("payment_name_input")
.addEventListener("change", nameValidation);

function nameValidation(event){
        // Get the target node of the event
        let nameNode = event.currentTarget;
        // console.log(nameNode.value);
        
        //// only allow Alphabets and spaces
        if(nameNode.value.search(/^[a-zA-Z\s]*$/) != 0){
            alert(`
            (${nameNode.id}) Input ERROR:
            ${nameNode.value}
            
            Enter only alphabets & spaces
            `);
    
            nameNode.focus();
            nameNode.value = '';
            return false;
    }
}

// Credit Card Number
document.getElementById("cardNumber").addEventListener("change", (()=>{
    var creditCardNumber = document.getElementById("cardNumber").value;
    if(creditCardNumber.search(/^[0-9]{16}$/) != 0){
        alert(`
        (cardNumber) Input ERROR:
        ${creditCardNumber}
        
        Please enter 16 Numbers without spaces.
        `);
        
        document.getElementById("cardNumber").value = '';
        document.getElementById("cardNumber").focus();
        return false;
    }
}));
// Credit Card CV2
document.getElementById("cardCV2").addEventListener("change", (()=>{
    var creditCardCV2 = document.getElementById("cardCV2").value;
    if(creditCardCV2.search(/^[0-9]{3}$/) != 0){
        alert(`
        (cardCV2) Input ERROR:
        ${creditCardCV2}
        
        Please enter 3 Numbers without spaces.
        `);

        document.getElementById("cardCV2").value = '';
        document.getElementById("cardCV2").focus();
        return false;
    }
}));

//// Validates payment when Form submited
// Returns true if successful
function cardExpiryValidation() {
    ///////////////////
    // Credit Card Date
    ///////////////////
    var expiryYear = parseInt(document.getElementById("cardYear").value);
    var expiryMonth = document.getElementById("cardMonth").value;

    // Mapping month to integer
    const month_map = {
        'january' : 1,
        'february' : 2,
        'march' : 3,
        'april' : 4,
        'may' : 5,
        'june' : 6,
        'july' : 7,
        'august' : 8,
        'september' : 9,
        'october' : 10,
        'november' : 11,
        'december' : 12,
    }
    var expiryMonthNumber = month_map[expiryMonth];
    
    var today = new Date();
    var currentYear = parseInt(today.getFullYear());
    var currentMonth = parseInt(today.getMonth()+1);

    if(isNaN(expiryYear)){ 
        document.getElementById("cardYear").focus();
        throwError('4 digit number for the Expiry year.'); 
        return false;
    }

    if(expiryYear < currentYear){
        document.getElementById("cardYear").focus();
        throwError('non expired card');
        return false;
    }
    else if(currentYear == expiryYear){
        if(expiryMonthNumber <= currentMonth){
        throwError('card at least a month from expiry.');
        return false;
        }
    }
    return true;
}

function throwError(message){
    alert(`
    (Card details) Input ERROR:
   
    Please enter a ${message}.
    `
    );
}