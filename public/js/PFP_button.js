var isPFPVisible = false;

function showPFPupdate() {
    var detailsDiv = document.getElementById('PFP-update');

    // Toggle visibility
    isPFPVisible = !isPFPVisible;
    detailsDiv.style.display = isPFPVisible ? 'block' : 'none';
}

function updateButtonStyle() {
    var button = document.getElementById('toggleButton');

    // Toggle button text
    button.textContent = isPFPVisible ? 'Cancel' : 'Update Foto Profil';

    // Toggle button color
    if (isPFPVisible) {
        button.classList.add('btn-danger');  // Change to the desired class for red color
        button.classList.remove('btn-dark');  // Remove the success color class
    } else {
        button.classList.remove('btn-danger');  // Remove the danger color class
        button.classList.add('btn-dark');  // Change to the desired class for success color
    }
}

// Attach the event listeners after the DOM has fully loaded
document.addEventListener('DOMContentLoaded', function () {
    var button = document.getElementById('toggleButton');
    button.addEventListener('click', function () {
        // showPFPupdate();
        updateButtonStyle();
    });
});