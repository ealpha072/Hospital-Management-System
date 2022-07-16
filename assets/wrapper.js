$(document).ready(function () {

    let tableRow = `
        <tr>
            <td>
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm add-row-btn" onclick = "event.preventDefault(); addRow()">+</button>
                    <button class="btn btn-success btn-sm" id="remove-bill-row">-</button>
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

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    
});