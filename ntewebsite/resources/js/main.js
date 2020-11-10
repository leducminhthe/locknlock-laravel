$(document).ready(function(){

    validateForm();
    $("#register_email").submit(function(e) {
        e.preventDefault();
        let email = $('#email_register').val();
        $.ajax({
            type: "POST",
            url: "/register_email",
            headers: {
                'X-XSRF-TOKEN': getCookie('XSRF-TOKEN')
            },
            data: {
                "email": email,
            },
            success: function(data)
            {
                alert(data.data);
            }
        });
    });
    if ( $('#cv').length > 0) {
        $('#cv').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName.replace('C:\\fakepath\\', " "));
        })
    }
    if ( $('#profile-pic').length > 0) {
        $('#profile-pic').on('change',function(){
            readURL(this);
        })
    }
    if ($(window).width() > 768 ) {
        $("#inputJobCate").select2({
            placeholder: "Nhập loại công việc",
            formatResult: format,
            formatSelection: format,
            escapeMarkup: function(m) { return m; }
        });
        $("#inputState").select2({
            placeholder: "Nhập tỉnh, thành để tìm nhanh",
            formatResult: format,
            formatSelection: format,
            escapeMarkup: function(m) { return m; }
        });
    }
    //begin load_project
    $(".result2 a").click(function(){
        var textBtn = $(this).text();
        var id = $(this).attr('id');
        $('#input2').val(textBtn);
        $('#hiddeninput').val(id);
        $(".result2").fadeOut(300);

    });//end begin
    //begin load_project
    $(".closes").click(function(){
        var id = $(this).attr('id');
        $(".closes"+id).fadeOut(300);
        $(".result"+id).fadeOut(300);

    });//end begin
});
function validateForm() {
    var forms = document.getElementsByClassName('needs-validation'),
        validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    $(form).submit();
                }
                $(form).addClass('was-validated');
                event.stopPropagation();
            }, false);
        });
}
function getCookie(name) {
    var cookieArr = document.cookie.split(";");

    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");

        if(name == cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}
function toggleIcon(e) {
    $(e.target)
        .prev('.card-header')
        .find('.more-less')
        .toggleClass('ntl-Plus ntl-Close');
}
if ($('#input2').length > 0) {
    document.getElementById("input2").onclick = function() {myFunction3()};
}
function myFunction3() {
    $(".result2").fadeIn(300);
}

$("#input1").click(function(){$(".live-search-box1").show(250);});
$("#input2").click(function(){$(".live-search-box2").show(250);$(".closes2").fadeIn(300);});

function format(state) {
    if (!state.id) return state.text; // optgroup
    return state.text;
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result).show();
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

