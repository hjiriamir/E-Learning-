var isRed = false;

// Sélectionnez tous les éléments avec la classe .heart-button
var heartButtons = document.querySelectorAll('.heart-button');

// Itérer sur chaque bouton de cœur
heartButtons.forEach(function(button) {
    // Ajouter un gestionnaire d'événements à chaque bouton de cœur
    button.addEventListener('click', function() {
        // Sélectionnez l'icône de cœur à l'intérieur du bouton de cœur actuel
        var heartIcon = button.querySelector('.heart-icon');
        if (!isRed) {
            heartIcon.style.color = 'red';
            isRed = true;
        } else {
            heartIcon.style.color = '#a8a5a5'; // Couleur par défaut
            isRed = false;
        }
    });
});
