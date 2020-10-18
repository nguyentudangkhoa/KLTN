<div class="modal fade" id="modal-default-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm sản phẩm</h4>
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
                            <label for="name">Tên danh mục sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên danh mục sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Danh mục tổng</label>
                            <select name="total_category" id="total_category" class="form-control">
                                <option selected disabled>Chọn danh mục tổng</option>
                                @foreach ($group_cagories as $groupType)
                                    <option value="{{ $groupType->id }}">{{ $groupType->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
