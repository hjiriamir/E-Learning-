/*window.onload = () => {
    const FiltersForm2 = document.querySelector("#formLangue");
    document.querySelectorAll("#formLangue input").forEach(input => {
        input.addEventListener("change", () => {
                // Ici on intercepte les clics
            // On récupère les données du formulaire
            const Form2 = new FormData(FiltersForm2);
            const Params2 = new URLSearchParams();
            console.log("clic2");

            Form2.forEach((value, key) => {
                Params2.append(key, value);
                console.log(Params2.toString());
               console.log(key, value);
            });
            // On récupère l'url active
            const Url2 = new URL(window.location.href);
            console.log(Url2);
  // On lance la requête ajax
            fetch(Url2.pathname + "?" + Params2.toString() + "&ajax=1", {
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

};*/



/*window.onload = () => {
    const FiltersForm2 = document.querySelector("#formLangue");  // Formulaire de langue
    const filtersForm = document.querySelector("#filters1");     // Formulaire de niveau

    // Fonction pour mettre à jour le contenu via AJAX
    const updateContent = (searchParams) => {
        const Url = new URL(window.location.href);
        fetch(Url.pathname + "?" + searchParams.toString() + "&ajax=1", {
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
            const content = document.querySelector("#content");
            content.innerHTML = data.content;
            history.pushState({}, null, Url.pathname + "?" + searchParams.toString());
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            alert('Une erreur s\'est produite. Veuillez réessayer.');
        });
    };

    // Fonction pour récupérer et combiner les paramètres des deux formulaires
    const getCombinedParams = () => {
        const Params2 = new URLSearchParams(); // Paramètres du formulaire de langue
        const params = new URLSearchParams();  // Paramètres du formulaire de niveau

        // Récupérer les paramètres du formulaire de langue
        document.querySelectorAll("#formLangue input:checked").forEach(input => {
            Params2.append(input.name, input.value);
        });

        // Récupérer les paramètres du formulaire de niveau
        document.querySelectorAll("#filters1 input:checked").forEach(input => {
            params.append(input.name, input.value);
        });

        // Combiner les paramètres des deux formulaires
        const combinedParams = new URLSearchParams([...Params2, ...params]);
        return combinedParams;
    };

    // Fonction pour ajouter des écouteurs d'événements à tous les inputs
    const addEventListeners = () => {
        // Ajouter des écouteurs d'événements pour les inputs du formulaire de langue
        document.querySelectorAll("#formLangue input").forEach(input => {
            input.addEventListener("change", () => {
                console.log("Langue changée");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);
            });
        });

        // Ajouter des écouteurs d'événements pour les inputs du formulaire de niveau
        document.querySelectorAll("#filters1 input").forEach(input => {
            input.addEventListener("change", () => {
                console.log("Niveau changé");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);
            });
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();

    // Initialiser l'affichage au chargement de la page avec les paramètres par défaut
    updateContent(getCombinedParams());
};*/



