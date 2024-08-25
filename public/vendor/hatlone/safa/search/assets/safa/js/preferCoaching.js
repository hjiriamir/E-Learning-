var isRed = false;

// Sélectionnez tous les éléments avec la classe .heart-button
var heartButtons = document.querySelectorAll('.heart-button-coach');


heartButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        console.log("heart button est cliqué !")
        var heartIcon = button.querySelector('.heart-icon-coach');
        if (!isRed) {
            heartIcon.style.color = 'red';
            isRed = true;
        } else {
            heartIcon.style.color = '#a8a5a5'; // Couleur par défaut
            isRed = false;
        }
    });
});
