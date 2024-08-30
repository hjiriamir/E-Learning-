/*window.onload = () => {
    const FiltersForm2 = document.querySelector("#durationForm");
    document.querySelectorAll("#durationForm input").forEach(input => {
        input.addEventListener("change", () => {
            // Interception des clics
            // Récupération des données du formulaire
            const Form2 = new FormData(FiltersForm2);
            const Params2 = new URLSearchParams();
            console.log("Checkbox clicked");

            Form2.forEach((value, key) => {
                Params2.append(key, value);
                console.log(Params2.toString());
                console.log(key, value);
            });

            // Récupération de l'URL active
            const Url2 = new URL(window.location.href);
            console.log(Url2);

            // Lancement de la requête AJAX
            fetch(Url2.pathname + "?" + Params2.toString() + "&ajax=1", {
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                const content = document.querySelector("#content");
                content.innerHTML = data.content;
                history.pushState({}, null, Url2.pathname + "?" + Params2.toString());
            })
            .catch(e => {
                console.error('There was a problem with the fetch operation:', e);
                alert('Une erreur s\'est produite. Veuillez réessayer.');
            });
        });
    });
};
*/
window.onload = () => {
    // Formulaire de catégorie
    const FiltersForm5 = document.querySelector("#DiscountFormCoach");
    const maxRange = document.querySelector("#maxRangeeDiscount");
    const maxValue = document.querySelector("#maxDiscount");
    const minRange = document.querySelector("#minRangeeDiscount");
    const minValue = document.querySelector("#minDiscount");

    // Fonction pour mettre à jour le contenu via AJAX
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
            const content = document.querySelector("#CoachingDiscount");
            content.innerHTML = data.content;
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
        minValue.value = minRange.value; // Met à jour la valeur affichée du max
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
        [maxRange, maxValue,minRange, minValue].forEach(input => {
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