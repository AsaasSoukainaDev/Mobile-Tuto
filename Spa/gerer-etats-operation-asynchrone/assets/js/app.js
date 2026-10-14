// Récupération des éléments du DOM
const formCategorie = document.getElementById('form-categorie');
const btnSubmit = document.getElementById('btn-submit-form');

// Fonction qui gère l'état du bouton (chargement / repos)
function setLoadingState(isLoading) {
    btnSubmit.disabled = isLoading;
    if (isLoading) {
        btnSubmit.textContent = 'Enregistrement...';
    } else {
        btnSubmit.textContent = 'Enregistrer';
    }
}

// Écouteur sur la soumission du formulaire
formCategorie.addEventListener('submit', (e) => {
    e.preventDefault();

    // 1. Passer en état "Chargement"
    setLoadingState(true);

    // 2. Envoyer la requête à l'API
    fetch('api/controllers/CategorieController.php', {
        method: 'POST',
        body: new FormData(formCategorie)
    })
    .then(response => response.json())
    .then(data => {
        console.log("Succès :", data);
        formCategorie.reset();  // Vider le formulaire
    })
    .catch(error => {
        console.error("Erreur réseau :", error);
    })
    .finally(() => {
        // 3. Toujours revenir en état "Repos"
        setLoadingState(false);
    });
});