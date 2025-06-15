    let add_women_form = document.getElementById('add_women_form');

    add_women_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_women_product();
    });

    function add_women_product() 
    {
        let data = new FormData();
        data.append('add_women_product','');
        data.append('name', add_women_form.elements['name'].value);
        data.append('category', add_women_form.elements['category'].value);
        data.append('price', add_women_form.elements['price'].value);
        data.append('quantity', add_women_form.elements['quantity'].value);
        data.append('brand', add_women_form.elements['brand'].value);
        data.append('modelnumber', add_women_form.elements['modelnumber'].value);
        data.append('movement', add_women_form.elements['movement'].value);
        data.append('casematerial', add_women_form.elements['casematerial'].value);
        data.append('strapmaterial', add_women_form.elements['strapmaterial'].value);
        data.append('dialsize', add_women_form.elements['dialsize'].value);
        data.append('waterresistance', add_women_form.elements['water'].value);
        data.append('warranty', add_women_form.elements['warranty'].value);
        data.append('desc', add_women_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/women.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('add-women');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Women product added!');
                add_women_form.reset();
                get_women_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function get_women_product()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/women.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('women-data').innerHTML = this.responseText;
        }

        xhr.send('get_women_product'); 
    }

    let edit_women_form = document.getElementById('edit_women_form');

    edit_women_form.addEventListener('submit',function(e){
        e.preventDefault();
    });

    function edit_women_details(id)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/women.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            let data = JSON.parse(this.responseText);
            edit_women_form.elements['name'].value = data.womendata.name;
            edit_women_form.elements['category'].value = data.womendata.category;
            edit_women_form.elements['price'].value = data.womendata.price;
            edit_women_form.elements['quantity'].value = data.womendata.quantity;
            edit_women_form.elements['brand'].value = data.womendata.brand;
            edit_women_form.elements['modelnumber'].value = data.womendata.modelnumber;
            edit_women_form.elements['movement'].value = data.womendata.movement;
            edit_women_form.elements['casematerial'].value = data.womendata.casematerial;
            edit_women_form.elements['strapmaterial'].value = data.womendata.strapmaterial;
            edit_women_form.elements['dialsize'].value = data.womendata.dialsize;
            edit_women_form.elements['water'].value = data.womendata.waterresistance;
            edit_women_form.elements['warranty'].value = data.womendata.warranty;
            edit_women_form.elements['desc'].value = data.womendata.description;
            edit_women_form.elements['women_id'].value = data.womendata.id;
        }

        xhr.send('get_product='+id);
    }

    edit_women_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit();
    });

    function submit_edit() 
    {
        let data = new FormData();
        data.append('submit_edit','');
        data.append('women_id',edit_women_form.elements['women_id'].value);
        data.append('name', edit_women_form.elements['name'].value);
        data.append('category', edit_women_form.elements['category'].value);
        data.append('price', edit_women_form.elements['price'].value);
        data.append('quantity', edit_women_form.elements['quantity'].value);
        data.append('brand', edit_women_form.elements['brand'].value);
        data.append('modelnumber', edit_women_form.elements['modelnumber'].value);
        data.append('movement', edit_women_form.elements['movement'].value);
        data.append('casematerial', edit_women_form.elements['casematerial'].value);
        data.append('strapmaterial', edit_women_form.elements['strapmaterial'].value);
        data.append('dialsize', edit_women_form.elements['dialsize'].value);
        data.append('waterresistance', edit_women_form.elements['water'].value);
        data.append('warranty', edit_women_form.elements['warranty'].value);
        data.append('desc', edit_women_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/women.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('edit-women');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Product data edited!');
                edit_women_form.reset();
                get_women_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function toggle_status(id,val) 
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/women.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success','Status toggled!');
                get_women_product();
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
        data.append('women_id',add_image_form.elements['women_id'].value);
        data.append('add_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/women.php",true);

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
                women_images(add_image_form.elements['women_id'].value,document.querySelector("#women-images .modal-title").innerText);
                add_image_form.reset();
            }
        }
        xhr.send(data);
    }

    function women_images(id,mname)
    {
        document.querySelector("#women-images .modal-title").innerText = mname;
        add_image_form.elements['women_id'].value = id;
        add_image_form.elements['image'].value = '';

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/women.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('women-image-data').innerHTML = this.responseText;
        }

        xhr.send('get_women_images='+id);
    }

    function rem_image(img_id,women_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('women_id',women_id);
        data.append('rem_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/women.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image removed successfully!','image-alert');
                women_images(women_id,document.querySelector("#women-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to remove image. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function thumb_image(img_id,women_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('women_id',women_id);
        data.append('thumb_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/women.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image thumbnail changed successfully!','image-alert');
                women_images(women_id,document.querySelector("#women-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to change image thumbnail. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function remove_women(women_id) 
    {
        if (confirm("Are you sure, you want to delete this product?"))
        {
            let data = new FormData();
            data.append('women_id',women_id);
            data.append('remove_women','');
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/women.php",true);

            xhr.onload = function () 
            {
                if (this.responseText == 1) {
                    alert('success','Product removed successfully!');
                    get_women_product();
                }
                else {
                    alert('error','Failed to remove product. Try again!');
                }
            }
            xhr.send(data);
        }
    }

    window.onload = function() {
        get_women_product();
    }
