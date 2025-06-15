<!-- Bootstrap's JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- Custom Alert Message Script -->
<script>
    function alert(type,msg,position='body',timeout = 2000) {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
                <strong class="me-3">${msg}</strong>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        if (position == 'body')
        {
            document.body.append(element);
            element.classList.add('custom-alert');
        }
        else
        {
            document.getElementById(position).appendChild(element);
        }
        setTimeout(() => {
            element.remove();
        }, timeout);
    }
</script>

<!-- Script To Show Current Page As Active Page -->

<script>
    function setActive() {
        let navbar = document.getElementById('dashboard-menu'); 
        let a_tags = navbar.getElementsByTagName('a');

        let currentFile = window.location.pathname.split('/').pop().split('.')[0];

        for (let i = 0; i < a_tags.length; i++) {
            let file = a_tags[i].href.split('/').pop().split('.')[0];

            if (file === currentFile) {  
                a_tags[i].classList.add('active'); 
                
                // Find the closest accordion-body and expand its parent accordion
                let accordionBody = a_tags[i].closest('.accordion-body');
                if (accordionBody) {
                    let accordionCollapse = accordionBody.closest('.accordion-collapse');
                    if (accordionCollapse) {
                        accordionCollapse.classList.add('show');
                    }
                }
            }
        }
    }

    document.addEventListener("DOMContentLoaded", setActive);
</script>
