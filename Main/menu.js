var minus_1 = document.getElementById("minus_1");
var amount_1 = document.getElementById("amount_1");
var plus_1 = document.getElementById("plus_1");
minus_1.addEventListener("click", AmountIncrement, false);
plus_1.addEventListener("click", AmountIncrement, false);

var minus_2 = document.getElementById("minus_2");
var amount_2 = document.getElementById("amount_2");
var plus_2 = document.getElementById("plus_2");
minus_2.addEventListener("click", AmountIncrement, false);
plus_2.addEventListener("click", AmountIncrement, false);

var minus_3 = document.getElementById("minus_3");
var amount_3 = document.getElementById("amount_3");
var plus_3 = document.getElementById("plus_3");
minus_3.addEventListener("click", AmountIncrement, false);
plus_3.addEventListener("click", AmountIncrement, false);

var minus_4 = document.getElementById("minus_4");
var amount_4 = document.getElementById("amount_4");
var plus_4 = document.getElementById("plus_4");
minus_4.addEventListener("click", AmountIncrement, false);
plus_4.addEventListener("click", AmountIncrement, false);

var minus_5 = document.getElementById("minus_5");
var amount_5 = document.getElementById("amount_5");
var plus_5 = document.getElementById("plus_5");
minus_5.addEventListener("click", AmountIncrement, false);
plus_5.addEventListener("click", AmountIncrement, false);

var minus_6 = document.getElementById("minus_6");
var amount_6 = document.getElementById("amount_6");
var plus_6 = document.getElementById("plus_6");
minus_6.addEventListener("click", AmountIncrement, false);
plus_6.addEventListener("click", AmountIncrement, false);

// Menu item names
var choice_1 = document.getElementById("choice_1").innerText;
var choice_2 = document.getElementById("choice_2").innerText;
var choice_3 = document.getElementById("choice_3").innerText;
var choice_4 = document.getElementById("choice_4").innerText;
var choice_5 = document.getElementById("choice_5").innerText;
var choice_6 = document.getElementById("choice_6").innerText;

// Menu item names
var price_1 = parseInt(document.getElementById("price_1").innerText.split('$')[1]);
var price_2 = parseInt(document.getElementById("price_2").innerText.split('$')[1]);
var price_3 = parseInt(document.getElementById("price_3").innerText.split('$')[1]);
var price_4 = parseInt(document.getElementById("price_4").innerText.split('$')[1]);
var price_5 = parseInt(document.getElementById("price_5").innerText.split('$')[1]);
var price_6 = parseInt(document.getElementById("price_6").innerText.split('$')[1]);

function AmountIncrement(event) {
    var node = event.currentTarget;
    var motive = event.currentTarget.id.split('_')[0];
    var key = event.currentTarget.id.split('_')[1];
    var amount = parseInt(window['amount_' + key].innerHTML);
    // console.log(amount);

    motive == 'minus' ? window['amount_' + key].innerHTML = amount-1 :
    window['amount_' + key].innerHTML = amount+1;

    // updating Local amount variable
    amount = window['amount_' + key].innerHTML;

    // Table is parent
    var tabulated_table = document.getElementById('tabulated_table');

    // Create new DOM
    var tableRow = document.createElement('tr');

    // Remove DOM if it exists, to refresh later
    if (!!document.getElementById('table_row_' + key)){
        tabulated_table.removeChild(document.getElementById('table_row_' + key));
    }

    // Checking if negative amount, exits if it is
    if (amount<0){
        window['amount_' + key].innerHTML = 0;
        return alert(`
        (${node.id}) Input ERROR:
        
        Enter only numbers 0 or greater.
        `);
    }
    
    // Creating Child of tableRow new DOM
    var itemName = document.createElement('td');
    var timesDOM = document.createElement('td');
    var amountDOM = document.createElement('td');
    var equalsDOM = document.createElement('td');
    var priceDOM = document.createElement('td');

    // Registering ID and Populating values
    tableRow.id = 'table_row_' + key;
    itemName.innerHTML = window['choice_' + key];
    timesDOM.innerHTML = 'x';
    amountDOM.innerHTML = amount;
    equalsDOM.innerHTML = '=';
    priceDOM.innerHTML = '$'+ window['price_' + key]*amount;

    tableRow.appendChild(itemName);
    tableRow.appendChild(timesDOM);
    tableRow.appendChild(amountDOM);
    tableRow.appendChild(equalsDOM);
    tableRow.appendChild(priceDOM);

    tabulated_table.appendChild(tableRow);
}

function addToList(key){

}

function delFromList(key){

}


var tabulated_table = document.getElementById('tabulated_table')

console.log(!!document.getElementById('tabulated_table'));