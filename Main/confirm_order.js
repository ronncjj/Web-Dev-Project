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

var list_of_coupon_codes = ['dbsnew21', 'ntunew21', 'f32ee'];

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
    - parseFloat(coupon_code_cell.innerText.split('$')[1]);
    console.log(grand_total);
    console.log(document.getElementById('discount').value);

    grand_total_cell.innerText = '$' + grand_total.toFixed(2);
})