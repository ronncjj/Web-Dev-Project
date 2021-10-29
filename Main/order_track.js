// Check for Error Feedback from invalid tracking ID

if (document.getElementById('hidden_input').value == 'errorKey'){
    console.log('asdfasdfasdfasdf');
    alert('You have entered an Invalid Order Number');
}


// Link order number input with hidden input
document.getElementById('order_number_input')
.addEventListener("change", ((e)=>{
    var order_number_input = e.currentTarget;
    document.getElementById('hidden_input').value = order_number_input.value;
    console.log(document.getElementById('hidden_input').value);
}))

// Submit hidden input on click of TRACK button
document.getElementById('order_number_button')
.addEventListener("click", ((e)=>{
    document.getElementById('confirm_order_form').submit();
}))