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

let poTableRow = `
    <tr>
        <td>
            <div class="btn-group">
                <button class="btn btn-success btn-sm" onclick="addPoRow(event);"><i class="fa fa-plus-circle"></i></button>
                <button class="btn btn-info btn-sm" onclick="removePoRow(event);"><i class="fa fa-minus-circle"></i></button>
            </div>
        </td>
        <td>
            <input type="text" class="form-control form-control-sm">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm" placeholder="0.00" readonly>
        </td>
    </tr>
`

let doctor_list_page = ``;
//add remove rows to bill table
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

//add remove rows to PO table
function addPoRow (e){
    e.preventDefault()
    let tableBody = $('#po-table-body')
    tableBody.append(poTableRow)
}

function removePoRow(e){
    e.preventDefault()
    let tableBody = document.querySelector('#po-table-body')
    let row = e.target.closest('tr')
    tableBody.removeChild(row)
}


$(document).ready(function () {
    let addBtns = $('.add-row-btn')
    let addRowToPoTable = $('.arppt')

    addRowToPoTable.on('click', (e)=>{
        e.preventDefault()
        $('#po-table-body').append(poTableRow)
    })
    
    addBtns.on('click', (e)=> {
        e.preventDefault()
        $('#bill-table-body').append(tableRow)
    })

    $('#patients-table tbody tr.main-row').on('click', function(){
        //console.log('hello')
        $(this).next().toggle()
        //$('tr.minor-row').hide();
    })

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});