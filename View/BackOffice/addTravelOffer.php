<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Offre</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #2a5a8d;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 0.3rem;
        }

        input:focus, select:focus, textarea:focus {
            outline: 2px solid #2a5a8d;
        }

        .hint-text {
            font-size: 0.9rem;
            color: #666;
            margin-top: 0.3rem;
        }

        button[type="submit"] {
            background: #2a5a8d;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
        }

        button[type="submit"]:hover {
            background: #1d3d5c;
        }
    </style>
</head>
<body align="center">
    <!-- Navigation -->
    <header>
        <!-- Afficher les erreurs de session -->
<?php if(isset($_SESSION['errors'])): ?>
    <div class="error-message" style="color: red; padding: 1rem;">
        <?php 
        foreach($_SESSION['errors'] as $error) {
            echo "<p>$error</p>";
        }
        unset($_SESSION['errors']);
        ?>
    </div>
<?php endif; ?>
        <nav>
            <img src="ressources/esprit.png" alt="Logo" width="100">
            <a href="index.html">Retour à l'accueil</a>
        </nav>
        <h1>Nouvelle Offre de Voyage</h1>
    </header>

    <!-- Formulaire -->
    <div class="form-container">
    <form id="addOfferForm" method="POST" action="../../Verification.php">
            <!-- Titre -->
            <div class="form-group">
                <label for="title">Titre de l'offre *</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       placeholder="Ex: Week-end romantique à Paris" 
                       required 
                       minlength="3">
                <div class="hint-text">Minimum 3 caractères</div>
            </div>

            <!-- Destination -->
            <div class="form-group">
                <label for="destination">Destination *</label>
                <input type="text" 
                       id="destination" 
                       name="destination" 
                       placeholder="Ex: France, Paris" 
                       pattern="[A-Za-zÀ-ÿ ]+" 
                       title="Lettres et espaces uniquement" 
                       required 
                       minlength="3">
                <div class="hint-text">Lettres et espaces uniquement</div>
            </div>

            <!-- Dates -->
            <div class="form-group">
                <label>Dates *</label>
                <div style="display: flex; gap: 1rem;">
                    <input type="date" 
                           id="departure" 
                           name="departure" 
                           required>
                    <input type="date" 
                           id="return" 
                           name="return" 
                           required>
                </div>
                <div class="hint-text">Date de départ et de retour</div>
            </div>

            <!-- Prix -->
            <div class="form-group">
                <label for="price">Prix *</label>
                <input type="number" 
                       id="price" 
                       name="price" 
                       step="0.01" 
                       min="0" 
                       placeholder="Ex: 299.99" 
                       required>
                <div class="hint-text">Nombre positif (ex: 150 ou 299.99)</div>
            </div>

            <!-- Catégorie -->
            <div class="form-group">
                <label for="category">Catégorie *</label>
                <select id="category" name="category" required>
                    <option value="">Choisir une catégorie</option>
                    <option>Family Trips</option>
                    <option>Couples' Trips</option>
                    <option>Adventure and Sports Trips</option>
                </select>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" 
                          name="description" 
                          rows="4"
                          placeholder="Décrivez l'offre en détail..."></textarea>
            </div>

            <button type="submit">Publier l'Offre</button>
        </form>
    </div>

    <footer>
        <p>Copyright © Travel Booking 2024</p>
    </footer>

    <?php if(basename($_SERVER['PHP_SELF']) == 'addTravelOffer.php'): ?>
<script>
    // Conserver la validation JS existante MAIS...
    // Modifier la soumission pour permettre le fonctionnement PHP
    document.getElementById('addOfferForm').addEventListener('submit', function(e) {
        if(!validerFormulaire()) {
            e.preventDefault(); // Bloquer la soumission si JS invalide
        }
        // Laisser passer la soumission si valide
    });
</script>
<?php endif; ?>
    <script src="addOffer.js"></script>

</body>
</html>