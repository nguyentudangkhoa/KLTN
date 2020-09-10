<!-- Modal1 -->
<div class="modal fade" id="modal_city" tabindex="-1" role="dialog">
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
                    <h3 class="agileinfo_sign">Chọn thành phố của bạn</h3>
                    <select name="city_obtion" id="city_obtion">
                        @foreach (Auth::user()->User_Address as $user)
                            <option value="" disabled selected>Chọn địa chỉ của bạn</option>
                            <option value="{{ $user->address }}">{{ $user->address }}</option>
                        @endforeach

                    </select>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
