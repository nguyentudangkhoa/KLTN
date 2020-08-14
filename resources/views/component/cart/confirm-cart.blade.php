<!-- Modal1 -->
<div class="modal fade" id="confirm-cart-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="modal_body_left modal_body_left1" style="text-align: center">
                    <h3 class="agileinfo_sign">Xác nhận </h3>
                    <p id="confirm-cart-alert">Bạn có muốn xóa <label id="name-cart-item"></label></p>
                    <input type="hidden" id="id_cart_item">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" id="close_ot" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" id="confirm_cart_btn" class="btn btn-primary" data-token="{{ csrf_token() }}">Xác nhận</button>
                </div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
