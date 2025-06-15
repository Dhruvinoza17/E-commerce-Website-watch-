    function order_analytics(period=1)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/dashboard.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            let data = JSON.parse(this.responseText);
            document.getElementById('total_orders').textContent = data.total_orders;
            document.getElementById('total_amt').textContent = '₹'+data.total_amt;

            document.getElementById('active_orders').textContent = data.active_orders;
            document.getElementById('active_amt').textContent = '₹'+data.active_amt;

            document.getElementById('cancelled_orders').textContent = data.cancelled_orders;
            document.getElementById('cancelled_amt').textContent = '₹'+data.cancelled_amt;
        }

        xhr.send('order_analytics&period='+period); 
    }

    function user_analytics(period=1)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/dashboard.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            let data = JSON.parse(this.responseText);
            document.getElementById('total_queries').textContent = data.total_queries;
            document.getElementById('total_new_reg').textContent = data.total_new_reg;
        }

        xhr.send('user_analytics&period='+period); 
    }

    window.onload = function() {
        order_analytics();
        user_analytics();
    }