/*window.onload = () => {
    const FiltersForm2 = document.querySelector("#formLangue");  // Formulaire de langue
    const filtersForm = document.querySelector("#filters1");     // Formulaire de niveau
    const FiltersForm3 = document.querySelector("#categForm");   // Formulaire de catégorie

    // Fonction pour mettre à jour le contenu via AJAX
    const updateContent = (searchParams) => {
        const Url = new URL(window.location.href);
        fetch(Url.pathname + "?" + searchParams.toString() + "&ajax=1", {
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
            const content = document.querySelector("#content");
            content.innerHTML = data.content;
            history.pushState({}, null, Url.pathname + "?" + searchParams.toString());
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            alert('Une erreur s\'est produite. Veuillez réessayer.');
        });
    };

    // Fonction pour récupérer et combiner les paramètres des trois formulaires
    const getCombinedParams = () => {
        const Params2 = new URLSearchParams(); // Paramètres du formulaire de langue
        const params = new URLSearchParams();  // Paramètres du formulaire de niveau
        const Params3 = new URLSearchParams(); // Paramètres du formulaire de catégorie

        // Récupérer les paramètres du formulaire de langue
        document.querySelectorAll("#formLangue input:checked").forEach(input => {
            Params2.append(input.name, input.value);
        });

        // Récupérer les paramètres du formulaire de niveau
        document.querySelectorAll("#filters1 input:checked").forEach(input => {
            params.append(input.name, input.value);
        });

        // Récupérer les paramètres du formulaire de catégorie
        document.querySelectorAll("#categForm input:checked").forEach(input => {
            Params3.append(input.name, input.value);
        });

        // Combiner les paramètres des trois formulaires
        const combinedParams = new URLSearchParams([...Params2, ...params, ...Params3]);
        return combinedParams;
    };

    // Fonction pour ajouter des écouteurs d'événements à tous les inputs
    const addEventListeners = () => {
        // Ajouter des écouteurs d'événements pour les inputs du formulaire de langue
        document.querySelectorAll("#formLangue input").forEach(input => {
            input.addEventListener("change", () => {
                console.log("Langue changée");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);
            });
        });

        // Ajouter des écouteurs d'événements pour les inputs du formulaire de niveau
        document.querySelectorAll("#filters1 input").forEach(input => {
            input.addEventListener("change", () => {
                console.log("Niveau changé");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);
            });
        });

        // Ajouter des écouteurs d'événements pour les inputs du formulaire de catégorie
        document.querySelectorAll("#categForm input").forEach(input => {
            input.addEventListener("change", () => {
                console.log("Catégorie changée");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);
            });
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();

    // Initialiser l'affichage au chargement de la page avec les paramètres par défaut
    updateContent(getCombinedParams());
};*/

