document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("formEtudiant");

    if (form) {
        form.addEventListener("submit", function(event) {
            const nom = document.getElementsByName("nom")[0].value.trim();
            const prenom = document.getElementsByName("prenom")[0].value.trim();
            if (nom === "" || prenom === "") {
                event.preventDefault();
                alert("Erreur : Le nom et le prénom doivent être remplis !");
            }
        });
    }
});