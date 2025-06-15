let general_data, contacts_data;

let general_s_form = document.getElementById('general_s_form');
let site_title_inp = document.getElementById('site_title_inp');
let site_about_inp = document.getElementById('site_about_inp');

let contacts_s_form = document.getElementById('contacts_s_form');

let cat_s_form = document.getElementById('cat_s_form');
let cat_name_inp = document.getElementById('cat_name_inp');
let cat_picture_inp = document.getElementById('cat_picture_inp');
let cat_page_inp = document.getElementById('cat_page_inp');

function get_general () 
{

    let site_title = document.getElementById('site_title');
    let site_about = document.getElementById('site_about');

    let shutdown_toggle = document.getElementById('shutdown-toggle');

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        general_data = JSON.parse(this.responseText);

        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;

        if (general_data.shutdown == 0) 
        {
            shutdown_toggle.checked = false;
            shutdown_toggle.value = 0;
        }
        else
        {
            shutdown_toggle.checked = true;
            shutdown_toggle.value = 1;
        }
    }
    xhr.send('get_general');
}

general_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    upd_general(site_title_inp.value, site_about_inp.value)

});

function upd_general (site_title_val,site_about_val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        // To Hide Modal After Submit
        var myModal = document.getElementById('general-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1)
        {
            alert('success','Changes Saved!');
            get_general();   
        }
        else
        {
            alert('error','No Changes Made!');
        }
    }
    xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&upd_general');
}

function upd_shutdown (val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText == 1 && general_data.shutdown == 0)
        {
            alert('success','Website Has Been Shutdown!');
        }
        else
        {
            alert('success','Shutdown Mode Off!');
        }
        get_general();   
    }
    xhr.send('upd_shutdown='+val);  
}

function get_contacts () 
{
    let contacts_p_id = ['ps','ios','email','pn1','pn2','fb','insta','yt'];

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data);
        
        for (i=0;i<contacts_p_id.length;i++)
        {
            document.getElementById(contacts_p_id[i]).innerText = contacts_data[i+1];
        }
        contacts_inp(contacts_data);
    }
    xhr.send('get_contacts');
}

function contacts_inp(data) 
{
    let contacts_inp_id = ['ps_inp','ios_inp','email_inp','pn1_inp','pn2_inp','fb_inp','insta_inp','yt_inp'];

    for (i=0;i<contacts_inp_id.length;i++) {
        document.getElementById(contacts_inp_id[i]).value = data[i+1];
    }
}

contacts_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    upd_contacts();
});

function upd_contacts() 
{
    let index = ['ps','ios','email','pn1','pn2','fb','insta','yt'];
    let contacts_inp_id = ['ps_inp','ios_inp','email_inp','pn1_inp','pn2_inp','fb_inp','insta_inp','yt_inp'];

    let data_str = "";

    for (i=0;i<index.length;i++) {
        data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
    }
    data_str += "upd_contacts";

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        // To Hide Modal After Submit
        var myModal = document.getElementById('contacts-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1)
        {
            alert('success','Changes Saved!');
            get_contacts();
        }
        else
        {
            alert('error','No Changes Made!');
        }
    }

    xhr.send(data_str);
}

cat_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    add_category();
});

function add_category() 
{
    let data = new FormData();
    data.append('name',cat_name_inp.value);
    data.append('page',cat_page_inp.value);
    data.append('picture',cat_picture_inp.files[0]);
    data.append('add_category','');

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);

    xhr.onload = function () {
        // To Hide Modal After Submit
        var myModal = document.getElementById('cat-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img') {
            alert('error','Only JPG and PNG images are allowed!');
        }
        else if (this.responseText == 'inv_size') {
            alert('error','Imgage size should be less than 2MB!');
        }
        else if (this.responseText == 'upd_failed') {
            alert('error','Image upload failed. Server down!');
        }
        else {
            alert('success','Category added successfully!');
            cat_name_inp.value = '';
            cat_page_inp.value = '';
            cat_picture_inp.value = '';
            get_categories();
        }
    }
    xhr.send(data);
}

function get_categories() 
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('cat-data').innerHTML = this.responseText;
    }
    xhr.send('get_categories');
}

function rem_category(val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert('success','Category deleted successfully!');
            get_categories();
        }
        else {
            alert('error','Category deletion failed. Please try again!');
        }
    }
    xhr.send('rem_category='+val);
}

window.onload = function () {
    get_general();
    get_contacts();
    get_categories();
}