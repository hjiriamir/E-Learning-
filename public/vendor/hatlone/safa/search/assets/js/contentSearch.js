// bloc du Filter Products
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.container-product input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            let selectedProducts = [];
            checkboxes.forEach(cb => {
                if (cb.checked && cb.value) {
                    selectedProducts.push(cb.value);
                }
            });

            fetch('/handle_product_selection', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ products: selectedProducts.join(',') }),
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    // Mettez à jour l'affichage de global_status si nécessaire
                    document.getElementById('global-status-display').innerText = data.global_status;
                    window.location.reload();
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
// End bloc filter Products

// Courses Category section 
document.addEventListener('DOMContentLoaded', function() {
    // Gestion des checkboxes de catégorie
    const categoryCheckboxes = document.querySelectorAll('.container-category input[type="checkbox"]');
    const selectedCategoryElement = document.getElementById('selected-category');

    // Charger la catégorie sélectionnée à partir du serveur lorsque la page est chargée
    fetch(fetchSelectedCategoryUrl)
        .then(response => response.json())
        .then(data => {
            selectedCategoryElement.textContent = 'Selected Category: ' + data.selectedCategoryy;
            const selectedCheckbox = document.querySelector(`.container-category input[value="${data.selectedCategoryy}"]`);
            if (selectedCheckbox) {
                selectedCheckbox.checked = true;
            }
        });

    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Envoi de la catégorie sélectionnée au serveur
            fetch(handleCategorySelectionUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ category: this.value })
            })
            .then(response => response.json())
            .then(data => {
                // Mise à jour de l'interface utilisateur
                selectedCategoryElement.textContent = 'Selected Category: ' + this.value;
                window.location.reload();
            });
        });
    });
});
// Coaching Category section 
document.addEventListener('DOMContentLoaded', function() {
    // Gestion des checkboxes de catégorie
    const categoryCoachCheckboxes = document.querySelectorAll('.container-category0 input[type="checkbox"]');
    const selectedCategoryCoachElement = document.getElementById('selected-category0');

    // Charger la catégorie sélectionnée à partir du serveur lorsque la page est chargée
    fetch(fetchSelectedCategoryCoachUrl)
        .then(response => response.json())
        .then(data => {
            selectedCategoryCoachElement.textContent = 'Selected CategoryCoach: ' + data.selectedCategoryCoach;
            const selectedCheckbox = document.querySelector(`.container-category0 input[value="${data.selectedCategoryCoach}"]`);
            if (selectedCheckbox) {
                selectedCheckbox.checked = true;
            }
        });

    categoryCoachCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Envoi de la catégorie sélectionnée au serveur
            fetch(handleCategoryCoachSelectionUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ categoryCoach: this.value })
            })
            .then(response => response.json())
            .then(data => {
                // Mise à jour de l'interface utilisateur
                selectedCategoryCoachElement.textContent = 'Selected CategoryCoach: ' + this.value;
                window.location.reload();
            });
        });
    });
});
//end Coaching Category section 

// Courses level section amir
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.container-level input[type="checkbox"]');
    let selectedLevels = [];

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            selectedLevels = [];
            checkboxes.forEach(cb => {
                if (cb.checked && cb.value) {
                    selectedLevels.push(cb.value);
                }
            });

            // Send the selected levels to the server
            fetch(handleLevelSelectionUrle, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ levels: selectedLevels.join(',') }),
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    // Reload the main page content (reloading the section of the page)
                    // Make sure the URL is pointing to the page you want to refresh
                    fetch('courses1') // Adjust the URL to your needs
                        .then(response => response.text())
                        .then(html => {
                            // Replace the content of a specific section in the main page
                            document.getElementById('courses111-block').innerHTML = html;                           
                        })
                        .catch(error => console.error('Error:', error));
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
// end Courses level section    
// Coaching level section 
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.container-level0 input[type="checkbox"]');
    const globalStatusDisplay = document.getElementById('global-status-display');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            let selectedLevelsCoach = [];
            checkboxes.forEach(cb => {
                if (cb.checked && cb.value) {
                    selectedLevelsCoach.push(cb.value);
                }
            });

            fetch(handleLevelCoachSelectionUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ levelsCoach: selectedLevelsCoach.join(',') }),
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    // Mettez à jour l'affichage de global_status si nécessaire
                    globalStatusDisplay.innerText = data.global_status;
                    globalStatusDisplay.style.display = 'block'; // Afficher le status
                    // Vous pouvez aussi recharger la page si nécessaire
                     window.location.reload();
                })
                .catch(error => console.error('Error:', error));
        });
    });
});

