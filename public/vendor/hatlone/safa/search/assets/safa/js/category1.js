/*window.onload = () => {
    // Formulaire de catégorie
    const FiltersForm5 = document.querySelector("#DiscountForm");
    const maxRange = document.querySelector("#maxRangeeDiscount");
    const maxValue = document.querySelector("#maxDiscount");
    const minRange = document.querySelector("#minRangeeDiscount");
    const minValue = document.querySelector("#minDiscount");


    // Fonction pour mettre à jour les deux contenus via AJAX
    const updateContent = (searchParams) => {
        const Url = new URL(window.location.href);
        const fullUrl = Url.pathname + "?" + searchParams.toString() + "&ajax=1"; // Construction de l'URL
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
            console.log(data);
            // Mise à jour du contenu pour le premier bloc
            const content1 = document.querySelector("#contentDisc");
            content1.innerHTML = data.content1;

            // Mise à jour du contenu pour le deuxième bloc
            const content2 = document.querySelector("#contentDisc1");
            content2.innerHTML = data.content2;

            history.pushState({}, null, fullUrl); // Met à jour l'URL après la réponse
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
        });
    };

    // Fonction pour récupérer et combiner les paramètres des formulaires
    const getCombinedParams = () => {
        const combinedParams = new URLSearchParams();
        const FormPrice = new FormData(FiltersForm5);
        FormPrice.forEach((value, key) => {
            combinedParams.append(key, value);
        });
        return combinedParams;
    };

    // Fonction pour mettre à jour les valeurs affichées des sliders de prix
    const updateValues = () => {
        maxValue.value = maxRange.value; // Met à jour la valeur affichée du max
        minValue.value = minRange.value; // Met à jour la valeur affichée du min
        
        console.log(`Max Discount: ${maxRange.value}%`); // Correction de la syntaxe
        console.log(`Min Discount: ${minRange.value}%`); // Correction de la syntaxe
    };

    // Fonction debounce
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
        // Ajouter des écouteurs d'événements pour les sliders et inputs de prix
        [maxRange, maxValue, minRange, minValue].forEach(input => {
            input.addEventListener("input", debounce(() => {
                updateValues();
                console.log("Discount changed");
                const combinedParams = getCombinedParams();

                // Mettre à jour l'URL de la page avant d'effectuer la requête AJAX
                const Url = new URL(window.location.href);
                const newUrl = Url.pathname + "?" + combinedParams.toString();
                history.pushState({}, null, newUrl); // Met à jour l'URL de la page

                updateContent(combinedParams); // Appeler la fonction pour mettre à jour le contenu
            }, 300)); // Délai de 300 ms
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();

    // Initialiser les valeurs affichées des sliders au chargement de la page
    updateValues();

    // Initialiser l'affichage au chargement de la page avec les paramètres par défaut
    updateContent(getCombinedParams());
};

*/
window.onload = () => {
    console.log("Bonjour ya");
    const Url = new URL(window.location.href);
    
    const FiltersForm2 = document.querySelector("#durationForm"); // Formulaire de durée
    const FiltersFormLangue = document.querySelector("#formLangue");  // Formulaire de langue
    const filtersFormNiveau = document.querySelector("#filters1");     // Formulaire de niveau
    const FiltersFormCateg = document.querySelector("#categForm");   // Formulaire de catégorie
    const FiltersFormPrice = document.querySelector("#priceForme");  // Formulaire de prix
    //const FiltersFormContent = document.querySelector("#ContentForm");
    const FiltersFormDiscount = document.querySelector("#DiscountForm"); // Formulaire de discount
    
    const minRange = document.querySelector("#minRangee");
    const maxRange = document.querySelector("#maxRangee");
    const minValue = document.querySelector("#minValuee");
    const maxValue = document.querySelector("#maxValuee");

    const minRangeDiscount = document.querySelector("#minRangeeDiscount");
    const maxRangeDiscount = document.querySelector("#maxRangeeDiscount");
    const minValueDiscount = document.querySelector("#minDiscount");
    const maxValueDiscount = document.querySelector("#maxDiscount");

    // Fonction pour mettre à jour les sections contentDisc et contentDisc1 via AJAX
    const updateContent = (searchParams) => {
        const fullUrl = Url.pathname + "?" + searchParams.toString() + "&ajax=1";
        console.log(`Fetching URL: ${fullUrl}`);

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
            const contentDisc = document.querySelector("#contentDisc");
            contentDisc.innerHTML = data.content1;
            const contentDisc1 = document.querySelector("#contentDisc1");       
            contentDisc1.innerHTML = data.content2;

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

        // Récupérer les paramètres des formulaires de langue, niveau, catégorie, durée et discount
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2, FiltersFormDiscount,FiltersFormPrice].forEach(form => {
            form.querySelectorAll("input:checked").forEach(input => {
                combinedParams.append(input.name, input.value);
            });
        });

        // Récupérer les paramètres du formulaire de prix et de discount
        const FormPrice = new FormData(FiltersFormPrice);
        FormPrice.forEach((value, key) => {
            combinedParams.append(key, value);
        });

        const FormDiscount = new FormData(FiltersFormDiscount);
        FormDiscount.forEach((value, key) => {
            combinedParams.append(key, value);
        });

        return combinedParams;
    };

    // Fonction pour mettre à jour les valeurs affichées des sliders de prix et de discount
    const updateValues = () => {
        minValue.value = minRange.value;
        maxValue.value = maxRange.value;
        minValueDiscount.value = minRangeDiscount.value;
        maxValueDiscount.value = maxRangeDiscount.value;
        console.log(`Min Price: $${minRange.value}, Max Price: $${maxRange.value}`);
        console.log(`Min Discount: ${minRangeDiscount.value}%, Max Discount: ${maxRangeDiscount.value}%`);
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
        // Ajouter des écouteurs d'événements pour les formulaires
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2].forEach(form => {
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

        // Ajouter des écouteurs d'événements pour les sliders et inputs de prix et de discount
        [minRange, maxRange, minValue, maxValue, minRangeDiscount, maxRangeDiscount, minValueDiscount, maxValueDiscount].forEach(input => {
            input.addEventListener("input", debounce(() => {
                updateValues();
                console.log("Valeurs changées");
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
console.log("amir");
    // Initialiser les valeurs affichées des sliders au chargement de la page
    updateValues();

    // Initialiser l'affichage au chargement de la page avec les paramètres par défaut
    updateContent(getCombinedParams());
};

