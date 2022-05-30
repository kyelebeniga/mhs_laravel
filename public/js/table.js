/**
 * Sorts the HTML table
 * 
 * @param {HTMLTableElement} table  | The table to sort
 * @param {number} column           | Index of column to sort
 * @param {boolean} asc             | Determines if sorting will be in ascending or descending order
 * 
 */
function sortTableByColumn(table, column, asc = true){
    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll("tr"));

    // Sort each row
    const sortedRows = rows.sort((a, b) => {
        const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
    });
    
    // Remove all existing TRs from the table
    while(tBody.firstChild){
        tBody.removeChild(tBody.firstChild);
    }

    // Re-add the newly sorted rows
    tBody.append(...sortedRows);

    // Remember how column is currently sorted
    table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
    table.querySelector(`th:nth-child(${ column + 1 })`).classList.toggle("th-sort-asc", asc);
    table.querySelector(`th:nth-child(${ column + 1 })`).classList.toggle("th-sort-desc", !asc);
}

document.querySelectorAll(".table-sortable th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        const tableElement = headerCell.parentElement.parentElement.parentElement;
        const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const currentIsAscending = headerCell.classList.contains("th-sort-asc");

        sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
    });
});

// Get total number of tickets
var table = document.getElementById("tbl");
var rowCount = table.tBodies[0].rows.length;
$("#target").text(rowCount);

// Sum of tickets sold
var sumVal = 0;
for(var i=1;i<table.rows.length;i++){
    sumVal = sumVal + parseFloat(table.rows[i].cells[6].innerHTML);
}
console.log(sumVal);
$("#totalprice").text('$' + sumVal);