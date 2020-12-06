<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thông tin người dùng</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/toastr/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- SEARCH FORM -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('index') }}" class="brand-link">
                <img src="assets/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">GROCERY STORE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if ( $user->image ==null)
                        <img src="assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                        @else
                        <img src="assets/AdminLTE/dist/img/{{ $user->image }}" class="img-circle elevation-2 "
                            alt="User Image">
                        @endif

                    </div>
                    <div class="info">
                        <a href="{{ route('profile',Auth::user()->id) }}"
                            class="d-block user-name">{{ $user->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Chi tiết và đánh giá</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang thông tin người dùng</a></li>
                                <li class="breadcrumb-item active user-name">{{ $user->name }}</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if ($user->image == null)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="assets/AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture">
                                        @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="assets/AdminLTE/dist/img/{{ $user->image }}"
                                            alt="User profile picture">
                                        @endif

                                    </div>

                                    <h3 class="profile-username text-center user-name">{{ $user->name }}</h3>

                                    <p class="text-muted text-center">{{ $user->Roles->name }}</p>

                                    @if(Session::has('Update-Avatar'))
                                    <script>
                                        Change avatar success
                                    </script>
                                    @endif


                                    <button type="button" id="change_avatar" class="btn btn-block btn-primary">Thay đổi
                                        avatar</button>
                                    <form action="{{ route('edit-avatar') }}" method="POST" class="form-avatar"
                                        enctype="multipart/form-data" style="display: none; margin-top 10px">
                                        @method('PUT')
                                        @csrf

                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    id="exampleInputFile" required>
                                                <label class="custom-file-label" id='label-img'
                                                    for="exampleInputFile">Chọn hình ảnh</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-block" value="Submit">
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin chi tiết</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <strong><i class="fas fa-envelope"></i></i></i> Email</strong>

                                    <p class="text-muted">
                                        {{ $user->email }}
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                                    <select id="show-address" class="form-control">

                                        @foreach($user->User_Address as $address)
                                        <option> {{ $address->address }} </option>
                                        @endforeach

                                    </select>
                                    <button type="button" class="btn btn-block btn-info" data-toggle="modal"
                                        data-target="#modal-default">Quản lý địa chỉ của bạn</button>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Số điện thoại</strong>

                                    <p class="text-muted">
                                        {{ $user->phone }}
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Tổng lần mua hàng</strong>

                                    <p class="text-muted">
                                        {{ $user->total_buy }}
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-user"></i></i> Giới tính</strong>

                                    <p class="text-muted">
                                        {{ $user->gender }}
                                    </p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Đánh giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($billDetails as $bill)
                                            <tr >
                                                <td>{{ $bill->Product->name}}</td>
                                                <td>{{ $bill->price }}</td>

                                                <td>{{ $bill->quantity }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"  data-id = "{{ $bill->Bill->id }}" data-idproduct="{{ $bill->Product->id }}" data-toggle="modal" data-target="#modal-default-rating" class="btn-rating btn btn-info">Đánh giá</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div><!-- /.card-header -->

                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('profile.rating')

    <!-- jQuery -->
    <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/AdminLTE/dist/js/demo.js"></script>
    <!-- SweetAlert2 -->
    <script src="assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
    <!--End form-->
    <!-- form user -->
    <script src="assets/js/component/form-user.js"></script>
    <script src="assets/js/component/form-rating.js"></script>
    <!-- DataTables -->
    <script src="assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
    <!-- Code injected by live-server -->
    <script type="text/javascript">
        // <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
    </script>


    @include('component.address.address')
</body>

</html>
