<div class="modal fade" id="modal-default-rating">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Dánh giá</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form-rating" method="POST" role="form">
@csrf
                    <input type="hidden" name="id_bill" id="id_bill">
                    <input type="hidden" name="id_pro" id="id_pro">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mức dánh giá</label>
                            <select name="rating" id="total_category" class="form-control">
                                <option selected disabled>Chọn mức dánh giá</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-rating btn-primary">Đánh giá</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
