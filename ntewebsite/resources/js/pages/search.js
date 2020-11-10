$(function () {
    $('#inputAddress').on('keyup', function (e) {
        if ($(this).val() !== '') {
            $('.btn-search1').prop('disabled', false);
            $('.btn-search-mobie').prop('disabled', false);
        } else if ($(this).val() === '') {
            $('.btn-search1').prop('disabled', true);
        }
    });
})
