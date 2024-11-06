document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('form.inline');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            const confirmation = confirm("Você realmente deseja excluir este empréstimo?");
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });

    const table = document.querySelector('table');
    if (table) {
        const headers = table.querySelectorAll('th');
        headers.forEach((header, index) => {
            header.addEventListener('click', () => {
                sortTable(table, index);
            });
        });
    }

    const actions = document.querySelectorAll('.action-button');
    actions.forEach(button => {
        button.addEventListener('mouseover', () => {
            button.classList.add('hover:bg-gray-200');
        });
        button.addEventListener('mouseout', () => {
            button.classList.remove('hover:bg-gray-200');
        });
    });
});

function sortTable(table, colIndex) {
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const isAscending = !table.dataset.sort || table.dataset.sort === 'desc';
    const direction = isAscending ? 1 : -1;

    rows.sort((rowA, rowB) => {
        const cellA = rowA.children[colIndex].innerText.trim();
        const cellB = rowB.children[colIndex].innerText.trim();
        return cellA.localeCompare(cellB, undefined, { numeric: true }) * direction;
    });

    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    rows.forEach(row => tbody.appendChild(row));
    table.dataset.sort = isAscending ? 'asc' : 'desc';
}
