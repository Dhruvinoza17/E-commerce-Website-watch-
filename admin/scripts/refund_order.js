function get_orders(search='')
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/refund_order.php", true);
    xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('table-data').innerHTML = this.responseText;
    }

    xhr.send('get_orders&search='+search); 
}

window.onload = function() {
    get_orders();
}