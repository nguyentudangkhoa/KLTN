<div class="modal fade" id="modal-total-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm danh mục tổng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form-add-category" method="POST" role="form">
@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên danh mục tổng</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên danh mục tổng">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Thêm danh mục tổng</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
