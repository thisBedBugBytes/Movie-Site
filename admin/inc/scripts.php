
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 4,
      spaceBetween: 10,
      loop : true,
      autoplay:{
        delay : 2500,
        disableoninteraction : false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const expandButtons = document.querySelectorAll('.expand-btn');

        expandButtons.forEach(button => {
            button.addEventListener('click', function() {
                const description = this.previousElementSibling;
                if (description.style.maxHeight) {
                    // Collapse
                    description.style.maxHeight = null;
                    this.textContent = 'Show More';
                } else {
                    // Expand
                    description.style.maxHeight = description.scrollHeight + 'px';
                    this.textContent = 'Show Less';
                }
            });
        });
    });


    function validateForm() {
        let form = document.getElementById('movie-form');
        
        if (!form.checkValidity()) {
            alert('Please fill out all the required fields.');
            return false; 
        }

        alert('Movie added successfully!'); 
        form.reset(); 
    }
</script>