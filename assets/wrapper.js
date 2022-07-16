let tableRow = `
    <tr>
        <td>
            <div class="btn-group">
                <button class="btn btn-primary btn-sm add-row-btn" onclick = "event.preventDefault(); addRow()">+</button>
                <button class="btn btn-success btn-sm" id="remove-bill-row" onclick="removeRow(event);">-</button>
            </div>
        </td>
        <td>
            <input type="text" class="form-control form-control-sm" placeholder="Service Name">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" placeholder="1">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" placeholder="0.00">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" placeholder="0.00" readonly>
        </td>
    </tr>
`
function addRow(){
    let tableBody = $('#bill-table-body')
    tableBody.append(tableRow)
}

function removeRow(e){
    e.preventDefault()
    let tableBody = document.querySelector('#bill-table-body')
    let row = e.target.closest('tr')
    tableBody.removeChild(row)
}

$(document).ready(function () {
    let addBtns = $('.add-row-btn')

    addBtns.on('click', (e)=> {
        e.preventDefault()
        $('#bill-table-body').append(tableRow)
    })

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    
});