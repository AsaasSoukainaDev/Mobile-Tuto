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

// Fonction de création de Toasts dynamiques
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');

    toast.className = `toast toast-${type}`;
    toast.textContent = message;

    container.appendChild(toast);

    // Disparition automatique après 3 secondes
    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Écouteur sur la soumission du formulaire
formCategorie.addEventListener('submit', (e) => {
    e.preventDefault();

    setLoadingState(true);

    fetch('api/controllers/CategorieController.php', {
        method: 'POST',
        body: new FormData(formCategorie)
    })
    .then(response => response.json())
    .then(data => {
        showToast("Catégorie enregistrée avec succès !", "success");
        formCategorie.reset();
    })
    .catch(error => {
        showToast("Erreur réseau : Impossible de contacter le serveur.", "error");
        console.error(error);
    })
    .finally(() => {
        setLoadingState(false);
    });
});