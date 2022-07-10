<?php require "../public/wrapper.php" ?>
    
    <div class="card">
        <div class="card-header">Ward Info</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-row">

                    <div class="col">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="" id="" placeholder="Ward Name" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="">Incharge</label>
                            <input type="text" name="" id="" placeholder="Incharge" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="">Capacity</label>
                            <input type="number" name="" id="" placeholder="Number of Beds" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <button class="btn btn-sm btn-primary">Add</button>
            </form>
        </div>
    </div>

<?php require "../public/footer.php" ?>