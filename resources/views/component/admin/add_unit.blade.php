<div class="modal fade" id="modal-unit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm đơn vị tính</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form-add-unit" method="POST" role="form">
                     @csrf
                     <input type="hidden" name="id" id="id-add-unit">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên đơn vị tính</label>
                            <input type="text" class="form-control" id="unit_add_name" name="name" placeholder="Tên đơn vị tính">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Thêm đơn vị tính</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
