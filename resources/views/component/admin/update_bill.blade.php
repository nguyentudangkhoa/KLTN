<div class="modal fade" id="modal-update-bills">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật đơn hàng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form-update-bill" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label>Danh mục tổng</label>
                        <input type="hidden" id="id_bill" name="id_bill"/>
                        <select name="status" id="status" class="form-control">
                            <option selected disabled>Chọn trạng thái</option>
                            <option value="0">Hủy đơn hàng</option>
                            <option value="2">Xác nhận đơn hàng</option>
                            <option value="3">Đơn hàng đang giao</option>
                            <option value="4">Đơn hàng giao thành công</option>
                        </select>
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
