<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Comptes - Finance Personnelles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajoutez vos styles personnalisés ici */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Gestion des Comptes - Finance Personnelles</h1>
        <hr>
        <!-- Boutons d'action -->
        <div class="mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAccountModal">Créer un compte</button>
            <input type="text" class="form-control d-inline" id="searchInput" placeholder="Rechercher...">
        </div>
        <!-- Tableau des comptes -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du Compte</th>
                    <th>Solde d'ouverture Type</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="accountTableBody">
                <!-- Lignes des comptes seront ajoutées dynamiquement ici -->
            </tbody>
        </table>
    </div>

    <!-- Modèle pour créer un compte -->
    <div class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="createAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAccountModalLabel">Créer un compte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire de création de compte -->
                    <form id="createAccountForm">
                        <div class="mb-3">
                            <label for="accountName" class="form-label">Nom du Compte</label>
                            <input type="text" class="form-control" id="accountName" required>
                        </div>
                        <div class="mb-3">
                            <label for="soldeType" class="form-label">Solde d'ouverture Type</label>
                            <select class="form-select" id="soldeType" required>
                                <option value="expenses">Dépenses</option>
                                <option value="incomes">Revenus</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Montant</label>
                            <input type="text" class="form-control" id="amount" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" form="createAccountForm">Créer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Fonction pour récupérer et afficher les comptes depuis le backend
        function fetchAccounts() {
            // Faites une requête Ajax pour récupérer les comptes depuis le backend
            // Remplacez cette section par votre logique de récupération des comptes
            // Exemple de réponse :
            const accountsData = [
                { id: 1, account_name: 'Compte 1', solde_douverture_type: 'expenses', date_creation: '2024-04-25 10:00:00' },
                // Ajoutez d'autres comptes ici si nécessaire
            ];

            // Générez les lignes du tableau à partir des données des comptes
            const accountTableBody = $('#accountTableBody');
            accountTableBody.empty(); // Videz le contenu existant du tableau
            accountsData.forEach(account => {
                const row = `
                    <tr>
                        <td>${account.id}</td>
                        <td>${account.account_name}</td>
                        <td>${account.solde_douverture_type}</td>
                        <td>${account.date_creation}</td>
                        <td>
                            <button class="btn btn-info btn-sm">Voir</button>
                            <button class="btn btn-warning btn-sm">Modifier</button>
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </td>
                    </tr>
                `;
                accountTableBody.append(row);
            });
        }

        // Appel de la fonction fetchAccounts lors du chargement de la page pour afficher les comptes
        $(document).ready(function() {
            fetchAccounts();

            // Set current date and time for the creation form
            const currentDate = new Date().toISOString().slice(0, 16);
            $('#creationDate').val(currentDate);
        });
    </script>
</body>
</html>
