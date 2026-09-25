# Décomposition — Gérer les catégories

## 🎯 Fonctionnalité
**Gérer les catégories** — L'administrateur doit pouvoir consulter, ajouter, modifier et supprimer des catégories.

## 🧩 Tâches et dépendances

| # | Tâche | Dépendance | Critères de validation |
|---|-------|------------|------------------------|
| **1** | Préparer le modèle de données (table SQL `categories` : id, nom, couleur, icone) | Aucune (**bloquante**) | Table existante + INSERT de test OK |
| **2** | Créer l'API CRUD (`GET`, `POST`, `PUT`, `DELETE` /categories) | Tâche 1 | Endpoints testés, codes HTTP corrects |
| **3** | Construire le formulaire HTML (nom, couleur, icone + tableau) | Aucune (parallélisable) | Formulaire visible et accessible |
| **4** | Connecter le formulaire à l'API | Tâches 2 et 3 | Création réelle + liste mise à jour |
| **5** | Tester et valider | Tâche 4 | Tous les scénarios passent |

## 🔗 Schéma des dépendances

```mermaid
graph TD
    T1["Tâche 1<br/>Préparer le modèle de données<br/>(BLOQUANTE)"]
    T2["Tâche 2<br/>Créer l'API CRUD"]
    T3["Tâche 3<br/>Construire le formulaire HTML"]
    T4["Tâche 4<br/>Connecter le formulaire à l'API"]
    T5["Tâche 5<br/>Tester et valider"]

    T1 --> T2
    T2 --> T4
    T3 --> T4
    T4 --> T5

    style T1 fill:#fee2e2,stroke:#dc2626,stroke-width:2px,color:#7f1d1d
    style T2 fill:#dbeafe,stroke:#2563eb,color:#1e3a8a
    style T3 fill:#dbeafe,stroke:#2563eb,color:#1e3a8a
    style T4 fill:#dcfce7,stroke:#16a34a,color:#14532d
    style T5 fill:#fef9c3,stroke:#ca8a04,color:#713f12
```

## 🎨 Légende

- 🔴 **Tâche 1** — Bloquante (point de départ)
- 🔵 **Tâches 2 et 3** — Développement (parallélisables partiellement)
- 🟢 **Tâche 4** — Point de convergence
- 🟡 **Tâche 5** — Validation finale

## 📌 Chemin critique

```
Tâche 1 → Tâche 2 ──┐
                    ├──→ Tâche 4 → Tâche 5
Tâche 3 ────────────┘
```