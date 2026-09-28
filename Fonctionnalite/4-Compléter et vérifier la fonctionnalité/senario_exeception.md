# Condition (Erreur) : À l’étape 3, l’Auteur ne saisit aucun contenu avant de valider.
Scénario d’erreur :
-L’Auteur clique sur le bouton “Enregistrer l’article”.
-Le système refuse l’enregistrement et affiche le message d’erreur “Le contenu de l’article est obligatoire”.

# Condition (Alternatif) : À l’étape 3, l’Auteur sélectionne le statut “Brouillon” au lieu de “Publié”.
Scénario alternatif :
-L’Auteur clique sur le bouton “Enregistrer l’article”.
-Le système sauvegarde l’article dans la base de données avec le statut inactif.
-Le système redirige l’Auteur vers la liste des articles.
