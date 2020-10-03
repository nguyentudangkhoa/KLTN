<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm địa chỉ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Địa chỉ</label>

                        <div class="col-sm-10" >
                            <input type="text" class="form-control" id="inputAddress" name="inputAddress"
                                placeholder="Nhập địa chỉ">
                            <button type="button" type="submit" id="btnAddAddress" data-token="{{ csrf_token() }}" class="btn btn-primary">Thêm địa chỉ</button>
                        </div>
                    <p id="txtAddError" style="color: red"></p>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
