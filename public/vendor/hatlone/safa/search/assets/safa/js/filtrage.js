window.onload = () => {
    console.log("Bonjour ya");
    const Url = new URL(window.location.href);
    
    const FiltersForm2 = document.querySelector("#durationForm"); // Formulaire de durée
    const FiltersFormLangue = document.querySelector("#formLangue");  // Formulaire de langue
    const filtersFormNiveau = document.querySelector("#filters1");     // Formulaire de niveau
    const FiltersFormCateg = document.querySelector("#categForm");   // Formulaire de catégorie
    const FiltersFormPrice = document.querySelector("#priceForme");  // Formulaire de prix
    const FiltersFormContent = document.querySelector("#ContentForm");
    
    const minRange = document.querySelector("#minRangee");
    const maxRange = document.querySelector("#maxRangee");
    const minValue = document.querySelector("#minValuee");
    const maxValue = document.querySelector("#maxValuee");

    // Fonction pour mettre à jour le contenu via AJAX
    const updateContent = (searchParams) => {
        const fullUrl = Url.pathname + "?" + searchParams.toString() + "&ajax=1";
        console.log(`Fetching URL: ${fullUrl}`); // Affichage de l'URL

        fetch(fullUrl, {
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const content1 = document.querySelector("#content");
            const content2 = document.querySelector("#content1");
            content1.innerHTML = data.content1;
            content2.innerHTML = data.content2;

            history.pushState({}, null, fullUrl); // Met à jour l'URL après la réponse
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            alert('Une erreur s\'est produite. Veuillez réessayer.');
        });
    };

    // Fonction pour récupérer et combiner les paramètres des formulaires
    const getCombinedParams = () => {
        const combinedParams = new URLSearchParams();

        // Récupérer les paramètres des formulaires de langue, niveau, catégorie et durée
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2,FiltersFormContent].forEach(form => {
            form.querySelectorAll("input:checked").forEach(input => {
                combinedParams.append(input.name, input.value);
            });
        });

        // Récupérer les paramètres du formulaire de prix
        const FormPrice = new FormData(FiltersFormPrice);
        FormPrice.forEach((value, key) => {
            combinedParams.append(key, value);
        });

        return combinedParams;
    };

    // Fonction pour mettre à jour les valeurs affichées des sliders de prix
    const updateValues = () => {
        minValue.value = minRange.value;
        maxValue.value = maxRange.value;
        console.log(`Min Price: $${minRange.value}, Max Price: $${maxRange.value}`);
    };

    // Fonction debounce pour limiter les appels fréquents
    const debounce = (func, delay) => {
        let timeout;
        return (...args) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                func.apply(this, args);
            }, delay);
        };
    };

    // Fonction pour ajouter des écouteurs d'événements à tous les inputs
    const addEventListeners = () => {
        // Ajouter des écouteurs d'événements pour tous les inputs de formulaire
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2,FiltersFormContent].forEach(form => {
            form.querySelectorAll("input").forEach(input => {
                input.addEventListener("change", debounce(() => {
                    console.log(`${input.name} changé`);
                    const combinedParams = getCombinedParams();

                    // Mettre à jour l'URL de la page avant d'effectuer la requête AJAX
                    const newUrl = Url.pathname + "?" + combinedParams.toString();
                    history.pushState({}, null, newUrl);

                    updateContent(combinedParams);
                }, 300));
            });
        });

        // Ajouter des écouteurs d'événements pour les sliders et inputs de prix
        [minRange, maxRange, minValue, maxValue].forEach(input => {
            input.addEventListener("input", debounce(() => {
                updateValues();
                console.log("Prix changé");
                const combinedParams = getCombinedParams();

                // Mettre à jour l'URL de la page avant d'effectuer la requête AJAX
                const newUrl = Url.pathname + "?" + combinedParams.toString();
                history.pushState({}, null, newUrl);

                updateContent(combinedParams);
            }, 300));
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();

    // Initialiser les valeurs affichées des sliders au chargement de la page
    updateValues();

    // Initialiser l'affichage au chargement de la page avec les paramètres par défaut
    updateContent(getCombinedParams());
};

/*window.onload = () => {
    console.log("Bonjour ya");
    const Url = new URL(window.location.href);
    
    const FiltersForm2 = document.querySelector("#durationForm"); // Formulaire de durée
    const FiltersFormLangue = document.querySelector("#formLangue");  // Formulaire de langue
    const filtersFormNiveau = document.querySelector("#filters1");     // Formulaire de niveau
    const FiltersFormCateg = document.querySelector("#categForm");   // Formulaire de catégorie
    const FiltersFormPrice = document.querySelector("#priceForme");  // Formulaire de prix
    const FiltersFormContent = document.querySelector("#ContentForm");
    
    const minRange = document.querySelector("#minRangee");
    const maxRange = document.querySelector("#maxRangee");
    const minValue = document.querySelector("#minValuee");
    const maxValue = document.querySelector("#maxValuee");

    // Fonction pour mettre à jour le contenu via AJAX
    const updateContent = (searchParams) => {
        const fullUrl = Url.pathname + "?" + searchParams.toString() + "&ajax=1";
        console.log(`Fetching URL: ${fullUrl}`); // Affichage de l'URL

        fetch(fullUrl, {
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const content1 = document.querySelector("#content");
            const content2 = document.querySelector("#content1");
            content1.innerHTML = data.content1;
            content2.innerHTML = data.content2;

            // Ne pas mettre à jour l'URL après la réponse
            // history.pushState({}, null, fullUrl); // Ligne commentée pour ne pas modifier l'URL
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            alert('Une erreur s\'est produite. Veuillez réessayer.');
        });
    };

    // Fonction pour récupérer et combiner les paramètres des formulaires
    const getCombinedParams = () => {
        const combinedParams = new URLSearchParams();

        // Récupérer les paramètres des formulaires de langue, niveau, catégorie et durée
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2,FiltersFormContent].forEach(form => {
            form.querySelectorAll("input:checked").forEach(input => {
                combinedParams.append(input.name, input.value);
            });
        });

        // Récupérer les paramètres du formulaire de prix
        const FormPrice = new FormData(FiltersFormPrice);
        FormPrice.forEach((value, key) => {
            combinedParams.append(key, value);
        });

        return combinedParams;
    };

    // Fonction pour mettre à jour les valeurs affichées des sliders de prix
    const updateValues = () => {
        minValue.value = minRange.value;
        maxValue.value = maxRange.value;
        console.log(`Min Price: $${minRange.value}, Max Price: $${maxRange.value}`);
    };

    // Fonction debounce pour limiter les appels fréquents
    const debounce = (func, delay) => {
        let timeout;
        return (...args) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                func.apply(this, args);
            }, delay);
        };
    };

    // Fonction pour ajouter des écouteurs d'événements à tous les inputs
    const addEventListeners = () => {
        // Ajouter des écouteurs d'événements pour tous les inputs de formulaire
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2,FiltersFormContent].forEach(form => {
            form.querySelectorAll("input").forEach(input => {
                input.addEventListener("change", debounce(() => {
                    console.log(`${input.name} changé`);
                    const combinedParams = getCombinedParams();

                    // Ne pas mettre à jour l'URL avant la requête AJAX
                    // const newUrl = Url.pathname + "?" + combinedParams.toString();
                    // history.pushState({}, null, newUrl); // Ligne commentée pour ne pas modifier l'URL

                    updateContent(combinedParams);
                }, 300));
            });
        });

        // Ajouter des écouteurs d'événements pour les sliders et inputs de prix
        [minRange, maxRange, minValue, maxValue].forEach(input => {
            input.addEventListener("input", debounce(() => {
                updateValues();
                console.log("Prix changé");
                const combinedParams = getCombinedParams();

                // Ne pas mettre à jour l'URL avant la requête AJAX
                // const newUrl = Url.pathname + "?" + combinedParams.toString();
                // history.pushState({}, null, newUrl); // Ligne commentée pour ne pas modifier l'URL

                updateContent(combinedParams);
            }, 300));
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();

    // Initialiser les valeurs affichées des sliders au chargement de la page
    updateValues();

    // Initialiser l'affichage au chargement de la page avec les paramètres par défaut
    updateContent(getCombinedParams());
};*/
