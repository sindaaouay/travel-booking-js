// addOffer.js
function validerFormulaire() {
    let errors = [];
    const title = document.getElementById('title').value.trim();
    const destination = document.getElementById('destination').value.trim();
    const departureDate = document.getElementById('departure').value;
    const returnDate = document.getElementById('return').value;
    const price = document.getElementById('price').value;

    // Validation Titre
    if (title.length < 3) {
        errors.push("Le titre doit contenir au moins 3 caractères");
    }

    // Validation Destination
    const destinationRegex = /^[A-Za-zÀ-ÿ\s]{3,}$/;
    if (!destinationRegex.test(destination)) {
        errors.push("La destination doit contenir uniquement des lettres et des espaces (min 3 caractères)");
    }

    // Validation Dates
    if (new Date(returnDate) <= new Date(departureDate)) {
        errors.push("La date de retour doit être ultérieure à la date de départ");
    }

    // Validation Prix
    if (isNaN(price) || parseFloat(price) <= 0) {
        errors.push("Le prix doit être un nombre positif");
    }

    if (errors.length > 0) {
        alert("Erreurs de validation :\n\n" + errors.join("\n"));
        return false;
    }
    return true;
}

// Partie 2 : Validation lors de la soumission
document.getElementById('addOfferForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let isValid = true;
    const form = this;

    function showError(inputId, message) {
        const input = document.getElementById(inputId);
        const hint = input.parentNode.querySelector('.hint-text');
        hint.textContent = message;
        hint.style.color = 'red';
        isValid = false;
    }

    function showSuccess(inputId) {
        const input = document.getElementById(inputId);
        const hint = input.parentNode.querySelector('.hint-text');
        hint.textContent = 'Correct';
        hint.style.color = 'green';
    }

    // Validation Titre
    const title = document.getElementById('title').value.trim();
    if (title.length < 3) {
        showError('title', 'Minimum 3 caractères requis');
    } else {
        showSuccess('title');
    }

    // Validation Destination
    const destination = document.getElementById('destination').value.trim();
    const destinationRegex = /^[A-Za-zÀ-ÿ\s]{3,}$/;
    if (!destinationRegex.test(destination)) {
        showError('destination', 'Lettres et espaces uniquement (min 3)');
    } else {
        showSuccess('destination');
    }

    // Validation Dates
    const departure = new Date(document.getElementById('departure').value);
    const returnDate = new Date(document.getElementById('return').value);
    
    if (!departure.getTime()) showError('departure', 'Date invalide');
    if (!returnDate.getTime()) showError('return', 'Date invalide');
    if (returnDate <= departure) {
        showError('return', 'Doit être après la date de départ');
    }

    // Validation Prix
    const price = parseFloat(document.getElementById('price').value);
    if (isNaN(price) || price <= 0) {
        showError('price', 'Doit être un nombre positif');
    }

    // Soumission si valide
    if (isValid) {
        const successMessage = document.createElement('div');
        successMessage.textContent = 'Offre publiée avec succès !';
        successMessage.style.color = 'green';
        successMessage.style.marginTop = '1rem';
        form.appendChild(successMessage);
        form.reset();
        setTimeout(() => successMessage.remove(), 3000);
    }
});

// Partie 3 : Validation en temps réel
document.getElementById('title').addEventListener('keyup', function() {
    const hint = this.parentNode.querySelector('.hint-text');
    if (this.value.trim().length >= 3) {
        hint.textContent = 'Correct';
        hint.style.color = 'green';
    } else {
        hint.textContent = 'Minimum 3 caractères requis';
        hint.style.color = 'red';
    }
});

document.getElementById('destination').addEventListener('keyup', function() {
    const hint = this.parentNode.querySelector('.hint-text');
    const destinationRegex = /^[A-Za-zÀ-ÿ\s]{3,}$/;
    if (destinationRegex.test(this.value.trim())) {
        hint.textContent = 'Correct';
        hint.style.color = 'green';
    } else {
        hint.textContent = 'Lettres et espaces uniquement (min 3)';
        hint.style.color = 'red';
    }
});