/*window.onload = () => {
    const FiltersForm2 = document.querySelector("#formLangue");  // Formulaire de langue
    const filtersForm = document.querySelector("#filters1");     // Formulaire de niveau
    const FiltersForm3 = document.querySelector("#categForm");   // Formulaire de catégorie
    const FiltersForm1 = document.querySelector("#priceForme");  // Formulaire de prix
    const minRange = document.querySelector("#minRangee");
    const maxRange = document.querySelector("#maxRangee");
    const minValue = document.querySelector("#minValuee");
    const maxValue = document.querySelector("#maxValuee");

    // Fonction pour mettre à jour le contenu via AJAX
    const updateContent = (searchParams) => {
        const Url = new URL(window.location.href);
        fetch(Url.pathname + "?" + searchParams.toString() + "&ajax=1" , {
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
            const content = document.querySelector("#content");
            //const content2 = document.querySelector("#content1"); // Sélectionner le deuxième contenu
            content.innerHTML = data.content;
           // content2.innerHTML = data.content1;    // Mettre à jour le deuxième contenu
            history.pushState({}, null, Url.pathname + "?" + searchParams.toString());
        })
        .catch(e => {
            console.error('There was a problem with the fetch operation:', e);
            alert('Une erreur s\'est produite. Veuillez réessayer.');
        });
    };
    

    // Fonction pour récupérer et combiner les paramètres des quatre formulaires
    const getCombinedParams = () => {
        const Params2 = new URLSearchParams(); // Paramètres du formulaire de langue
        const params = new URLSearchParams();  // Paramètres du formulaire de niveau
        const Params3 = new URLSearchParams(); // Paramètres du formulaire de catégorie
        const Params1 = new URLSearchParams(); // Paramètres du formulaire de prix

        // Récupérer les paramètres du formulaire de langue
        document.querySelectorAll("#formLangue input:checked").forEach(input => {
            Params2.append(input.name, input.value);
        });

        // Récupérer les paramètres du formulaire de niveau
        document.querySelectorAll("#filters1 input:checked").forEach(input => {
            params.append(input.name, input.value);
        });

        // Récupérer les paramètres du formulaire de catégorie
        document.querySelectorAll("#categForm input:checked").forEach(input => {
            Params3.append(input.name, input.value);
        });

        // Récupérer les paramètres du formulaire de prix
        const Form1 = new FormData(FiltersForm1);
        Form1.forEach((value, key) => {
            Params1.append(key, value);
        });

        // Combiner les paramètres des quatre formulaires
        const combinedParams = new URLSearchParams([...Params2, ...params, ...Params3, ...Params1]);
        return combinedParams;
    };

    // Fonction pour mettre à jour les valeurs affichées des sliders de prix
    const updateValues = () => {
        minValue.value = minRange.value;
        maxValue.value = maxRange.value;
        console.log(`Min Price: $${minRange.value}, Max Price: $${maxRange.value}`);
    };

    // Fonction pour ajouter des écouteurs d'événements à tous les inputs
    const addEventListeners = () => {
        // Ajouter des écouteurs d'événements pour les inputs du formulaire de langue
        document.querySelectorAll("#formLangue input").forEach(input => {
            input.addEventListener("change", () => {
                console.log("Langue changée");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);
            });
        });

        // Ajouter des écouteurs d'événements pour les inputs du formulaire de niveau
        document.querySelectorAll("#filters1 input").forEach(input => {
            input.addEventListener("change", () => {
                console.log("Niveau changé");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);

            });
        });

        // Ajouter des écouteurs d'événements pour les inputs du formulaire de catégorie
        document.querySelectorAll("#categForm input").forEach(input => {
            input.addEventListener("change", () => {
                console.log("Catégorie changée");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);
            });
        });

        // Ajouter des écouteurs d'événements pour les sliders et inputs de prix
        [minRange, maxRange, minValue, maxValue].forEach(input => {
            input.addEventListener("change", () => {
                // Mettre à jour les valeurs affichées
                updateValues();

                console.log("Prix changé");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);
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
window.onload = () => {
    const FiltersForm2 = document.querySelector("#durationForm"); // Formulaire de durée
    const FiltersFormLangue = document.querySelector("#formLangue");  // Formulaire de langue
    const filtersFormNiveau = document.querySelector("#filters1");     // Formulaire de niveau
    const FiltersFormCateg = document.querySelector("#categForm");   // Formulaire de catégorie
    const FiltersFormPrice = document.querySelector("#priceForme");  // Formulaire de prix
    const minRange = document.querySelector("#minRangee");
    const maxRange = document.querySelector("#maxRangee");
    const minValue = document.querySelector("#minValuee");
    const maxValue = document.querySelector("#maxValuee");

    // Fonction pour mettre à jour le contenu via AJAX
    const updateContent = (searchParams) => {
        const Url = new URL(window.location.href);
        fetch(Url.pathname + "?" + searchParams.toString() + "&ajax=1", {
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
            const content = document.querySelector("#content");
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

        // Récupérer les paramètres du formulaire de langue
        document.querySelectorAll("#formLangue input:checked").forEach(input => {
            combinedParams.append(input.name, input.value);
        });

        // Récupérer les paramètres du formulaire de niveau
        document.querySelectorAll("#filters1 input:checked").forEach(input => {
            combinedParams.append(input.name, input.value);
        });

        // Récupérer les paramètres du formulaire de catégorie
        document.querySelectorAll("#categForm input:checked").forEach(input => {
            combinedParams.append(input.name, input.value);
        });

        // Récupérer les paramètres du formulaire de durée
        document.querySelectorAll("#durationForm input:checked").forEach(input => {
            combinedParams.append(input.name, input.value);
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

    // Fonction pour ajouter des écouteurs d'événements à tous les inputs
    const addEventListeners = () => {
        // Ajouter des écouteurs d'événements pour tous les inputs de formulaire
        [FiltersFormLangue, filtersFormNiveau, FiltersFormCateg, FiltersForm2].forEach(form => {
            form.querySelectorAll("input").forEach(input => {
                input.addEventListener("change", () => {
                    console.log(`${input.name} changé`);
                    const combinedParams = getCombinedParams();
                    updateContent(combinedParams);
                });
            });
        });

        // Ajouter des écouteurs d'événements pour les sliders et inputs de prix
        [minRange, maxRange, minValue, maxValue].forEach(input => {
            input.addEventListener("change", () => {
                // Mettre à jour les valeurs affichées
                updateValues();
                console.log("Prix changé");
                const combinedParams = getCombinedParams();
                updateContent(combinedParams);
            });
        });
    };

    // Initialiser les écouteurs d'événements
    addEventListeners();

    // Initialiser les valeurs affichées des sliders au chargement de la page
    updateValues();

    // Initialiser l'affichage au chargement de la page avec les paramètres par défaut
    updateContent(getCombinedParams());
};
