<?php require "../public/wrapper.php" ?>

<div class="card mb-4 mr-4 ml-4">
    <div class="card-header">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-sm btn-success"> 
                <a href="new_message.php"><i class="fa fa-paper-plane mr-2"></i> New Message</a>
            </button>
            <button type="button" class="btn btn-sm btn-info">
                <a href="inbox.php"><i class="fa fa-inbox mr-2"></i> Inbox</a> 
            </button>
        </div>
        
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col">
                <label for="">Show</label>
                <select name="" id="" class="">
                    <option value="" selected disabled>--Select--</option>
                    <option value="">10</option>
                    <option value="">20</option>
                </select>
            </div>

            <div class="col btn-group" role="group">
                <button class="btn btn-sm btn-secondary">Copy</button>
                <button class="btn btn-sm btn-secondary">CSV</button>
                <button class="btn btn-sm btn-secondary">Excel</button>
                <button class="btn btn-sm btn-secondary">PDF</button>
                <button class="btn btn-sm btn-secondary">Print</button>
            </div>

            <div class="col">
                <label for="">Search</label>
                <input type="text" name="" id="">
            </div>
        </div>

        <table class="table table-bordered table-sm table-hover">
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" class="text-center">
                        No Data Available
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <div class="d-flex justify-content-end btn-group" role="group">
                <button class="btn btn-sm btn-primary"> << Previous</button>
                <button class="btn btn-sm btn-secondary">Next >></button>
            </div>
        </div>
    </div>
</div>

<?php require "../public/footer.php" ?>