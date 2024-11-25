document.addEventListener('DOMContentLoaded', function() {
    const headers = document.querySelectorAll(".accordion-header");
    
    headers.forEach(header => {
        header.addEventListener("click", () => {
            // Close all other accordions
            headers.forEach(h => {
                if (h !== header) {
                    h.classList.remove("active");
                    h.nextElementSibling.style.display = "none";
                }
            });

            // Toggle the clicked accordion
            header.classList.toggle("active");
            const content = header.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    });
});

function navigate_to_loginpage() {
    window.location.href = "login.html";
}