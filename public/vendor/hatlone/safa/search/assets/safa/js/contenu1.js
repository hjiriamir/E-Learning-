/*window.onload = () => {
    console.log("Bonjour yara");
    const Url = new URL(window.location.href);

    // Sélection des formulaires
    const FiltersFormLangue = document.querySelector("#formLangue");
    const filtersFormNiveau = document.querySelector("#filters1");
    const FiltersFormCateg = document.querySelector("#categForm");
    const FiltersForm2 = document.querySelector("#durationForm");
    const FiltersFormContent = document.querySelector("#ContentForm");
    const FiltersFormPrice = document.querySelector("#priceForme");
    const FiltersFormDiscount = document.querySelector("#DiscountForm");

    // Sliders et inputs pour le prix et le discount
    const minRange = document.querySelector("#minRangee");
    const maxRange = document.querySelector("#maxRangee");
    const minValue = document.querySelector("#minValuee");
    const maxValue = document.querySelector("#maxValuee");

    const maxRangeDiscount = document.querySelector("#maxRangeeDiscount");
    const maxValueDiscount = document.querySelector("#maxDiscount");

    // Fonction pour mettre à jour le contenu via AJAX
    const updateContent = (searchParams) => {
        const fullUrl = Url.pathname + "?" + searchParams.toString() + "&ajax=1";
        console.log(`Fetching URL: ${fullUrl}`);

        fetch(fullUrl, {
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
            const content1 = document.querySelector("#contentDisc");
            const content2 = document.querySelector("#contentDisc1");
            content1.innerHTML = data.content1 || data.content;
            if (content2) content2.innerHTML = data.content2;

            history.pushState({}, null, fullUrl);
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            alert('Une erreur s\'est produite. Veuillez réessayer.');
        });
    };

    // Fonction pour récupérer et combiner les paramètres des formulaires
    const getCombinedParams = () => {
        const combinedParams = new URLSearchParams();

        // Récupérer les paramètres des formulaires
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2, FiltersFormContent].forEach(form => {
            if (form) {
                form.querySelectorAll("input:checked").forEach(input => {
                    combinedParams.append(input.name, input.value);
                });
            }
        });

        // Paramètres du formulaire de prix
        if (FiltersFormPrice) {
            const formPrice = new FormData(FiltersFormPrice);
            formPrice.forEach((value, key) => {
                combinedParams.append(key, value);
            });
        }

        // Paramètres du formulaire de discount
        if (FiltersFormDiscount) {
            const formDiscount = new FormData(FiltersFormDiscount);
            formDiscount.forEach((value, key) => {
                combinedParams.append(key, value);
            });
        }

        return combinedParams;
    };

    // Fonction pour mettre à jour les valeurs affichées des sliders
    const updateValues = () => {
        if (minRange && maxRange) {
            minValue.value = minRange.value;
            maxValue.value = maxRange.value;
            console.log(`Min Price: $${minRange.value}, Max Price: $${maxRange.value}`);
        }

        if (maxRangeDiscount) {
            maxValueDiscount.value = maxRangeDiscount.value;
            console.log(`Max Discount: ${maxRangeDiscount.value}%`);
        }
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
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2, FiltersFormContent].forEach(form => {
            if (form) {
                form.querySelectorAll("input").forEach(input => {
                    input.addEventListener("change", debounce(() => {
                        console.log(`${input.name} changé`);
                        updateContent(getCombinedParams());
                    }, 300));
                });
            }
        });

        // Écouter les sliders de prix et de discount
        [minRange, maxRange, minValue, maxValue, maxRangeDiscount, maxValueDiscount].forEach(input => {
            if (input) {
                input.addEventListener("input", debounce(() => {
                    updateValues();
                    updateContent(getCombinedParams());
                }, 300));
            }
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();

    // Initialiser les valeurs affichées des sliders au chargement de la page
    updateValues();

    // Initialiser l'affichage avec les paramètres par défaut
    updateContent(getCombinedParams());
};
*/
/*window.onload = () => {
    console.log("Bonjour yara");
    const Url = new URL(window.location.href);

    // Sélection des formulaires
    const FiltersFormLangue = document.querySelector("#formLangue");
    const filtersFormNiveau = document.querySelector("#filters1");
    const FiltersFormCateg = document.querySelector("#categForm");
    const FiltersForm2 = document.querySelector("#durationForm");
    const FiltersFormContent = document.querySelector("#ContentForm");
    const FiltersFormPrice = document.querySelector("#priceForme");
    const FiltersFormDiscount = document.querySelector("#DiscountForm");

    // Sliders et inputs pour le prix et le discount
    const minRange = document.querySelector("#minRangee");
    const maxRange = document.querySelector("#maxRangee");
    const minValue = document.querySelector("#minValuee");
    const maxValue = document.querySelector("#maxValuee");

    const minRangeDiscount = document.querySelector("#minRangeeDiscount");
    const maxRangeDiscount = document.querySelector("#maxRangeeDiscount");
    const minValueDiscount = document.querySelector("#minDiscount");
    const maxValueDiscount = document.querySelector("#maxDiscount");

    // Fonction pour mettre à jour le contenu via AJAX
    const updateContent = (searchParams) => {
        const fullUrl = Url.pathname + "?" + searchParams.toString() + "&ajax=1";
        console.log(`Fetching URL: ${fullUrl}`);

        fetch(fullUrl, {
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
            const content1 = document.querySelector("#contentDisc");
            const content2 = document.querySelector("#contentDisc1");
            content1.innerHTML = data.content1 || data.content;
            if (content2) content2.innerHTML = data.content2;

            history.pushState({}, null, fullUrl);
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            alert('Une erreur s\'est produite. Veuillez réessayer.');
        });
    };

    // Fonction pour récupérer et combiner les paramètres des formulaires
    const getCombinedParams = () => {
        const combinedParams = new URLSearchParams();

        // Récupérer les paramètres des formulaires
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2, FiltersFormContent].forEach(form => {
            if (form) {
                form.querySelectorAll("input:checked").forEach(input => {
                    combinedParams.append(input.name, input.value);
                });
            }
        });

        // Paramètres du formulaire de prix
        if (FiltersFormPrice) {
            const formPrice = new FormData(FiltersFormPrice);
            formPrice.forEach((value, key) => {
                combinedParams.append(key, value);
            });
        }

        // Paramètres du formulaire de discount
        if (FiltersFormDiscount) {
            combinedParams.append("minDiscount", minRangeDiscount.value);
            combinedParams.append("maxDiscount", maxRangeDiscount.value);
        }

        return combinedParams;
    };

    // Fonction pour mettre à jour les valeurs affichées des sliders
    const updateValues = () => {
        if (minRange && maxRange) {
            minValue.value = minRange.value;
            maxValue.value = maxRange.value;
            console.log(`Min Price: $${minRange.value}, Max Price: $${maxRange.value}`);
        }

        if (minRangeDiscount && maxRangeDiscount) {
            minValueDiscount.value = minRangeDiscount.value;
            maxValueDiscount.value = maxRangeDiscount.value;
            console.log(`Min Discount: ${minRangeDiscount.value}%, Max Discount: ${maxRangeDiscount.value}%`);
        }
    };

    // Fonction pour synchroniser les sliders de discount avec les inputs
    const syncDiscountSliders = () => {
        minRangeDiscount.addEventListener("input", () => {
            if (parseInt(minRangeDiscount.value) > parseInt(maxRangeDiscount.value)) {
                minRangeDiscount.value = maxRangeDiscount.value;  // S'assurer que min n'est pas supérieur à max
            }
            updateValues();
            updateContent(getCombinedParams());
        });

        maxRangeDiscount.addEventListener("input", () => {
            if (parseInt(maxRangeDiscount.value) < parseInt(minRangeDiscount.value)) {
                maxRangeDiscount.value = minRangeDiscount.value;  // S'assurer que max n'est pas inférieur à min
            }
            updateValues();
            updateContent(getCombinedParams());
        });
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
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2, FiltersFormContent].forEach(form => {
            if (form) {
                form.querySelectorAll("input").forEach(input => {
                    input.addEventListener("change", debounce(() => {
                        console.log(`${input.name} changé`);
                        updateContent(getCombinedParams());
                    }, 300));
                });
            }
        });

        // Écouter les sliders de prix et de discount
        [minRange, maxRange, minValue, maxValue, minRangeDiscount, maxRangeDiscount].forEach(input => {
            if (input) {
                input.addEventListener("input", debounce(() => {
                    updateValues();
                    updateContent(getCombinedParams());
                }, 300));
            }
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();
    syncDiscountSliders();  // Synchroniser les sliders de discount

    // Initialiser les valeurs affichées des sliders au chargement de la page
    updateValues();

    // Initialiser l'affichage avec les paramètres par défaut
    updateContent(getCombinedParams());
};*/
