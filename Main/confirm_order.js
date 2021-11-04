// Check box DOM
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
        // billing_address_textarea.value = "";
    }
}

// Check box DOM
var name_same = document.getElementById("name_same");
name_same.addEventListener("change", sameName);

// Shipping address DOM
var contact_name_input = document.getElementById("contact_name_input");

// Billing address DOMs
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
        // billing_address_textarea.value = "";
    }
}

// Handling of Grand Total
var sub_total_cell = document.getElementById("sub_total_cell");
var delivery_cell = document.getElementById("delivery_cell");
var grand_total_cell = document.getElementById("grand_total_cell");

// Grand total = sub total + delivery fees - discount
grand_total = parseFloat(sub_total_cell.innerText.split('$')[1])
+ parseFloat(delivery_cell.innerText.split('$')[1]);

grand_total_cell.innerText = '$' + grand_total.toFixed(2);

// shipping_address_textarea.addEventListener("change", (e)=>{
//     billing_address_textarea.value = e.currentTarget.value;
// })

// contact_name_input.addEventListener("change", (e)=>{
//     payment_name_input.value = e.currentTarget.value;
// })

var list_of_coupon_codes = ['dbsnew21', 'ntunew21', 'f32ee', 'freepizza'];

// Coupon code Handling
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

    // Grand total = sub total + delivery fees - discount
    grand_total = parseFloat(sub_total_cell.innerText.split('$')[1])
    + parseFloat(delivery_cell.innerText.split('$')[1])
    - coupon_discount;
    
    console.log(grand_total);
    console.log(document.getElementById('discount').value);

    grand_total_cell.innerText = '$' + grand_total.toFixed(2);
})

// Hidden forms
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

    if(paymentValidated()){
        document.getElementById('confirm_order_form').submit();
    }
}))


// Form input error validator
// Name Customer Info:
document.getElementById("contact_name_input").addEventListener("change", nameValidation);
document.getElementById("payment_name_input").addEventListener("change", nameValidation);

function nameValidation(event){
        // Get the target node of the event
        let nameNode = event.currentTarget;
        console.log(nameNode.value);
        
        //// only allow Alphabets and spaces
        if(nameNode.value.search(/^[a-zA-Z\s]*$/) != 0){
            alert(`
            (${nameNode.id}) Input ERROR:
            ${nameNode.value}
            
            Enter only alphabets & spaces
            `);
    
            nameNode.focus();
            return false;
    }
}
// Validates payment when Form submited
function paymentValidated() {

    ///////////////////
    // Credit Card Number
    ///////////////////
    var creditCardNumber = document.getElementById("cardNumber").value;
    if(creditCardNumber.search(/^[0-9]{16}$/) != 0){
        alert(`
        (cardNumber) Input ERROR:
        ${creditCardNumber.value}
        
        Please enter 16 Numbers without spaces.
        `);
        
        creditCardNumber.focus();
        return false;
    }

    ///////////////////
    // Credit Card CV2
    ///////////////////
    var creditCardCV2 = document.getElementById("cardCV2").value;
    if(creditCardCV2.search(/^[0-9]{3}$/) != 0){
        alert(`
        (cardCV2) Input ERROR:
        ${creditCardCV2.value}
        
        Please enter 3 Numbers without spaces.
        `);

        creditCardCV2.focus();
        return false;
    }

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

    if(expiryYear < currentYear){
        throwError();
    }
    else if(currentYear == expiryYear){
        if(expiryMonthNumber <= currentMonth){
            throwError();
        }
    }

    function throwError(){
        alert(`
        (cardExpiry) Input ERROR:
       
        Please enter a non expired card.
        `
        );
        return false;
    }

    return true;
}

