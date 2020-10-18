<div class="modal fade" id="modal-user-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update người dùng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <!-- /.card-header -->
                <!-- form start -->
                <form id="form-add-user" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên người dùng</label>
                            <input type="text" class="form-control" id="update-name" name="name" placeholder="Tên người dùng">
                        </div>
                        <div class="form-group">
                            <label for="price">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Quyền đăng nhập</label>
                            <select name="role" id="role" class="form-control">
                                <option selected disabled>Quyền đăng nhập</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select name="category" id="category" class="form-control">
                                <option selected disabled>Chọn giới tính</option>
                                    <option value="nam">Nam</option>
                                    <option value="nam">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Sửa thông tin người dùng</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
