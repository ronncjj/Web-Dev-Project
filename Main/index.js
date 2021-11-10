document.getElementById("name").addEventListener("change", nameValidation);

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