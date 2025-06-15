    let add_men_form = document.getElementById('add_men_form');

    add_men_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_men_product();
    });

    function add_men_product() 
    {
        let data = new FormData();
        data.append('add_men_product','');
        data.append('name', add_men_form.elements['name'].value);
        data.append('category', add_men_form.elements['category'].value);
        data.append('price', add_men_form.elements['price'].value);
        data.append('quantity', add_men_form.elements['quantity'].value);
        data.append('brand', add_men_form.elements['brand'].value);
        data.append('modelnumber', add_men_form.elements['modelnumber'].value);
        data.append('movement', add_men_form.elements['movement'].value);
        data.append('casematerial', add_men_form.elements['casematerial'].value);
        data.append('strapmaterial', add_men_form.elements['strapmaterial'].value);
        data.append('dialsize', add_men_form.elements['dialsize'].value);
        data.append('waterresistance', add_men_form.elements['water'].value);
        data.append('warranty', add_men_form.elements['warranty'].value);
        data.append('desc', add_men_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/men.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('add-men');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Men product added!');
                add_men_form.reset();
                get_men_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function get_men_product()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/men.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('men-data').innerHTML = this.responseText;
        }

        xhr.send('get_men_product'); 
    }

    let edit_men_form = document.getElementById('edit_men_form');

    edit_men_form.addEventListener('submit',function(e){
        e.preventDefault();
    });

    function edit_men_details(id)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/men.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            let data = JSON.parse(this.responseText);
            edit_men_form.elements['name'].value = data.mendata.name;
            edit_men_form.elements['category'].value = data.mendata.category;
            edit_men_form.elements['price'].value = data.mendata.price;
            edit_men_form.elements['quantity'].value = data.mendata.quantity;
            edit_men_form.elements['brand'].value = data.mendata.brand;
            edit_men_form.elements['modelnumber'].value = data.mendata.modelnumber;
            edit_men_form.elements['movement'].value = data.mendata.movement;
            edit_men_form.elements['casematerial'].value = data.mendata.casematerial;
            edit_men_form.elements['strapmaterial'].value = data.mendata.strapmaterial;
            edit_men_form.elements['dialsize'].value = data.mendata.dialsize;
            edit_men_form.elements['water'].value = data.mendata.waterresistance;
            edit_men_form.elements['warranty'].value = data.mendata.warranty;
            edit_men_form.elements['desc'].value = data.mendata.description;
            edit_men_form.elements['men_id'].value = data.mendata.id;
        }

        xhr.send('get_product='+id);
    }

    edit_men_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit();
    });

    function submit_edit() 
    {
        let data = new FormData();
        data.append('submit_edit','');
        data.append('men_id',edit_men_form.elements['men_id'].value);
        data.append('name', edit_men_form.elements['name'].value);
        data.append('category', edit_men_form.elements['category'].value);
        data.append('price', edit_men_form.elements['price'].value);
        data.append('quantity', edit_men_form.elements['quantity'].value);
        data.append('brand', edit_men_form.elements['brand'].value);
        data.append('modelnumber', edit_men_form.elements['modelnumber'].value);
        data.append('movement', edit_men_form.elements['movement'].value);
        data.append('casematerial', edit_men_form.elements['casematerial'].value);
        data.append('strapmaterial', edit_men_form.elements['strapmaterial'].value);
        data.append('dialsize', edit_men_form.elements['dialsize'].value);
        data.append('waterresistance', edit_men_form.elements['water'].value);
        data.append('warranty', edit_men_form.elements['warranty'].value);
        data.append('desc', edit_men_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/men.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('edit-men');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Product data edited!');
                edit_men_form.reset();
                get_men_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function toggle_status(id,val) 
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/men.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success','Status toggled!');
                get_men_product();
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
        data.append('men_id',add_image_form.elements['men_id'].value);
        data.append('add_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/men.php",true);

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
                men_images(add_image_form.elements['men_id'].value,document.querySelector("#men-images .modal-title").innerText);
                add_image_form.reset();
            }
        }
        xhr.send(data);
    }

    function men_images(id,mname)
    {
        document.querySelector("#men-images .modal-title").innerText = mname;
        add_image_form.elements['men_id'].value = id;
        add_image_form.elements['image'].value = '';

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/men.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('men-image-data').innerHTML = this.responseText;
        }

        xhr.send('get_men_images='+id);
    }

    function rem_image(img_id,men_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('men_id',men_id);
        data.append('rem_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/men.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image removed successfully!','image-alert');
                men_images(men_id,document.querySelector("#men-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to remove image. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function thumb_image(img_id,men_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('men_id',men_id);
        data.append('thumb_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/men.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image thumbnail changed successfully!','image-alert');
                men_images(men_id,document.querySelector("#men-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to change image thumbnail. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function remove_men(men_id) 
    {
        if (confirm("Are you sure, you want to delete this product?"))
        {
            let data = new FormData();
            data.append('men_id',men_id);
            data.append('remove_men','');
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/men.php",true);

            xhr.onload = function () 
            {
                if (this.responseText == 1) {
                    alert('success','Product removed successfully!');
                    get_men_product();
                }
                else {
                    alert('error','Failed to remove product. Try again!');
                }
            }
            xhr.send(data);
        }
    }

    window.onload = function() {
        get_men_product();
    }