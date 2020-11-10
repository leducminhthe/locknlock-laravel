$(function (){
    $('.show-hide-eyes-password').on('click', function (e) {
        if($('#password').attr('type') == 'password' ){
            $('#password').attr('type','text');
        }else {
            $('#password').attr('type','password');
        }
    });
    $('.show-hide-eyes-confirm-password').on('click', function (e) {
        if($('#confirm_password').attr('type') == 'password' ){
            $('#confirm_password').attr('type','text');
        }else {
            $('#confirm_password').attr('type','password');
        }
    });

    $('#form-register').on('submit', function (event){
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/kiem-tra-dang-ky",
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: res => {
                if ( res.status == '201' ){
                    if(typeof res.message !== 'undefined' ){
                        if (typeof res.message.phone_number !== 'undefined'){
                            $('#form-register').addClass('was-validated');
                            $('input[name="phone_number"]').prop('required',true).val('');
                            $('.err-phone').text(res.message.phone_number[0]).css('display','block');
                        }
                        if ( typeof res.message.password !== 'undefined'){
                            $('#form-register').addClass('was-validated');
                            $('input[name="password"]').prop('required',true).val('');
                            $('.err-pass').text(res.message.password[0]).css('display','block');
                        }
                        if (typeof res.message.confirm_password != 'undefined'){
                            $('#form-register').addClass('was-validated');
                            $('input[name="confirm_password"]').prop('required',true).val('');
                            $('.err-confirm-pas').text(res.message.confirm_password[0]).css('display','block');
                        }
                    }
                }else  {
                    window.location = '/otp'
                }
            }
        })
    });
    $('.form-control').on('focus', function (){
        $(this).parent().find('.invalid-feedback').css('display','none');
    });
})
