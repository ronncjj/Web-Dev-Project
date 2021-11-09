// Handling of Grand Total
var sub_total_cell = document.getElementById("sub_total_cell");
var delivery_cell = document.getElementById("delivery_cell");
var coupon_code_cell = document.getElementById("coupon_code_cell");
var grand_total_cell = document.getElementById("grand_total_cell");

// Grand total = sub total + delivery fees - discount
grand_total = parseFloat(sub_total_cell.innerText.split('$')[1])
+ parseFloat(delivery_cell.innerText.split('$')[1])
- parseFloat(coupon_code_cell.innerText.split('$')[1]);

grand_total_cell.innerText = '$' + grand_total.toFixed(2);


// shipping_address_textarea.addEventListener("change", (e)=>{
//     billing_address_textarea.value = e.currentTarget.value;
// })

// contact_name_input.addEventListener("change", (e)=>{
//     payment_name_input.value = e.currentTarget.value;
// })