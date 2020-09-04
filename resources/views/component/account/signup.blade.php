<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="close-form-sign-up" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Đăng ký</h3>
                    <p>
                        Tham gia vào gia đình Grocery Store cùng chúng tôi
                    </p>
                    <form id="form_signup">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="Name" id="user_name" name="user_name" required="">
                            <p id="txt_user_name_up" style="display:none; color:#FF3333"></p>
                        </div>
                        <div class="styled-input">
                            <input type="email" placeholder="Nhập Email" id="user_email_up" name="user_email"
                                required="">
                            <p id="txt_user_email_up" style="display:none; color:#FF3333"></p>
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Password" name="user_password" id="password1"
                                required="">
                            <p id="txt_user_password_up" style="display:none; color:#FF3333"></p>
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Xác nhận lại password" name="conf_pass" id="password2"
                                required="">
                            <p id="txt_user_cof_pass" style="display:none; color:#FF3333"></p>
                        </div>
                        <div class="styled-input">
                            <input type="text" placeholder="Số điện thoại" name="phone_number" id="phone_number"
                                required="">
                            <p id="txt_user_phone" style="display:none; color:#FF3333"></p>
                        </div>
                        <div class="styled-input">
                            <select class="form-control" name="gender" id="inputGrandudateYear">
                                <option selected disabled> Chọn giới tính</option>
                                <option value="nam">nam</option>
                                <option value="nữ">nữ</option>
                                <option value="khác">khác</option>
                            </select>
                            <p id="txt_user_cof_gender" style="display:none; color:#FF3333"></p>
                        </div>
                        <input type="submit" value="Đăng ký"><img src="assets/images/giphy.gif" id="img-loading-sign-up"
                            style="height:100px;width:100px;display:none" alt="">
                        <p id="sign-up-status" style="display: none; color:#FF3333"></p>
                    </form>
                    <p>
                        <a href="#">Khi click vào đăng ký đồng nghĩa bạn đã chấp nhân chính sách của chúng tôi</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal2 -->
