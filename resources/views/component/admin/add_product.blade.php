<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm danh mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form-add-product" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá sản phẩm</label>
                            <input type="text" class="form-control" id="price" name="price"
                                placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số lượng</label>
                            <input type="text" class="form-control" id="quantity" name="quantity"
                                placeholder="Nhập số lượng">
                        </div>
                        <div class="form-group">
                            <label>Đơn vị</label>
                            <select name="unit" id="unit" class="form-control">
                                <option selected disabled>Chọn đơn vị sản phẩm</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select name="category" id="category" class="form-control">
                                <option selected disabled>Chọn loại sản phẩm</option>
                                @foreach($productTypes as $productType)
                                    <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Nhập mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Nhập hình ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Tải lên</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
