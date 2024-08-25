// Sélectionnez la case à cocher "Courses"
const coursesCheckbox = document.getElementById('tuto');
// Sélectionnez les conteneurs "container-certificate" et "container-content"
const certificateContainer = document.querySelector('.container-certificate');
const contentContainer = document.querySelector('.container-content');

// Ajoutez un écouteur d'événements pour la case à cocher "Courses"
coursesCheckbox.addEventListener('change', function() {
    // Vérifiez si la case à cocher est cochée
    if (this.checked) {
        // Si oui, affichez les conteneurs "container-certificate" et "container-content"
        certificateContainer.style.display = 'block';
        contentContainer.style.display = 'block';
    } else {
        // Sinon, masquez les conteneurs "container-certificate" et "container-content"
        certificateContainer.style.display = 'none';
        contentContainer.style.display = 'none';
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggles = document.querySelectorAll('.leftpaneMobile .dropdown-toggle');

    dropdownToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const dropdownMenu = toggle.nextElementSibling;
            dropdownMenu.classList.toggle('active');
        });
    });
});
