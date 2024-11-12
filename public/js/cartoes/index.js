document.addEventListener("DOMContentLoaded", function() {
    const etapa1Btn = document.getElementById("etapa-1-btn");
    const etapa2Btn = document.getElementById("etapa-2-btn");
    const etapa1 = document.getElementById("etapa-1");
    const etapa2 = document.getElementById("etapa-2");

    etapa1Btn.addEventListener("click", function() {
        etapa1.classList.remove("active");
        etapa2.classList.add("active");
    });

    etapa2Btn.addEventListener("click", function() {
        etapa2.classList.remove("active");
        etapa1.classList.add("active");
    });
});
