// Sélectionner tous les boutons "Voir plus"
const voirPlusButtons = document.querySelectorAll('.btn-outline-warning');

// Ajouter un écouteur d'événement "click" à chaque bouton
voirPlusButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Récupérer l'identifiant unique du bouton
        const buttonId = button.id;

        // Rediriger l'utilisateur vers une nouvelle page avec l'identifiant unique du bouton comme paramètre
        window.location.href = `product/detail.html.twig{buttonId}`;
    });
});
