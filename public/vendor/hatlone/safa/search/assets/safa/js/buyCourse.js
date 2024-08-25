// Sélectionnez tous les éléments avec la classe .cart-button
var cartButtons = document.querySelectorAll('.cart-button');
// Itérer sur chaque bouton de panier
cartButtons.forEach(function(button) {
    // Ajouter un gestionnaire d'événements à chaque bouton de panier
    button.addEventListener('click', function() {
        // Sélectionnez l'icône de panier à l'intérieur du bouton de panier actuel
        var cartIcon = button.querySelector('.cart-icon');

        // Afficher une boîte de dialogue SweetAlert
        Swal.fire({
            title: 'Buy Course',
            text: 'Do you want to buy this course?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, buy it!',
            cancelButtonText: 'No, cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                cartIcon.classList.add('blue-cart-icon');
                Swal.fire('Thank you!', 'Course has been added to your cart.', 'success');
                // Ajouter votre logique pour acheter le cours ici
            } else {
                Swal.fire('Cancelled', 'You cancelled the purchase.', 'error');
            }
        });
    });
});

