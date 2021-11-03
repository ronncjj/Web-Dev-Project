// All minus and plus buttons,
// Attaching event listener

var minus_1 = document.getElementById("minus_1");
var amount_1 = document.getElementById("amount_1");
var plus_1 = document.getElementById("plus_1");
minus_1.addEventListener("click", QtyChange, false);
plus_1.addEventListener("click", QtyChange, false);

var minus_2 = document.getElementById("minus_2");
var amount_2 = document.getElementById("amount_2");
var plus_2 = document.getElementById("plus_2");
minus_2.addEventListener("click", QtyChange, false);
plus_2.addEventListener("click", QtyChange, false);

var minus_3 = document.getElementById("minus_3");
var amount_3 = document.getElementById("amount_3");
var plus_3 = document.getElementById("plus_3");
minus_3.addEventListener("click", QtyChange, false);
plus_3.addEventListener("click", QtyChange, false);

var minus_4 = document.getElementById("minus_4");
var amount_4 = document.getElementById("amount_4");
var plus_4 = document.getElementById("plus_4");
minus_4.addEventListener("click", QtyChange, false);
plus_4.addEventListener("click", QtyChange, false);

var minus_5 = document.getElementById("minus_5");
var amount_5 = document.getElementById("amount_5");
var plus_5 = document.getElementById("plus_5");
minus_5.addEventListener("click", QtyChange, false);
plus_5.addEventListener("click", QtyChange, false);

var minus_6 = document.getElementById("minus_6");
var amount_6 = document.getElementById("amount_6");
var plus_6 = document.getElementById("plus_6");
minus_6.addEventListener("click", QtyChange, false);
plus_6.addEventListener("click", QtyChange, false);

// Menu item names
var choice_1 = document.getElementById("choice_1").innerText;
var choice_2 = document.getElementById("choice_2").innerText;
var choice_3 = document.getElementById("choice_3").innerText;
var choice_4 = document.getElementById("choice_4").innerText;
var choice_5 = document.getElementById("choice_5").innerText;
var choice_6 = document.getElementById("choice_6").innerText;

// Menu item names
var price_1 = parseFloat(document.getElementById("price_1").innerText.split('$')[1]);
var price_2 = parseFloat(document.getElementById("price_2").innerText.split('$')[1]);
var price_3 = parseFloat(document.getElementById("price_3").innerText.split('$')[1]);
var price_4 = parseFloat(document.getElementById("price_4").innerText.split('$')[1]);
var price_5 = parseFloat(document.getElementById("price_5").innerText.split('$')[1]);
var price_6 = parseFloat(document.getElementById("price_6").innerText.split('$')[1]);

// var item1MenuPrc = document.getElementById("price_1");
// console.log(parseFloat(item1MenuPrc.innerHTML.split('$')[1]));

// Tabulation DOMs
var tabulated_sub_total = document.getElementById("tabulated_sub_total");
var tabulated_total = document.getElementById("tabulated_total");
// Delivery Price
var delivery_fee = parseFloat(document.getElementById("tabulated_delivery").innerText.split('$')[1]);

// Hidden forms
var hidden_item_1 = document.getElementById("hidden_item_1");
var hidden_item_2 = document.getElementById("hidden_item_2");
var hidden_item_3 = document.getElementById("hidden_item_3");
var hidden_item_4 = document.getElementById("hidden_item_4");
var hidden_item_5 = document.getElementById("hidden_item_5");
var hidden_item_6 = document.getElementById("hidden_item_6");


for (var key=1; key<7; key++){
    handleList(key);
    updateHiddenform(key);
    initial_updateFees(key);
}

// Functions to execute
// when minus or plus
// are pressed
function QtyChange(event) {
    var motive = event.currentTarget.id.split('_')[0];
    var key = event.currentTarget.id.split('_')[1];
    var amount = parseFloat(window['amount_' + key].innerHTML);
    // console.log(amount);

    motive == 'minus' ? window['amount_' + key].innerHTML = amount-1 :
    window['amount_' + key].innerHTML = amount+1;

    handleList(key);
    // Checking if negative amount, exits if it is
    updateFees(key, motive);
    updateHiddenform(key);
}
// right_sidebar changes
function handleList(key){
    // updating Local amount variable
    var amount = parseFloat(window['amount_' + key].innerHTML);

    // Table is parent
    var tabulated_table = document.getElementById('tabulated_table');

    // Create new DOM
    var tableRow = document.createElement('tr');

    // Remove DOM if it exists, to refresh later
    if (!!document.getElementById('table_row_' + key)) {
        tabulated_table.removeChild(document.getElementById('table_row_' + key));
    }

    // Checking if negative amount, exits if it is
    if (amount<0){
        window['amount_' + key].innerHTML = 0;
        return alert(`
        Input ERROR:
        
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

    // When amount is 0, do not add Child
    if(amount == 0) {return;}
    tabulated_table.appendChild(tableRow);
}
// tabulated prices at right_sidebar
function updateFees(key, motive){
    // updating Local amount variable
    var amount = parseFloat(window['amount_' + key].innerHTML);
    var sub_total = parseFloat(tabulated_sub_total.innerText.split('$')[1]);
    var price = window['price_' + key];

    // Updating Sub-Total
    if (motive == 'plus'){
        sub_total = sub_total + price;
        tabulated_sub_total.innerText = 'Sub-Total: $' + sub_total.toFixed(2);
    }
    else if (motive == 'minus' && amount != 0){
        sub_total = sub_total - price;
        tabulated_sub_total.innerText = 'Sub-Total: $' + sub_total.toFixed(2);
    }
    // Updating Total = Sub-total + delivery fee
    var total = parseFloat(tabulated_total.innerText.split('$')[1]);
    total = sub_total + delivery_fee;
    tabulated_total.innerText = 'Total: $' + total.toFixed(2);
}
// hidden form for PHP post
function updateHiddenform(key){
    var amount = parseFloat(window['amount_' + key].innerHTML);
    window['hidden_item_' + key].value = amount;
    console.log('hidden_item_1 : ',hidden_item_1.value);
    console.log('hidden_item_2 : ',hidden_item_2.value);
    console.log('hidden_item_3 : ',hidden_item_3.value);
    console.log('hidden_item_4 : ',hidden_item_4.value);
    console.log('hidden_item_5 : ',hidden_item_5.value);
    console.log('hidden_item_6 : ',hidden_item_6.value);
}

function initial_updateFees(key){
    // updating Local amount variable
    var amount = parseFloat(window['amount_' + key].innerHTML);
    var sub_total = parseFloat(tabulated_sub_total.innerText.split('$')[1]);
    var price = window['price_' + key];

    // Updating Sub-Total
    sub_total = sub_total + price*amount;
    tabulated_sub_total.innerText = 'Sub-Total: $' + sub_total.toFixed(2);

    // Updating Total = Sub-total + delivery fee
    var total = parseFloat(tabulated_total.innerText.split('$')[1]);
    total = sub_total + delivery_fee;
    tabulated_total.innerText = 'Total: $' + total.toFixed(2);
}


var tabulated_table = document.getElementById('tabulated_table')
console.log(!!document.getElementById('tabulated_table'));

// document.getElementById('hiddenHref').addEventListener('click', (e)=>{
//     console.log('testestest');
//     e.preventDefault;
//     document.getElementById('hiddenForm').submit();
// })

if (document.getElementById('alert').value == '1'){
    console.log('ALERT triggered');
    alert("No Menu Items selected, please select at least 1 item.");
}