document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.perfil-section');
    sections.forEach(section => {
        section.classList.add('transition-opacity');
        section.classList.add('opacity-0');
    });

    setTimeout(() => {
        sections.forEach(section => {
            section.classList.remove('opacity-0');
            section.classList.add('opacity-100');
        });
    }, 200);
});
