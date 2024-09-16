window.onload = () => {
    console.log("Bonjour ya");
    const Url = new URL(window.location.href);
    
    const FiltersForm2 = document.querySelector("#durationForm"); // Formulaire de durée
    const FiltersFormLangue = document.querySelector("#formLangue");  // Formulaire de langue
    const filtersFormNiveau = document.querySelector("#filters1");     // Formulaire de niveau
    const FiltersFormCateg = document.querySelector("#categForm");   // Formulaire de catégorie
    const FiltersFormPrice = document.querySelector("#priceForme");  // Formulaire de prix
    const FiltersFormDiscount = document.querySelector("#DiscountForm"); // Formulaire de discount
    const FiltersFormContent = document.querySelector("#ContentForm"); // Formulaire de contenu (si nécessaire)
    
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
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
       /* .then(data => {
            console.log('Données reçues:', data);  // Ajoutez cette ligne pour vérifier la réponse
            
            const content1 = document.querySelector("#content");
            const content2 = document.querySelector("#content1");
            const contentDisc = document.querySelector("#contentDisc");
            const contentDisc1 = document.querySelector("#contentDisc1");
        
            if (data.content1 && data.content2 & data.contentDisc && data.contentDisc1) {
                content1.innerHTML = data.content1;
                content2.innerHTML = data.content2;
                contentDisc.innerHTML = data.contentDisc;
                contentDisc1.innerHTML = data.contentDisc1;
            } else {
                console.error("Les contenus content1 et content2 sont manquants dans la réponse");
            }
        
            if (data.contentDisc && data.contentDisc1) {
                contentDisc.innerHTML = data.contentDisc;
                contentDisc1.innerHTML = data.contentDisc1;
            } else {
                console.error("Les contenus contentDisc et contentDisc1 sont manquants dans la réponse");
            }
        
            history.pushState({}, null, fullUrl);
        })
        
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            alert('Une erreur s\'est produite. Veuillez réessayer.');
        });
    };*/
        .then(data => {
            const content1 = document.querySelector("#content");
            const content2 = document.querySelector("#content1");
            content1.innerHTML = data.content1;
            content2.innerHTML = data.content2;

            const contentDisc = document.querySelector("#contentDisc");
            const contentDisc1 = document.querySelector("#contentDisc1");
            contentDisc.innerHTML = data.contentDisc;
            contentDisc1.innerHTML = data.contentDisc1;

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

        // Récupérer les paramètres des formulaires de langue, niveau, catégorie, durée, et discount
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2, FiltersFormDiscount, FiltersFormContent].forEach(form => {
            if (form) {
                form.querySelectorAll("input:checked").forEach(input => {
                    combinedParams.append(input.name, input.value);
                });
            }
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
            if (form) {
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
            }
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
    const FiltersFormDiscount = document.querySelector("#DiscountForm"); // Formulaire de discount

    
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
            const contentDisc = document.querySelector("#contentDisc");
            contentDisc.innerHTML = data.contentDisc;
            const contentDisc1 = document.querySelector("#contentDisc1");       
            contentDisc1.innerHTML = data.contentDisc1;

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
        const FormDiscount = new FormData(FiltersFormDiscount);
        FormPrice.forEach((value, key) => {
            combinedParams.append(key, value);
        });
        FormDiscount.forEach((value, key) => {
            combinedParams.append(key, value);
        });

        return combinedParams;
    };

    // Fonction pour mettre à jour les valeurs affichées des sliders de prix
    const updateValues = () => {
        minValue.value = minRange.value;
        maxValue.value = maxRange.value;
        console.log(`Min Price: $${minRange.value}, Max Price: $${maxRange.value}`);

        minValueDiscount.value = minRangeDiscount.value;
        maxValueDiscount.value = maxRangeDiscount.value;
        console.log(`minRangeDiscount Price: $${minRangeDiscount.value}, maxRangeDiscount Price: $${maxRangeDiscount.value}`);
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
        [minRange, maxRange, minValue, maxValue,maxValueDiscount,minValueDiscount,minRangeDiscount,maxRangeDiscount].forEach(input => {
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
*/
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
