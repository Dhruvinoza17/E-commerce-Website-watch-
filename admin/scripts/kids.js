    let add_kids_form = document.getElementById('add_kids_form');

    add_kids_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_kids_product();
    });

    function add_kids_product() 
    {
        let data = new FormData();
        data.append('add_kids_product','');
        data.append('name', add_kids_form.elements['name'].value);
        data.append('category', add_kids_form.elements['category'].value);
        data.append('price', add_kids_form.elements['price'].value);
        data.append('quantity', add_kids_form.elements['quantity'].value);
        data.append('brand', add_kids_form.elements['brand'].value);
        data.append('modelnumber', add_kids_form.elements['modelnumber'].value);
        data.append('movement', add_kids_form.elements['movement'].value);
        data.append('casematerial', add_kids_form.elements['casematerial'].value);
        data.append('strapmaterial', add_kids_form.elements['strapmaterial'].value);
        data.append('dialsize', add_kids_form.elements['dialsize'].value);
        data.append('waterresistance', add_kids_form.elements['water'].value);
        data.append('warranty', add_kids_form.elements['warranty'].value);
        data.append('desc', add_kids_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/kids.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('add-kids');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Kids product added!');
                add_kids_form.reset();
                get_kids_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function get_kids_product()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/kids.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('kids-data').innerHTML = this.responseText;
        }

        xhr.send('get_kids_product'); 
    }

    let edit_kids_form = document.getElementById('edit_kids_form');

    edit_kids_form.addEventListener('submit',function(e){
        e.preventDefault();
    });

    function edit_kids_details(id)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/kids.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            let data = JSON.parse(this.responseText);
            edit_kids_form.elements['name'].value = data.kidsdata.name;
            edit_kids_form.elements['category'].value = data.kidsdata.category;
            edit_kids_form.elements['price'].value = data.kidsdata.price;
            edit_kids_form.elements['quantity'].value = data.kidsdata.quantity;
            edit_kids_form.elements['brand'].value = data.kidsdata.brand;
            edit_kids_form.elements['modelnumber'].value = data.kidsdata.modelnumber;
            edit_kids_form.elements['movement'].value = data.kidsdata.movement;
            edit_kids_form.elements['casematerial'].value = data.kidsdata.casematerial;
            edit_kids_form.elements['strapmaterial'].value = data.kidsdata.strapmaterial;
            edit_kids_form.elements['dialsize'].value = data.kidsdata.dialsize;
            edit_kids_form.elements['water'].value = data.kidsdata.waterresistance;
            edit_kids_form.elements['warranty'].value = data.kidsdata.warranty;
            edit_kids_form.elements['desc'].value = data.kidsdata.description;
            edit_kids_form.elements['kids_id'].value = data.kidsdata.id;
        }

        xhr.send('get_product='+id);
    }

    edit_kids_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit();
    });

    function submit_edit() 
    {
        let data = new FormData();
        data.append('submit_edit','');
        data.append('kids_id',edit_kids_form.elements['kids_id'].value);
        data.append('name', edit_kids_form.elements['name'].value);
        data.append('category', edit_kids_form.elements['category'].value);
        data.append('price', edit_kids_form.elements['price'].value);
        data.append('quantity', edit_kids_form.elements['quantity'].value);
        data.append('brand', edit_kids_form.elements['brand'].value);
        data.append('modelnumber', edit_kids_form.elements['modelnumber'].value);
        data.append('movement', edit_kids_form.elements['movement'].value);
        data.append('casematerial', edit_kids_form.elements['casematerial'].value);
        data.append('strapmaterial', edit_kids_form.elements['strapmaterial'].value);
        data.append('dialsize', edit_kids_form.elements['dialsize'].value);
        data.append('waterresistance', edit_kids_form.elements['water'].value);
        data.append('warranty', edit_kids_form.elements['warranty'].value);
        data.append('desc', edit_kids_form.elements['desc'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/kids.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('edit-kids');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Product data edited!');
                edit_kids_form.reset();
                get_kids_product();
            } else {
                alert('error', 'Server Down!');
            }
        };

        xhr.send(data);
    }

    function toggle_status(id,val) 
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/kids.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success','Status toggled!');
                get_kids_product();
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
        data.append('kids_id',add_image_form.elements['kids_id'].value);
        data.append('add_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/kids.php",true);

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
                kids_images(add_image_form.elements['kids_id'].value,document.querySelector("#kids-images .modal-title").innerText);
                add_image_form.reset();
            }
        }
        xhr.send(data);
    }

    function kids_images(id,mname)
    {
        document.querySelector("#kids-images .modal-title").innerText = mname;
        add_image_form.elements['kids_id'].value = id;
        add_image_form.elements['image'].value = '';

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/kids.php", true);
        xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('kids-image-data').innerHTML = this.responseText;
        }

        xhr.send('get_kids_images='+id);
    }

    function rem_image(img_id,kids_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('kids_id',kids_id);
        data.append('rem_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/kids.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image removed successfully!','image-alert');
                kids_images(kids_id,document.querySelector("#kids-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to remove image. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function thumb_image(img_id,kids_id) 
    {
        let data = new FormData();
        data.append('image_id',img_id);
        data.append('kids_id',kids_id);
        data.append('thumb_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/kids.php",true);

        xhr.onload = function () 
        {
            if (this.responseText == 1) {
                alert('success','Image thumbnail changed successfully!','image-alert');
                kids_images(kids_id,document.querySelector("#kids-images .modal-title").innerText);
            }
            else {
                alert('error','Failed to change image thumbnail. Try again!','image-alert');
            }
        }
        xhr.send(data);
    }

    function remove_kids(kids_id) 
    {
        if (confirm("Are you sure, you want to delete this product?"))
        {
            let data = new FormData();
            data.append('kids_id',kids_id);
            data.append('remove_kids','');
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/kids.php",true);

            xhr.onload = function () 
            {
                if (this.responseText == 1) {
                    alert('success','Product removed successfully!');
                    get_kids_product();
                }
                else {
                    alert('error','Failed to remove product. Try again!');
                }
            }
            xhr.send(data);
        }
    }

    window.onload = function() {
        get_kids_product();
    }