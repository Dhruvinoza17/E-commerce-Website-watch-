    function get_orders(search='',page=1)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/order_records.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            let data = JSON.parse(this.responseText);
            document.getElementById('table-data').innerHTML = data.table_data;
            document.getElementById('table-pagination').innerHTML = data.pagination;

        }

        xhr.send('get_orders=1&search='+search+'&page='+page); 
    }

    function change_page(page)
    {
        get_orders(document.getElementById('search_input').value,page);
    }

    function download(id)
    {
        window.location.href = 'generate_pdf.php?gen_pdf&id='+id;
    }

    window.onload = function() {
        get_orders();
    }