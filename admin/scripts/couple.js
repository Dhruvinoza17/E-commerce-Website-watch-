    let add_couple_form = document.getElementById('add_couple_form');

    add_couple_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_couple_product();
    });

    function add_couple_product() 
    {
        let data = new FormData();
        data.append('add_couple_product','');
        data.append('name', add_couple_form.elements['name'].value);
        data.append('category', add_couple_form.elements['category'].value);
        data.append('price', add_couple_form.elements['price'].value);
        data.append('quantity', add_couple_form.elements['quantity'].value);
        data.append('brand', add_couple_form.elements['brand'].value);
        data.append('modelnumber', add_couple_form.elements['modelnumber'].value);
        data.append('movement', add_couple_form.elements['movement'].value);
        data.append('casematerial', add_couple_form.elements['casematerial'].value);
        data.append('strapmaterial', add_couple_form.elements['strapmaterial'].value);
        data.append('dialsize', add_couple_form.elements['dialsize'].value);
        data.append('waterresistance', add_couple_form.elements['water'].value);
        data.append('warranty', add_couple_form.elements['warranty'].value);
        data.append('desc', add_couple_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/couple.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('add-couple');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Men product added!');
                add_couple_form.reset();
                get_couple_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function get_couple_product()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/couple.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('couple-data').innerHTML = this.responseText;
        }

        xhr.send('get_couple_product'); 
    }

    let edit_couple_form = document.getElementById('edit_couple_form');

    edit_couple_form.addEventListener('submit',function(e){
        e.preventDefault();
    });

    function edit_couple_details(id)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/couple.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            let data = JSON.parse(this.responseText);
            edit_couple_form.elements['name'].value = data.coupledata.name;
            edit_couple_form.elements['category'].value = data.coupledata.category;
            edit_couple_form.elements['price'].value = data.coupledata.price;
            edit_couple_form.elements['quantity'].value = data.coupledata.quantity;
            edit_couple_form.elements['brand'].value = data.coupledata.brand;
            edit_couple_form.elements['modelnumber'].value = data.coupledata.modelnumber;
            edit_couple_form.elements['movement'].value = data.coupledata.movement;
            edit_couple_form.elements['casematerial'].value = data.coupledata.casematerial;
            edit_couple_form.elements['strapmaterial'].value = data.coupledata.strapmaterial;
            edit_couple_form.elements['dialsize'].value = data.coupledata.dialsize;
            edit_couple_form.elements['water'].value = data.coupledata.waterresistance;
            edit_couple_form.elements['warranty'].value = data.coupledata.warranty;
            edit_couple_form.elements['desc'].value = data.coupledata.description;
            edit_couple_form.elements['couple_id'].value = data.coupledata.id;
        }

        xhr.send('get_product='+id);
    }

    edit_couple_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit();
    });

    function submit_edit() 
    {
        let data = new FormData();
        data.append('submit_edit','');
        data.append('couple_id',edit_couple_form.elements['couple_id'].value);
        data.append('name', edit_couple_form.elements['name'].value);
        data.append('category', edit_couple_form.elements['category'].value);
        data.append('price', edit_couple_form.elements['price'].value);
        data.append('quantity', edit_couple_form.elements['quantity'].value);
        data.append('brand', edit_couple_form.elements['brand'].value);
        data.append('modelnumber', edit_couple_form.elements['modelnumber'].value);
        data.append('movement', edit_couple_form.elements['movement'].value);
        data.append('casematerial', edit_couple_form.elements['casematerial'].value);
        data.append('strapmaterial', edit_couple_form.elements['strapmaterial'].value);
        data.append('dialsize', edit_couple_form.elements['dialsize'].value);
        data.append('waterresistance', edit_couple_form.elements['water'].value);
        data.append('warranty', edit_couple_form.elements['warranty'].value);
        data.append('desc', edit_couple_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/couple.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('edit-couple');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Product data edited!');
                edit_couple_form.reset();
                get_couple_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function toggle_status(id,val) 
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/couple.php", true);
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
        data.append('couple_id',add_image_form.elements['couple_id'].value);
        data.append('add_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/couple.php",true);

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
                couple_images(add_image_form.elements['couple_id'].value,document.querySelector("#couple-images .modal-title").innerText);
                add_image_form.reset();
            }
        }
        xhr.send(data);
    }

    function couple_images(id,mname)
    {
        document.querySelector("#couple-images .modal-title").innerText = mname;
        add_image_form.elements['couple_id'].value = id;
        add_image_form.elements['image'].value = '';

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/couple.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('couple-image-data').innerHTML = this.responseText;
        }

        xhr.send('get_couple_images='+id);
    }

    function rem_image(img_id,couple_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('couple_id',couple_id);
        data.append('rem_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/couple.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image removed successfully!','image-alert');
                men_images(couple_id,document.querySelector("#couple-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to remove image. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function thumb_image(img_id,couple_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('couple_id',couple_id);
        data.append('thumb_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/couple.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image thumbnail changed successfully!','image-alert');
                men_images(couple_id,document.querySelector("#couple-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to change image thumbnail. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function remove_couple(couple_id) 
    {
        if (confirm("Are you sure, you want to delete this product?"))
        {
            let data = new FormData();
            data.append('couple_id',couple_id);
            data.append('remove_couple','');
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/couple.php",true);

            xhr.onload = function () 
            {
                if (this.responseText == 1) {
                    alert('success','Product removed successfully!');
                    get_couple_product();
                }
                else {
                    alert('error','Failed to remove product. Try again!');
                }
            }
            xhr.send(data);
        }
    }

    window.onload = function() {
        get_couple_product();
    }