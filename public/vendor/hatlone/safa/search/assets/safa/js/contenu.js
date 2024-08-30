/*window.onload = () => {
    // Formulaire de catégorie
    const FiltersForm5 = document.querySelector("#DiscountForm");  

    const maxRange = document.querySelector("#maxRangeeDiscount"); // Slider for max discount
    const maxValue = document.querySelector("#maxDiscount"); // Number input for max discount

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

        // Récupérer les paramètres du formulaire de prix
        const FormPrice = new FormData(FiltersForm5);
        FormPrice.forEach((value, key) => {
            combinedParams.append(key, value);
        });

        return combinedParams;
    };

    // Fonction pour mettre à jour les valeurs affichées des sliders de prix
    const updateValues = () => {
        maxValue.value = maxRange.value; // Synchronize number input with range input
        console.log(`Max Discount: ${maxRange.value}%`);
    };

    // Ajouter des écouteurs d'événements à tous les inputs
    const addEventListeners = () => {
        // Écouter les changements sur les sliders et inputs de prix
        [maxRange, maxValue].forEach(input => {
            input.addEventListener("input", () => {
                updateValues(); // Mettre à jour les valeurs affichées
                const combinedParams = getCombinedParams();
                updateContent(combinedParams); // Mise à jour du contenu via AJAX
            });
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();

    // Initialiser les valeurs affichées des sliders au chargement de la page
    updateValues();

    // Initialiser l'affichage au chargement de la page avec les paramètres par défaut
    updateContent(getCombinedParams());
};*/
/*window.onload = () => {
    // Formulaire de catégorie
    const FiltersForm5 = document.querySelector("#DiscountForm");
    const maxRange = document.querySelector("#maxRangeeDiscount");
    const maxValue = document.querySelector("#maxDiscount");

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
            const content = document.querySelector("#contentDisc");
            content.innerHTML = data.content;
            history.pushState({}, null, fullUrl); // Met à jour l'URL après la réponse
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            // alert('Une erreur s\'est produite. Veuillez réessayer.');
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
        console.log(`Max Discount: ${maxRange.value}%`); // Correction de la syntaxe
    };

    // Fonction pour ajouter des écouteurs d'événements à tous les inputs
    const addEventListeners = () => {
        // Ajouter des écouteurs d'événements pour les sliders et inputs de prix
        [maxRange, maxValue].forEach(input => {
            input.addEventListener("input", () => { // Utiliser 'input' pour une mise à jour en temps réel
                updateValues();
                console.log("Discount changed");
                const combinedParams = getCombinedParams();

                // Mettre à jour l'URL de la page avant d'effectuer la requête AJAX
                const Url = new URL(window.location.href);
                const newUrl = Url.pathname + "?" + combinedParams.toString();
                history.pushState({}, null, newUrl); // Met à jour l'URL de la page

                updateContent(combinedParams); // Appeler la fonction pour mettre à jour le contenu
            });
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();

    // Initialiser les valeurs affichées des sliders au chargement de la page
    updateValues();

    // Initialiser l'affichage au chargement de la page avec les paramètres par défaut
    updateContent(getCombinedParams());
};*/

/*
function updateCourseDiscount() {
    const FiltersForm5 = document.querySelector("#DiscountForm");
    const maxRange = document.querySelector("#maxRangeeDiscount");
    const maxValue = document.querySelector("#maxDiscount");
    const minRange = document.querySelector("#minRangeeDiscount");
    const minValue = document.querySelector("#minDiscount");

    const searchParams = new URLSearchParams();
    const FormPrice = new FormData(FiltersForm5);
    FormPrice.forEach((value, key) => {
        searchParams.append(key, value);
    });

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
        const content = document.querySelector("#contentDisc");
        content.innerHTML = data.content;
        history.pushState({}, null, fullUrl); // Met à jour l'URL après la réponse
    })
    .catch(e => {
        console.error('There was a problem with the fetch operation:', e);
    });
}

function updateCoachingDiscount() {
    const FiltersForm5 = document.querySelector("#DiscountForm");
    const maxRange = document.querySelector("#maxRangeeDiscount");
    const maxValue = document.querySelector("#maxDiscount");
    const minRange = document.querySelector("#minRangeeDiscount");
    const minValue = document.querySelector("#minDiscount");

    const searchParams = new URLSearchParams();
    const FormPrice = new FormData(FiltersForm5);
    FormPrice.forEach((value, key) => {
        searchParams.append(key, value);
    });

    const Url = new URL(window.location.href);
    const fullUrl = Url.pathname.replace('coursDiscount', 'CoachingDiscount') + "?" + searchParams.toString() + "&ajax=1"; // Construction de l'URL
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
}

function start() {
    updateCourseDiscount();
    updateCoachingDiscount();
}

function addFunctionOnWindowLoad(callback) {
    if (window.addEventListener) {
        window.addEventListener('load', callback, false);
    } else {
        window.attachEvent('onload', callback);
    }
}

addFunctionOnWindowLoad(start);

*/ 
/*window.onload = () => {
    // Formulaire de catégorie
    const FiltersForm5 = document.querySelector("#DiscountForm");
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
            const content = document.querySelector("#contentDisc");
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
};*/
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
};*/

window.onload = () => {
    // Formulaire de catégorie
    const FiltersForm5 = document.querySelector("#DiscountForm");
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
            const content1 = document.querySelector("#contentDisc");
            const content2 = document.querySelector("#contentDisc1");
            content1.innerHTML = data.content1;
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