<div class="modal fade" id="modal-sm-dissall">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông báo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                @csrf
                <input type="hidden" id="id-diss-tem">
                <input type="hidden" id="table-diss" value="">
                <p>Bạn có muốn vô hiệu hóa <label id="disable-all" style=""></label></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-dis-all btn-primary">Vô hiệu hóa</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
