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
   const tableBody = document.querySelector('tbody#bill-table-body')
   const buttons = tableBody.querySelectorAll("button")

   fn  = function (e) {e.preventDefault()}

   for(let i = 0; i < buttons.length; i++){
        buttons[i].addEventListener('click', fn, false )
   }

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    
});