// end Coaching level section

// Courses Duration section 
document.addEventListener('DOMContentLoaded', function() {
    const languageCheckboxes = document.querySelectorAll('.container-duration input[type="checkbox"]');
    const selectedDurationElement = document.getElementById('selected-duration');
    const val1Element = document.getElementById('val1');
    const specialMessageElement = document.getElementById('special-message');

    // Charger la durée sélectionnée à partir du serveur lorsque la page est chargée
    fetch(fetchSelectedDurationUrl)
        .then(response => response.json())
        .then(data => {
            selectedDurationElement.textContent = 'Selected Duration: ' + data.selectedDuration;
            if (data.selectedDuration === specialValue) {
                specialMessageElement.style.display = 'block'; // Afficher le message spécial
            } else {
                specialMessageElement.style.display = 'none'; // Cacher le message spécial
            }
        })
        .catch(error => console.error('Error:', error));

    languageCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Envoi de la durée sélectionnée au serveur
            fetch(handleDurationSelectionUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ duration: this.value })
            })
            .then(response => response.json())
            .then(data => {
                // Mise à jour de l'interface utilisateur
                selectedDurationElement.textContent = 'Selected Duration: ' + this.value;
                val1Element.style.display = 'block'; // Afficher val1

                // Mettre à jour la condition en temps réel
                if (this.value === specialValue) {
                    specialMessageElement.style.display = 'block'; // Afficher le message spécial
                } else {
                    specialMessageElement.style.display = 'none'; // Cacher le message spécial
                }
                window.location.reload();

            })
            .catch(error => console.error('Error:', error));
        });
    });
});

// End Courses Duration Section

// Coaching Duration section
document.addEventListener('DOMContentLoaded', function() {
    const languageCheckboxes = document.querySelectorAll('.container-duration input[type="checkbox"]');
    const selectedDurationElement = document.getElementById('selected-duration');
    const val1Element = document.getElementById('val1');
    const specialMessageElement = document.getElementById('special-message');

    // Charger la durée sélectionnée à partir du serveur lorsque la page est chargée
    fetch(fetchSelectedDurationCoachUrl)
        .then(response => response.json())
        .then(data => {
            selectedDurationElement.textContent = 'Selected Duration: ' + data.selectedDurationCoach;
            if (data.selectedDurationCoach === specialValue) {
                specialMessageElement.style.display = 'block'; // Afficher le message spécial
            } else {
                specialMessageElement.style.display = 'none'; // Cacher le message spécial
            }
        })
        .catch(error => console.error('Error:', error));

    languageCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Envoi de la durée sélectionnée au serveur
            fetch(handleDurationCoachSelectionUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ duration: this.value })
            })
            .then(response => response.json())
            .then(data => {
                // Mise à jour de l'interface utilisateur
                selectedDurationElement.textContent = 'Selected Duration: ' + this.value;
                val1Element.style.display = 'block'; // Afficher val1

                // Mettre à jour la condition en temps réel
                if (this.value === specialValue) {
                    specialMessageElement.style.display = 'block'; // Afficher le message spécial
                } else {
                    specialMessageElement.style.display = 'none'; // Cacher le message spécial

                }
                window.location.reload();
            })
            .catch(error => console.error('Error:', error));
        });
    });
});

// End Coaching Duration section 

// Courses Language Section amir

// Courses Language Section

document.addEventListener('DOMContentLoaded', function() {
    const languageCheckboxes = document.querySelectorAll('.container-language input[type="checkbox"]');
    const selectedLanguageElement = document.getElementById('selected-language');
    const specialMessageElement = document.getElementById('special-message');
    const specialValue = 'specialLanguage'; // Définir la valeur spéciale ici
    /*const fetchSelectedLanguageUrl = '/fetch-selected-language'; 
    const handleLanguageSelectionUrl = '/handle_language_selection'; */

    // Charger la langue sélectionnée à partir du serveur lorsque la page est chargée
    fetch(fetchSelectedLanguageUrle)
        .then(response => response.json())
        .then(data => {
            selectedLanguageElement.textContent = 'Selected Language: ' + data.selectedLanguage;
            if (data.selectedLanguage === specialValue) {
                specialMessageElement.style.display = 'block'; // Afficher le message spécial
            } else {
                specialMessageElement.style.display = 'none'; // Cacher le message spécial
            }
        })
        .catch(error => console.error('Error:', error));

    languageCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedLanguage = this.value;

            // Envoi de la langue sélectionnée au serveur
            fetch(handleLanguageSelectionUrle, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ language: selectedLanguage })
            })
            .then(response => response.json())
            .then(data => {
                // Mise à jour de l'interface utilisateur
                selectedLanguageElement.textContent = 'Selected Language: ' + selectedLanguage;

                // Mettre à jour la condition en temps réel
                if (selectedLanguage === specialValue) {
                    specialMessageElement.style.display = 'block'; // Afficher le message spécial
                } else {
                    specialMessageElement.style.display = 'none'; // Cacher le message spécial
                }

                // Recharger la section de la page
                fetch('course3') // Ajustez l'URL selon vos besoins
                    .then(response => response.text())
                    .then(html => {
                        // Remplacer le contenu d'une section spécifique de la page principale
                        document.getElementById('courses-block').innerHTML = html;
                    })
                    .catch(error => console.error('Error:', error));
                
            })
            .catch(error => console.error('Error:', error));
        });
    });
});

