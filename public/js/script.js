// Get all accordion headers
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

function navigate_to_loginpage() {
    window.location.href = "login.html";
}

function navigate_to_reservation() {
    window.location.href = '/reservation';
}

function navigate_to_appointment() {
    window.location.href = '/appointment';
}

const dateInput = document.getElementById('date-input');

    // Initial placeholder value
    const placeholderText = 'Select a date';

    // Add placeholder-like behavior
    function addPlaceholder(input) {
        if (!input.value) {
            input.classList.add('placeholder-active');
        }
    }

    function removePlaceholder(input) {
        input.classList.remove('placeholder-active');
    }

    // Initialize placeholder
    dateInput.classList.add('placeholder-active');
    addPlaceholder(dateInput);