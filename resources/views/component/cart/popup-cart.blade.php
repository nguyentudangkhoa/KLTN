<div class="modal fade " id="modalCart" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Giỏ hàng</h4>
            </div>
            <div id="cart-modal" class="modal-body">
                <table style="margin-top: 10px">
                    <tbody>
                        <tr>
                            <td style="width: 200px; font-size: 15px">Mặt Nạ Giấy Kingirls Who Cares Glow-it</td>
                            <td style="width: 100px"><input onchange="updateCart(195,$(this).val())" type="number"
                                    min="1" value="1" style="width: 50px; text-align: center"></td>
                            <td style="width: 100px"><button class="btn btn-danger" onclick="deleteCart(195)"
                                    style="font-size: 8px">X</button></td>
                            <td><label style="font-size: 15px">79,000</label></td>
                        </tr>
                    </tbody>
                </table>
                <table style="margin-top: 40px">
                    <tbody>
                        <tr>
                            <td colspan="2" style="font-weight: bold">Tổng thành tiền: <span style="color:red">79,000
                                    đ</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btnClose btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
