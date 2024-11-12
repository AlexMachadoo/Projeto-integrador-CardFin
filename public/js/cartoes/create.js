document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const nextButton = form.querySelector("button[type='submit']");
    const consentCheckbox = document.getElementById("consentimento");

    nextButton.addEventListener("click", function(event) {
        if (!consentCheckbox.checked) {
            event.preventDefault();
            alert("Você precisa aceitar as condições de tratamento de dados para prosseguir.");
        }
    });
});
