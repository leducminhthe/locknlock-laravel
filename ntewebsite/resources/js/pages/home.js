$(function () {
    $('#inputAddress').on('keyup', function (e) {
        if ($(this).val() !== '') {
            $('.btn-search1').prop('disabled', false);
        } else if ($(this).val() === '') {
            $('.btn-search1').prop('disabled', true);
        }
    });
    $('#input_search').on('keyup', function (e){
        if ($(this).val() !== '' ) {
            $('.span_search').prop('disabled', false);
        } else if ($(this).val() === '')  {
            $('.span_search').prop('disabled', true);
        }
    })
})