// End Courses Language Section


// End Courses Language Section

// Coaching Language Section
// languageCoach.js

document.addEventListener('DOMContentLoaded', function() {
    // Accéder aux variables globales définies dans Twig
    const fetchSelectedLanguageUrl = window.fetchSelectedLanguageUrl;
    const handleLanguageSelectionUrl = window.handleLanguageSelectionUrl;
    const specialValue = window.specialValue;

    // Gestion des checkboxes de langue
    const languageCheckboxes = document.querySelectorAll('.container-languageCoach input[type="checkbox"]');
    const selectedLanguageCoachElement = document.getElementById('selected-language');
    const val1Element = document.getElementById('val1');
    const specialMessageElement = document.getElementById('special-message');

    // Charger la langue sélectionnée à partir du serveur lorsque la page est chargée
    fetch(fetchSelectedLanguageUrl)
        .then(response => response.json())
        .then(data => {
            selectedLanguageCoachElement.textContent = 'Selected LanguageCoach: ' + data.selectedCoachLanguage;
            if (data.selectedLanguage === specialValue) {
                specialMessageElement.style.display = 'block'; // Afficher le message spécial
            } else {
                specialMessageElement.style.display = 'none'; // Cacher le message spécial
            }
        });

    languageCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Envoi de la langue sélectionnée au serveur
            fetch(handleLanguageSelectionUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ languagecoach: this.value })
            })
            .then(response => response.json())
            .then(data => {
                // Mise à jour de l'interface utilisateur
                selectedLanguageCoachElement.textContent = 'Selected Language: ' + this.value;
                val1Element.style.display = 'block'; // Afficher val1

                // Mettre à jour la condition en temps réel si nécessaire
                if (this.value === specialValue) {
                    specialMessageElement.style.display = 'block'; // Afficher le message spécial
                } else {
                    specialMessageElement.style.display = 'none'; // Cacher le message spécial
                }
                window.location.reload();
            });
        });
    });
});

//End Coaching Language Section 

// Courses Price Section 
// priceRange.js

document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('priceForm');
    var minRange = document.getElementById('minRange');
    var maxRange = document.getElementById('maxRange');
    var minValue = document.getElementById('minValue');
    var maxValue = document.getElementById('maxValue');

    var timeout;

    function updateForm() {
        minValue.value = minRange.value;
        maxValue.value = maxRange.value;

        // Annule le précédent délai s'il existe
        if (timeout) {
            clearTimeout(timeout);
        }

        // Démarre un nouveau délai de 3 secondes pour soumettre le formulaire
        timeout = setTimeout(function() {
            form.submit();
        }, 3000); // 3000 millisecondes = 3 secondes
    }

    minRange.addEventListener('input', updateForm);
    maxRange.addEventListener('input', updateForm);
});

// End Courses Price Section 

// Coaching Price Section 
// priceRangeCoach.js

document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('priceFormeCoach');
    var minRange = document.getElementById('minRangee');
    var maxRange = document.getElementById('maxRangee');
    var minValue = document.getElementById('minValuee');
    var maxValue = document.getElementById('maxValuee');

    var timeout;

    function updateForm() {
        minValue.value = minRange.value;
        maxValue.value = maxRange.value;

        // Annule le précédent délai s'il existe
        if (timeout) {
            clearTimeout(timeout);
        }

        // Démarre un nouveau délai de 3 secondes pour soumettre le formulaire
        timeout = setTimeout(function() {
            form.submit();
        }, 3000); // 3000 millisecondes = 3 secondes
    }

    minRange.addEventListener('input', updateForm);
    maxRange.addEventListener('input', updateForm);
});

// End Coaching Price Section