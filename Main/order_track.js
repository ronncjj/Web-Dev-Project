// Link order number input with hidden input
document.getElementById('order_number_input')
.addEventListener("change", ((e)=>{
    var order_number_input = e.currentTarget;
    document.getElementById('hidden_input').value = order_number_input.value;
    console.log('hidden_input.value:',document.getElementById('hidden_input').value);
}))

// Submit hidden input on click of TRACK button
document.getElementById('order_number_button')
.addEventListener("click", ((e)=>{
    document.getElementById('confirm_order_form').submit();
}))

// Check for Error Feedback from invalid tracking ID
if (document.getElementById('alert').value == 1){
    console.log('ALERT triggered');
    alert('You have entered an Invalid Order Number');
}

// Check customer name
document.getElementById("contact_name_input").addEventListener("change", nameValidation);

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