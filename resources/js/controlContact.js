function validateContact() {
    const contactInput = document.getElementById('contact').value;
    const errorElement = document.getElementById('contactError');
    const regex = /^(9[0-36-9]|7[0-36-9])\d{6}$/;
    console.log('la fonction est appelé');

    if (regex.test(contactInput)) {
        errorElement.textContent = ''; // Efface le message d'erreur si le contact est valide
    } else {
        errorElement.textContent =
            'Le numéro de téléphone n\'est pas valide.'; // Affiche un message d'erreur si le contact n'est pas valide
    }
}
