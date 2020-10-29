<div class="modal fade" id="modal-update-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-update-product" method="POST"  role="form" enctype="multipart/form-data">
                    @method('put')
                    {{ csrf_field() }}
                     <input type="hidden" name="id_product" id="id_product">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="update-name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="update-name" value="{{ $product->name }}"
                                name="productname" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá sản phẩm</label>
                            <input type="text" class="form-control" id="update-price" value="{{ $product->price }}"
                                name="productprice" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số lượng</label>
                            <input type="text" class="form-control" id="update-quantity" value="{{ $product->quantity}}"
                                name="productquantity" placeholder="Nhập số lượng">
                        </div>
                        <div class="form-group">
                            <label>Đơn vị</label>
                            <select name="productunit" id="update-unit" class="form-control">
                                <option selected disabled>Chọn đơn vị sản phẩm</option>
                                @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select name="productcategory" id="update-category" class="form-control">
                                <option selected disabled>Chọn loại sản phẩm</option>
                                @foreach($productTypes as $productType)
                                <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="description" rows="3"
                                placeholder="Nhập mô tả">{{ $product->description }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
                    </div>
                </form>
                <form action="{{ route('update-image-product') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                     <input type="hidden" name="id_pro" id="id_pro">
                    <div class="form-group">
                        <label for="update-exampleInputFile">Nhập hình ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="update-image" name="productimage">
                                <label class="custom-file-label" for="update-exampleInputFile">Chọn hình ảnh</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Tải lên</span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm hình ảnh</button>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
