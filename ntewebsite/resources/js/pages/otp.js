$(function () {
    // Input only one char
    $("input").keyup(function () {
        let  count = 1;
        let index = $(this).index("input");
        if (count <= 5){
            if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')
            $("input:eq(" + (index +1) + ")").focus();
            count++;
        }

    });
})
