console.log('This page works')

$(document).ready(function () {
    let tableRow = `
        <tr>
            <td>
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm" id="add-bill-row">+</button>
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
   const tableButtonsAdd =$('#bill-table-body .add-row-btn')
   const tableButtonsRemove = $('#bill-table-body .remove-row-btn')

   tableButtonsAdd.on('click', e=>{
        e.preventDefault()
        $("#bill-table-body").append(tableRow)
   })

   tableButtonsRemove.on('click', function(e){
        e.preventDefault()
        $(this).parentsUntil("tr").remove()
   })

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    
});