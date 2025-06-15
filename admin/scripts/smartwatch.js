    let add_men_form = document.getElementById('add_smartwatch_form');

    add_smartwatch_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_smartwatch_product();
    });

    function add_smartwatch_product() 
    {
        let data = new FormData();
        data.append('add_smartwatch_product','');
        data.append('name', add_smartwatch_form.elements['name'].value);
        data.append('category', add_smartwatch_form.elements['category'].value);
        data.append('price', add_smartwatch_form.elements['price'].value);
        data.append('quantity', add_smartwatch_form.elements['quantity'].value);
        data.append('brand', add_smartwatch_form.elements['brand'].value);
        data.append('modelnumber', add_smartwatch_form.elements['modelnumber'].value);
        data.append('movement', add_smartwatch_form.elements['movement'].value);
        data.append('casematerial', add_smartwatch_form.elements['casematerial'].value);
        data.append('strapmaterial', add_smartwatch_form.elements['strapmaterial'].value);
        data.append('dialsize', add_smartwatch_form.elements['dialsize'].value);
        data.append('waterresistance', add_smartwatch_form.elements['water'].value);
        data.append('warranty', add_smartwatch_form.elements['warranty'].value);
        data.append('desc', add_smartwatch_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/smartwatch.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('add-smartwatch');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Smartwatch product added!');
                add_smartwatch_form.reset();
                get_smartwatch_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function get_smartwatch_product()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/smartwatch.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('smartwatch-data').innerHTML = this.responseText;
        }

        xhr.send('get_smartwatch_product'); 
    }

    let edit_smartwatch_form = document.getElementById('edit_smartwatch_form');

    edit_smartwatch_form.addEventListener('submit',function(e){
        e.preventDefault();
    });

    function edit_smartwatch_details(id)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/smartwatch.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            let data = JSON.parse(this.responseText);
            edit_smartwatch_form.elements['name'].value = data.smartwatchdata.name;
            edit_smartwatch_form.elements['category'].value = data.smartwatchdata.category;
            edit_smartwatch_form.elements['price'].value = data.smartwatchdata.price;
            edit_smartwatch_form.elements['quantity'].value = data.smartwatchdata.quantity;
            edit_smartwatch_form.elements['brand'].value = data.smartwatchdata.brand;
            edit_smartwatch_form.elements['modelnumber'].value = data.smartwatchdata.modelnumber;
            edit_smartwatch_form.elements['movement'].value = data.smartwatchdata.movement;
            edit_smartwatch_form.elements['casematerial'].value = data.smartwatchdata.casematerial;
            edit_smartwatch_form.elements['strapmaterial'].value = data.smartwatchdata.strapmaterial;
            edit_smartwatch_form.elements['dialsize'].value = data.smartwatchdata.dialsize;
            edit_smartwatch_form.elements['water'].value = data.smartwatchdata.waterresistance;
            edit_smartwatch_form.elements['warranty'].value = data.smartwatchdata.warranty;
            edit_smartwatch_form.elements['desc'].value = data.smartwatchdata.description;
            edit_smartwatch_form.elements['smartwatch_id'].value = data.smartwatchdata.id;
        }

        xhr.send('get_product='+id);
    }

    edit_smartwatch_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit();
    });

    function submit_edit() 
    {
        let data = new FormData();
        data.append('submit_edit','');
        data.append('smartwatch_id',edit_smartwatch_form.elements['smartwatch_id'].value);
        data.append('name', edit_smartwatch_form.elements['name'].value);
        data.append('category', edit_smartwatch_form.elements['category'].value);
        data.append('price', edit_smartwatch_form.elements['price'].value);
        data.append('quantity', edit_smartwatch_form.elements['quantity'].value);
        data.append('brand', edit_smartwatch_form.elements['brand'].value);
        data.append('modelnumber', edit_smartwatch_form.elements['modelnumber'].value);
        data.append('movement', edit_smartwatch_form.elements['movement'].value);
        data.append('casematerial', edit_smartwatch_form.elements['casematerial'].value);
        data.append('strapmaterial', edit_smartwatch_form.elements['strapmaterial'].value);
        data.append('dialsize', edit_smartwatch_form.elements['dialsize'].value);
        data.append('waterresistance', edit_smartwatch_form.elements['water'].value);
        data.append('warranty', edit_smartwatch_form.elements['warranty'].value);
        data.append('desc', edit_smartwatch_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/smartwatch.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('edit-smartwatch');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Product data edited!');
                edit_smartwatch_form.reset();
                get_smartwatch_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function toggle_status(id,val) 
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/smartwatch.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success','Status toggled!');
                get_smartwatch_product();
            }
            else {
                alert('error','Server Down!');
            }
        }

        xhr.send('toggle_status='+id+'&value='+val); 
    }

    let add_image_form = document.getElementById('add_image_form');
    add_image_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_image();
    });

    function add_image()
    {
        let data = new FormData();
        data.append('image',add_image_form.elements['image'].files[0]);
        data.append('smartwatch_id',add_image_form.elements['smartwatch_id'].value);
        data.append('add_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/smartwatch.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 'inv_img') {
                alert('error','Only JPG, WEBP or PNG images are allowed!','image-alert');
            }
            else if (this.responseText == 'inv_size') {
                alert('error','Imgage size should be less than 2MB!','image-alert');
            }
            else if (this.responseText == 'upd_failed') {
                alert('error','Image upload failed. Server down!','image-alert');
            }
            else {
                alert('success','Image added successfully!','image-alert');
                smartwatch_images(add_image_form.elements['smartwatch_id'].value,document.querySelector("#smartwatch-images .modal-title").innerText);
                add_image_form.reset();
            }
        }
        xhr.send(data);
    }

    function smartwatch_images(id,mname)
    {
        document.querySelector("#smartwatch-images .modal-title").innerText = mname;
        add_image_form.elements['smartwatch_id'].value = id;
        add_image_form.elements['image'].value = '';

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/smartwatch.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('smartwatch-image-data').innerHTML = this.responseText;
        }

        xhr.send('get_smartwatch_images='+id);
    }

    function rem_image(img_id,smartwatch_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('smartwatch_id',smartwatch_id);
        data.append('rem_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/smartwatch.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image removed successfully!','image-alert');
                smartwatch_images(smartwatch_id,document.querySelector("#smartwatch-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to remove image. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function thumb_image(img_id,smartwatch_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('smartwatch_id',smartwatch_id);
        data.append('thumb_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/smartwatch.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image thumbnail changed successfully!','image-alert');
                smartwatch_images(smartwatch_id,document.querySelector("#smartwatch-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to change image thumbnail. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function remove_smartwatch(smartwatch_id) 
    {
        if (confirm("Are you sure, you want to delete this product?"))
        {
            let data = new FormData();
            data.append('smartwatch_id',smartwatch_id);
            data.append('remove_smartwatch','');
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/men.php",true);

            xhr.onload = function () 
            {
                if (this.responseText == 1) {
                    alert('success','Product removed successfully!');
                    get_smartwatch_product();
                }
                else {
                    alert('error','Failed to remove product. Try again!');
                }
            }
            xhr.send(data);
        }
    }

    window.onload = function() {
        get_smartwatch_product();
    }