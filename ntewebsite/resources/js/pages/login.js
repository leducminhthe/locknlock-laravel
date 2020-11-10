$(function () {
    $('#form-login').on('submit', function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/kiem-tra-dang-nhap",
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: res => {
                if (res.status == '201') {
                    if (typeof res.message !== 'undefined') {
                        if (typeof res.message.phone_number !== 'undefined') {
                            $('#form-login').addClass('was-validated');
                            $('input[name="phone_number"]').prop('required', true).val('');
                            $('.err-phone').text(res.message.phone_number[0]).css('display', 'block');
                        }
                        if (typeof res.message.password !== 'undefined') {
                            $('#form-login').addClass('was-validated');
                            $('input[name="password"]').prop('required', true).val('');
                            $('.err-pass').text(res.message.password[0]).css('display', 'block');
                        }
                    }
                } else if (res.status === 200) {
                    window.location = '/';
                } else {
                    alert('đang nhập thất bại')
                }
            }
        })
    });
    $('.form-control').on('focus', function () {
        $(this).parent().find('.invalid-feedback').css('display', 'none');
    });
    $('#show-hide-eyes').on('click', function () {
        if ($('#password-field').attr('type') == 'password') {
            $('#password-field').attr('type', 'text');
        } else {
            $('#password-field').attr('type', 'password');
        }
    });
})
