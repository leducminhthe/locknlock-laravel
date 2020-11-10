@php
    $segment1 =  Request::segment(1);
    $data['menu'] = config('constants.menu');
    $address = config('constants.address');
@endphp
<footer id="footer" class="pt-3 pb-3 pt-md-5 pb-md-5" style="padding-bottom: 3rem !important;">
    <div class="container menu-bot">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

            <div class="panel panel-default" style="border-bottom: none;">
                <div id="collapse1" class="panel-collapse collapse in show">
                    <div class="panel-body">
                        <div class="contact-footer font-size-14">
                            <div class="mb-1">
                                <img class="logo_footer" src="{{ asset('images/NTX - Icon/logofooter.png') }}" /></div>
                            <p style="color: black">{!!html_entity_decode($address)!!}</p>
                        </div>
                    </div>
                </div>
                <div class="">
                    <img src="{{ asset('/images/Frame45.png')}}" alt="">
                </div>
            </div>

            <div class="panel panel-default">
                <div style="position: relative;" class="panel-heading" id="heading2">
                    <a  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2" class="collapsed d-block position-relative mt-3  Inter-Bold">
                        <ul>
                            <li class="title_li">Công ty</li>
                            <li><img src="{{ asset('/images/down-arrow.png')}}" alt=""></li>
                        </ul>
                    </a>
                    <div class="a_panel"></div>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="ul-footer">
                            <li><a href="gioi-thieu" title="">Giới thiệu</a></li>
                            <!-- <li><a href="trach-nhiem" title="">Giá trị cốt lõi</a></li>
                            <li><a href="nhan-su-chung-toi" title="">Nhân sự NTX</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div style="position: relative;" class="panel-heading" role="tab" id="heading3">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="collapsed  d-block mt-3 Inter-Bold">
                        <ul>
                            <li class="title_li">Hỗ trợ</li>
                            <li><img src="{{ asset('/images/down-arrow.png')}}" alt=""></li>
                        </ul>
                    </a>
                    <div class="a_panel"></div>
                </div>
                <div id="collapse3" class="panel-collapse collapse" role="tabpane3" aria-labelledby="heading3">
                    <div class="panel-body">
                        <ul class="ul-footer">
                            <li><a href="dieu-khoan" title="">Điều khoản sử dụng</a></li>
                            <li><a href="chinh-sach-bao-mat" title="">Chính sách bảo mật</a></li>
                            <!-- <li><a href="cau-hoi-thuong-gap" title="">Câu hỏi thường gặp</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default" style="border-bottom: none;">
                <div style="position: relative;" class="panel-heading" role="tab" id="heading4">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4" class="collapsed  d-block mt-3 Inter-Bold" style="margin-bottom: 5px;">
                        <ul>
                            <li style="padding-bottom: 5px;" class="title_li">Chính sách</li>
                            <li><img src="{{ asset('/images/down-arrow.png')}}" alt=""></li>
                        </ul>
                    </a>
                    <div class="a_panel"></div>
                </div>
                <div id="collapse4" class="panel-collapse collapse" role="tabpane4" aria-labelledby="heading4">
                    <div class="panel-body">
                        <ul class="ul-footer">
                            <li><a href="quy-dinh-va-chinh-sach" title="">Khiếu nại & đền bù</a></li>
                            <li><a href="quy-dinh-va-chinh-sach" title="">Quy trình gửi & nhận hàng</a></li>
                            <li><a href="quy-dinh-va-chinh-sach" title="">Trách nhiệm các bên</a></li>
                            <li><a href="quy-dinh-va-chinh-sach" title="">Hàng hóa cấm gửi</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default mt-3 p-0">
                <div id="collapse5" class="panel-collapse collapse show">
                    <div class="panel-body">
                        <div class="sharefooter text-left mb-2">
                            <a href="https://zalo.me/1686351419992093592">
                                <img src="{{ asset('/images/Group88.png')}}" alt="">
                            </a>
                            <a href="https://www.facebook.com/Nh%E1%BA%A5t-T%C3%ADn-Express-108459264347534">
                                <img src="{{ asset('/images/Group87.png')}}" alt="">
                            </a>
                            <a href="https://www.youtube.com/c/Nh%E1%BA%A5tT%C3%ADnLogisticsOfficial">
                                <img src="{{ asset('/images/Group86.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="nhap_email mt-2">
                        <input style="font-size: 13px;" id="input_search" class="form-control" name="search" type="text" placeholder="Nhập email để nhận thông tin" />
                        <button class="span_search">
                            <img class="w-100" src="{{asset('images/NTX - Icon/Small 50x50/Send.png')}}" alt="">
                        </button>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="w-100 mt-3 mt-md-5 text-center text-md-left d-md-flex justify-content-md-between align-items-center flex-row-reverse">
            <div>
            </div>
            <div class="copyright text-left mt-2 mt-md-0">Copyright Ⓒ 2020 by Nhất Tín</div>
        </div>
    </div>
    <div class="modal fade" id="modal-sendmail" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-12 text-center notify-send-mail"></div>
                        <div class="col-12 text-center content-send-mail"></div>
                        <div class="col-12 text-center">
                            <img class="image-notify" width="400px" src="{{ asset('images/mail/hoan-tat.png') }}"
                                 alt="">
                        </div>
                    </div>
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#input_search').on('keypress', function (e) {
            $(this).parents('#collapse5').find('.invalid-feedback').hide();
        })
        $('.span_search').on('click', function (e){
            let email = $('#input_search').val();
            $.ajax({
                url: '/dang-ky-email',
                data: {
                    email: email
                },
                method: 'GET',
                success: res => {
                    if (res.status == 201) {
                        $(this).parents('#collapse5').find('.invalid-feedback').text(res.messages.email).show();
                        return false;
                    }
                    if (res.success === true) {
                        $('.notify-send-mail').text('Vui lòng xem email để biết chi tiết');
                        $('.content-send-mail').text(res.messages);
                        $('.image-notify').attr('src', 'images/mail/hoan-tat.png');
                        $('#input_search').val('')
                        $('#modal-sendmail').modal('show');
                    } else {
                        $('.notify-send-mail').text('Gửi mail thất bại, vui lòng kiểm tra lại !!!');
                        $('.content-send-mail').text(res.messages);
                        $('.image-notify').attr('src', 'images/mail/that-bai.png');
                        $('#input_search').val('')
                        $('#modal-sendmail').modal('show');
                    }
                },
                error: err => {
                    $('.notify-send-mail').text('Gửi mail thất bại, vui lòng kiểm tra lại');
                    $('.content-send-mail').text(err.messages);
                    $('#modal-sendmail').modal('show');
                }
            })
        })

    </script>
</footer>





