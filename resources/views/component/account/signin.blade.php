<!-- Modal1 -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Đăng nhập</h3>
                    <p>
                        Đăng ký nhanh để nhận ưu đãi nếu bạn chưa là thành viên của chúng tôi
                        <a href="#" data-toggle="modal" data-target="#myModal2">
                            Đăng ký ngay</a>
                    </p>
                    <p>
                        Nếu bạn quên tài khoản xin vui lòng click vào
                        <a href="#" data-toggle="modal" data-target="#myModal2">
                            Tìm mật khẩu</a>
                    </p>
                    <form id="form_sigin">
                        @csrf
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="Nhập email" id="user_email" name="user_email" required="">
                            <p id="txt_user_name" style="display:none; color:#FF3333"></p>
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Password" id="user_password" name="user_password"
                                required="">
                            <p id="txt_user_password" style="display:none; color:#FF3333"></p>
                        </div>
                        <div class="styled-input">
                            <input type="checkbox" name="remember" id="remember"> Ghi nhớ đăng nhập
                        </div>

                        <input type="submit" value="Sign In">
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
