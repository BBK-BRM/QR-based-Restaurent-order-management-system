

//search items
const searchInput = document.getElementById('search_box');
const tableRows = document.querySelectorAll('table tbody tr');

function filterTableRows() {
    const query = searchInput.value.toLowerCase();

    tableRows.forEach(row => {
        const cells = row.querySelectorAll('td');

        let foundMatch = false;
        cells.forEach(cell => {
            const cellValue = cell.textContent.toLowerCase();
            if (cellValue.includes(query)) {
                foundMatch = true;
            }
        });

        if (foundMatch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
searchInput.addEventListener('input', filterTableRows);