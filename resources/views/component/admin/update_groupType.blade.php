<div class="modal fade" id="modal-update-total-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật mục tổng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form-update-root-category" method="POST" role="form">
@csrf
                    <input type="hidden" name="id_root" id="id_root">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên danh mục tổng</label>
                            <input type="text" class="form-control" id="update-name" name="name" placeholder="Tên danh mục tổng">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Cập nhật mục tổng</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
