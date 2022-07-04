/**
 * Searches through the <td> elements of the <tr> of the table.
 * id="searchInput" needs to be assigned to the type="text" input form.
 * id="table-search" needs to be assigned to the <table> element.
 * rows needs to be of <tr> tag.
 * columns needs to be of <td> tag.
 * */

function tableSearch() {
    let input, search, table, tr, td, txtValue, i, j;
    input = document.getElementById("searchInput");
    search = input.value.toUpperCase();
    table = document.getElementById("table-search");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        //j - column of the table. 
        //0 - first column, 1 - second column, so on. 
        for (j = 0; j < td.length; j++) {
            let tdata = td[j];
            if (tdata) {
                if (tdata.innerHTML.toUpperCase().indexOf(search) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}