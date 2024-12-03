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

document.getElementById('filterButton').addEventListener('click', function () {
    const searchQuery = document.getElementById('searchInput').value.toLowerCase(); // Get input value
    const rows = document.querySelectorAll('#Table tbody tr'); // Select all table rows
    let visibleRows = 0; // Counter for visible rows

    rows.forEach(row => {
        const rowText = row.textContent.toLowerCase();
        if (rowText.includes(searchQuery)) {
            row.style.display = ''; // Show matching rows
            visibleRows++;
        } else {
            row.style.display = 'none'; // Hide non-matching rows
        }
    });

    // Show or hide "no results" message
    const noResultsMessage = document.getElementById('noResults');
    if (noResultsMessage) {
        noResultsMessage.style.display = visibleRows === 0 ? 'block' : 'none';
    }
});

    