/*console.log("bonjourat");
window.onload = () => {
    const FiltersForm5 = document.querySelector("#DiscountForm");  

    const maxRange = document.querySelector("#maxRangeeDiscount");
    const maxValue = document.querySelector("#maxDiscount");

    let debounceTimer;

    // Fonction pour mettre à jour le contenu via AJAX
    const updateContent = (searchParams) => {
        const Url = new URL(window.location.href);
        fetch(Url.pathname + "?" + searchParams.toString() + "&ajax=1", {
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
            const content = document.querySelector("#contentDisc");
            content.innerHTML = data.content;
            history.pushState({}, null, Url.pathname + "?" + searchParams.toString());
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            alert('Une erreur s\'est produite. Veuillez réessayer.');
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

    // Fonction pour mettre à jour les valeurs affichées des sliders
    const updateValues = () => {
        maxValue.value = maxRange.value;
        console.log(`Max Discount: ${maxRange.value}%`);
    };

    // Ajouter un délai avant de déclencher l'appel AJAX pour éviter une surcharge du serveur
    const triggerAjaxWithDelay = () => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            const combinedParams = getCombinedParams();
            updateContent(combinedParams);
        }, 500); // 500ms delay
    };

    // Ajouter des écouteurs d'événements
    const addEventListeners = () => {
        // Écouter les changements sur le range et le champ input
        [maxRange, maxValue].forEach(input => {
            input.addEventListener("input", () => {
                updateValues();  // Mise à jour immédiate des valeurs affichées
                triggerAjaxWithDelay();  // Déclencher la requête AJAX avec délai
            });
        });
    };

    addEventListeners();
    updateValues();
    updateContent(getCombinedParams());
};*/
